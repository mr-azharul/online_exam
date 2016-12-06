<?php
	session_start();
	if(isset($_SESSION['teacher_name']) == NULL){
		header("Location: http://localhost/online_exam/Index/index");
	}
	else {
		header( 'Content-Type: text/html; charset=utf-8' );
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0035)http://demo.phptpoint.com/quiz/home -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="online examintaion system, using php, mvc">
    <meta name="keywords" content="online exam, online examintaion system, php, mvc">
	<meta name="author" content="Azharul Islam">
    
    <title>Online Examination</title>
    
            <!-- Bootsrap -->
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>/Index/style">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 </head>
 <body>
			<?php
 				$teacher_name = $_SESSION['teacher_name'];
				$teacher_id   = $_SESSION['teacher_id'];
 			?>

    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
			</div>
			
			<!-- Navbar -->
			  <div class="collapse navbar-collapse">
			   	<ul class="nav navbar-nav">
			      <li><a href="<?php echo BASE_URL;?>/Index/teacherhome">Home</a></li>
			      <li><a href="<?php echo BASE_URL;?>/Index/teachercreate">Create Exams</a></li>
			      <li class="active"><a href="<?php echo BASE_URL;?>/Index/teachersee/<?php echo $teacher_id;?>">See Exams</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Wellcome <?php echo $_SESSION['teacher_name'];?> <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="<?php echo BASE_URL;?>/Index/teacherlogout">Log Out</a></li>
			        </ul>
			       </li>
			    </ul>
			  </div>
		</div>
	</div>
	<br><br>

			<!-- Main Body -->
			<?php
				$host = "localhost";
		        $user = "root";
		        $pass = "";
		        $db   = "exam";

		        $conn = new mysqli($host, $user, $pass, $db);


				$exam_id = $_GET['xpzVx'];
				$teacher = "SELECT * FROM std_table WHERE exam_id=$exam_id";
				$result  = $conn->query($teacher);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
			?>
	<br>
	<div class="container" align="center">
		<h1>Sub: <?php echo $row['exam_name'];?></h1>
		<p>Course Code: <?php echo $row['course_code'];?></p>
		<p>Teacher Name: <?php echo $row['teacher_name'];?></p>
    </div>
    <hr><br>

    <div class="container">
	  <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Student Id</th>
	        <th>Marks</th>
	        <th>Out Of</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td><?php echo $row['std_id']; ?></td>
	        <td><?php echo $row['marks']; ?></td>
	        <td><?php echo $row['outof']; ?></td>
	      </tr>
	      <?php }
		       }
		       else {
		       	?><br><br><h1 align="center" style="color: red;">No Data Found!</h1><?php
		       }
	       	?>
	    </tbody>
	  </table>
	</div>
    	
</body>
</html>