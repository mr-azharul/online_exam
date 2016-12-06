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
    <link type="text/css" rel="stylesheet" href="http://localhost/online_exam/Index/style">
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

    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
			</div>
			<?php
				$teacher_id = $_SESSION['teacher_id'];
				$host = "localhost";
		        $user = "root";
		        $pass = "";
		        $db   = "exam";

		        $conn = new mysqli($host, $user, $pass, $db);
			?>
			
			<!-- Navbar -->
			  <div class="collapse navbar-collapse">
			   	<ul class="nav navbar-nav">
			      <li><a href="http://localhost/online_exam/Index/teacherhome">Home</a></li>
			      <li><a href="http://localhost/online_exam/Index/teachercreate">Create Exams</a></li>
			      <li class="active"><a href="http://localhost/online_exam/Index/teachersee/<?php echo $teacher_id;?>">See Exams</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Wellcome <?php echo $_SESSION['teacher_name'];?> <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="http://localhost/online_exam/Index/teacherlogout">Log Out</a></li>
			        </ul>
			       </li>
			    </ul>
			  </div>
		</div>
	</div>
	<br><br>

			<!-- Main Body -->
	<br>
	<div class="container">
  		<div class="page-header">
    		<h1>Examinations: </h1>
    	</div>
    </div><br>

    <div class="container">
	  <table class="table table-hover">
	    <thead>
	      <tr style="text-align: center;">
	        <th>Exam Name</th>
	        <th>Course Code</th>
	        <th>Exam Date</th>
	        <th>Exam Start Time</th>
	        <th>Exam End Time</th>
	        <th>Status</th>
	        <th>Update</th>
	        <th>Delete</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php
	    	if(isset($teacherlist)) {
				foreach ($teacherlist as $value) {
					$exam_id = $value['exam_id']
	    ?>
	      <form action="" method="post">
		      <tr>
		        <td><a href="http://localhost/online_exam/Exam/details?xpzVx=<?php echo $value['exam_id'];?>"><?php echo $value['exam_name'];?></a></td>
		        <td><?php echo $value['course_code']; ?></td>
		        <td><?php echo $value['date']; ?></td>
		        <td><?php echo $value['time']; ?></td>
		        <td><?php echo $value['end_time']; ?></td>
		        <td><?php if($value['exam_status'] == 1) {echo "Active";} elseif ($value['exam_status'] == 0){echo "Completed";} ?></td>
		        <td><a href="http://localhost/online_exam/Exam/update?xpzVx=<?php echo $value['exam_id'];?>" class="btn btn-primary">Update</button></td>
		        <td><button name="delete" class="btn btn-danger" onclick="return confirm('Sure To Remove This Exam ?');">Delete</button></td>
		      </tr>
	      </form>
	      <?php 
	      	if(isset($_POST['delete'])) {
	      		$delete = "DROP TABLE exam_$exam_id";
	      		if ($conn->query($delete) === TRUE) {
				    $a = 1;
				} else {
				    $a = 2;
				}

				$conf = "DELETE FROM teacher_table WHERE exam_id = $exam_id";
				if ($conn->query($conf) === TRUE) {
				    $a = 1;
				} else {
				    $a = 2;
				}

				if($a == 1) {
					echo "Exam Deleted Successfully";
				}
				else {
					echo "Error";
				}
	      	}

	      } } ?>
	    </tbody>
	  </table>
	</div>

			<!-- Footer -->
	<br><br>
	<footer>
		<hr>
		<p style="color: grey;" align="right">Developed By Azharul Islam</p>
	</footer>
    	
</body>
</html>

<script type="text/javascript">
	function delete {
 		if(confirm('Sure To Remove This Exam ?')) {
  			window.location.href='http://localhost/online_exam/Index/teachersee/<?php echo $teacher_id;?>';
 		}
	}
</script>