<?php
	session_start();
	if(isset($_SESSION['teacher_name']) == NULL){
		header("Location: http://localhost/online_exam/Index/index");
	}
	else {
		header('Content-Type: text/html; charset=utf-8');
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
				$teacher_id 	= $_SESSION['teacher_id'];
				$teacher_name 	= $_SESSION['teacher_name'];
			?>
			
			<!-- Navbar -->
			  <div class="collapse navbar-collapse">
			   	<ul class="nav navbar-nav">
			      <li><a href="http://localhost/online_exam/Index/teacherhome">Home</a></li>
			      <li class="active"><a href="http://localhost/online_exam/Index/teachercreate">Create Exams</a></li>
			      <li><a href="http://localhost/online_exam/Index/teachersee/<?php echo $teacher_id;?>">See Exams</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Wellcome <?php echo $teacher_name;?> <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="http://localhost/online_exam/Index/teacherlogout">Log Out</a></li>
			        </ul>
			       </li>
			    </ul>
			  </div>
		</div>
	</div>
	<br><br>

	<?php
		if(isset($msg)) {
			echo $msg;
		}
	?>

			<!-- Main Body -->
	<br>
	<div class="container">
  		<div class="page-header">
    		<h1>Create Exam: </h1>
    	</div>
    </div><br>

    <div class="container">
		<form action="" method="post">
			<div class="form-group">
				Exam Name: <input type="text" class="form-control" placeholder="Subject Name" name="en" required="1">
			</div>
			<div class="form-group">
				Course Code: <input type="text" class="form-control" placeholder="Course Code" name="cc">
			</div>
			<div class="form-group">
				Total Number of Questions: <input type="number" class="form-control" placeholder="Total Number of Questions" name="tq" required="1">
			</div>
			<div class="form-group">
				Mark Per Right Answer: <input type="number" class="form-control" placeholder="Mark Per Right Answer" name="mp" required="1">
			</div>
			<div class="form-group">
				Total Marks: <input type="number" class="form-control" placeholder="Total Marks" name="tm" required="1">
			</div>
			<div class="form-group">
				Exam Date: <input type="Date" class="form-control" placeholder="yyyy/mm/dd" name="ed" required="1">
			</div>
			<div class="form-group">
				Exam Start Time: <input type="Time" class="form-control" placeholder="hh:mm:ss (24 hours formate)" name="st" required="1">
			</div>
			<div class="form-group">
				Exam End Time: <input type="Time" class="form-control" placeholder="hh:mm:ss (24 hours formate)" name="et" required="1">
			</div>
			<span style="float: right;"><button name="next" class="btn btn-primary btn-home">Next</button></span>
		</form>
	</div>

			<!-- Footer -->
	<br><br>
	<footer>
		<hr>
		<p style="color: grey;" align="right">Developed By Azharul Islam</p>
	</footer>
    	
</body>
</html>

<?php
	if(isset($_POST['next'])) {
		$host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "exam";

        $conn = new mysqli($host, $user, $pass, $db);

		$teacher_id 	= $_SESSION['teacher_id'];
		$teacher_name 	= $_SESSION['teacher_name'];
		$exam_name 		= $_POST['en'];
		$course_code 	= $_POST['cc'];
		$total_ques 	= $_POST['tq'];
		$mark_per 		= $_POST['mp'];
		$outof 			= $_POST['tm'];
		$date 			= $_POST['ed'];
		$time 			= $_POST['st'];
		$end_time 		= $_POST['et'];
		$exam_status 	= 0;

		$sql = "INSERT INTO teacher_table(teacher_name, teacher_id, exam_name, course_code, total_ques, mark_per, outof, date, time, end_time, exam_status) VALUES('$teacher_name', '$teacher_id', '$exam_name', '$course_code', '$total_ques', '$mark_per', '$outof', '$date', '$time', '$end_time', '$exam_status')";

		if($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			$create = "CREATE TABLE exam_$last_id(q_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, question varchar(255) NOT NULL, answer varchar(255) NOT NULL)";
			if($conn->query($create) === TRUE) {
?>
				<script> location.replace("http://localhost/online_exam/Exam/addQuestion");</script>
<?php
			}
			else {
				echo "Table Create Error";
			}
		}
		else {
			echo "Exam Create Error";
		}

		$conn->close();
	}
?>