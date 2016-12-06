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

				$host = "localhost";
		        $user = "root";
		        $pass = "";
		        $db   = "exam";

		        $conn = new mysqli($host, $user, $pass, $db);

		        $last   	= "SELECT exam_id FROM teacher_table ORDER BY exam_id DESC limit 1";
		        $re 		= $conn->query($last);
	        	$raw		= $re->fetch_assoc();
	        	$last_id	= $raw['exam_id'];
	        	$select 	= "SELECT total_ques FROM teacher_table WHERE exam_id = $last_id limit 1";
	        	$result 	= $conn->query($select);
	        	$row		= $result->fetch_assoc();
	        	$num		= $row['total_ques'];
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

		<!-- Main Body -->
	<br>
	<div class="container">
  		<div class="page-header">
    		<h1>Add Questions: </h1>
    	</div>
    </div><br>
    <div class="container">
		<form action="" method="post">
			<?php for($i=1; $i<=$num; $i++) { ?>
			<div class="form-group">
			 	<label>Question No: <?php echo $i; ?></label>
			 	<?php echo "<input type='text' class='form-control' required='1' name='qu[$i]'><br/>";
			 	echo "<lable>Answer: </lable>";
			 	echo "<input type='text' class='form-control' required='1' name='ans[$i]'><br>";?>
			</div> <?php } ?>
			<center><button name='submit' class='btn btn-primary btn-home' style="width: 200px;">Submit</button></center>
		</form>
	</div>
	
	
	<?php
		if(isset($_POST['submit'])) {
			$question = array_values($_POST['qu']);
			$answer = array_values($_POST['ans']);

			if(isset($last_id)) {
				for($j=0; $j<count($question); $j++) {
					$sql[$j] = "INSERT INTO exam_$last_id(question, answer) VALUES('$question[$j]', '$answer[$j]')";
					
					if ($conn->query($sql[$j]) === TRUE) {
						$msg = "Exams Created Successfully";
					}
					else {
						echo "Error: " . $sql[$j] . "<br>" . $conn->error;
					}
				}

				if(isset($msg)) {
					?><script> location.replace("http://localhost/online_exam/Index/teacherhome");</script><?php
				}
			}
			else {
				echo "Last Id not found!";
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
//*<!--<script> location.replace("http://localhost/online_exam/Index/teacherhome");-->