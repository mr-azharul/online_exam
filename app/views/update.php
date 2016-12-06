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
    		<h1>Update Exam: </h1>
    	</div>
    </div><br>

    <div class="container">
    	<?php
    	$exam_id = $_GET['xpzVx'];
    	$sql = "SELECT * FROM teacher_table WHERE exam_id = $exam_id";
    	$result  = $conn->query($sql);?>
    	<div class="container">
	    	<div class="row">
	    	<div class="col-sm-4"></div>
	    		<div class="col-sm-4">
			    	<form action="" method="post">
						<?php $row = $result->fetch_assoc();?>
						Exam Name:   <input type="text" class="form-control" name="en" value="<?php echo $row['exam_name'];?>">
						Course Code: <input type="text" class="form-control" name="cc" value="<?php echo $row['course_code'];?>">
						Exam Date:   <input type="Date" class="form-control" name="d" value="<?php echo $row['date'];?>">
						Start Time:  <input type="Time" class="form-control" name="t" value="<?php echo $row['time'];?>">
						End Time:    <input type="Time" class="form-control" name="et" value="<?php echo $row['end_time'];?>">
						<br><span style="float: right;"><button name="submit" type="submit" class="btn btn-primary">Update</button></span>
					</form>
				</div>
				<div class="col-sm-4"></div>
				</div>
			</div>
		</div>	
	</div>

	<?php

		if(isset($_POST['submit'])) {
			$em = $_POST['en'];
			$cc = $_POST['cc'];
			$d  = $_POST['d'];
			$t  = $_POST['t'];
			$et = $_POST['et'];

			$update = "UPDATE teacher_table SET exam_name = '$em', course_code = '$cc', date = '$d', time = '$t', end_time = '$et', end_time = '$et' WHERE exam_id = '$exam_id'";
			if($conn->query($update) === TRUE) {
				echo "Update Successfull";
				?><script> location.replace("http://localhost/online_exam/Index/teacherhome");</script><?php
			}
			else {
				echo "Error";
			}
		}
	?>

			<!-- Footer -->
	<br><br>
	<footer>
		<hr>
		<p style="color: grey;" align="right">Developed By Azharul Islam</p>
	</footer>
    	
</body>
</html>