<?php
	session_start();
	if(isset($_SESSION['name']) == NULL){
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

		$host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "exam";

        $conn = new mysqli($host, $user, $pass, $db);


		date_default_timezone_set("Asia/dhaka");
		$exam_id = $_GET['xuypx'];
		$teacher = "SELECT * FROM teacher_table WHERE exam_id = $exam_id";
		$result  = $conn->query($teacher);
		$row     = $result->fetch_assoc();
		$exam    = "SELECT * FROM exam_$exam_id ORDER BY q_id ASC";
		$re      = $conn->query($exam);
		$num     = mysqli_num_rows($re);
		$count   = array('0');
		$mark 	 = 0;
		$std     = $_SESSION['std_id'];
		$name    = $row['exam_name'];
		$cc      = $row['course_code'];
		$tnam    = $row['teacher_name'];
		$out     = $row['outof'];
		$date 	 = $row['date'];
		$start   = $row['time'];
		$end     = $row['end_time'];
		$cdate   = date("Y-m-d");
		$time    = date("H:i:s");
		$per	 = $row['mark_per'];

		if($cdate > $date) {
			echo "<span style='color: red;'><h1 align='center'>Exam Date Is Already Over!</h1></span>";
			$sqld = "UPDATE teacher_table SET exam_status='1' WHERE exam_id=$exam_id";
			if ($conn->query($sqld) === TRUE) {
			    $a=1;
			}
			else {
				$a=2;
			}
		}
		elseif($cdate < $date) {
			echo "<span style='color: red;'><h1 align='center'>Exam Is Not Started Yet!</h1></span>";
		}
		elseif($cdate == $date) {
			if($time > $end) {
				echo "<span style='color: red;'><h1 align='center'>Exam Time Is Already Over!</h1></span>";
				$sqlt = "UPDATE teacher_table SET exam_status='1' WHERE exam_id=$exam_id";
				if ($conn->query($sqlt) === TRUE) {
				    $a=1;
				}
				else {
					$a=2;
				}
			}
			elseif($time < $start) {
				echo "<span style='color: red;'><h1 align='center'>Exam Is Not Started Yet!</h1></span>";
			}
			else { ?>
							<!-- Main Body -->
				<div class="container" align="center">
					<h1>Sub: <?php echo $name;?></h1>
					<p>Course Code: <?php echo $cc;?></p>
					<p>Teacher Name: <?php echo $tnam;?></p>
					<p>Start Time: <?php echo $start;?> End Time: <?php echo $end;?></p>
			    </div>
			    <hr><br>

				<div class="container-fluid">
					<div class="row">
						<form action="" method="post">
						<?php while($raw = $re->fetch_assoc()) { ?>
						<h3 align="center"><span style="color: green;">Question No: <?php echo $q=$raw['q_id'];?></span></h3><br>
						<h4 align="center"><b><?php echo $raw['question']; ?></h4></p><br>
						<div class="container" align="center">
						    <div class="form-group">
						      	<?php echo "<textarea class='form-control' rows='5' name='ans[$q]'></textarea>";
						      		  echo "<input type='hidden' class='form-control' name='mat[$q]' value='$raw[answer]'><br>";?>
						    </div>
						   <?php } ?>
						   <span style="float: right;"><button name="submit" class="btn btn-primary btn-home">Submit</button></span>
						</form>
						</div>
						<?php
							if(isset($_POST['submit'])) {
								$input = array_values($_POST['ans']);
								$answer = array_values($_POST['mat']);
								for($j = 0; $j<count($input); $j++) {
									$in = str_replace("  ", " ", $input[$j])."<br>";
									$ans = str_replace("  ", " ", $answer[$j])."<br>";
									$com = strcasecmp($in, $ans);
									if($com == 0) {
										array_push($count, 1);
										$mark++;
									}
									else {
										array_push($count, 0);
									}
								}
								/*for($i=1; $i<count($count); $i++) {
									if($count[$i]==1){
										echo "Question NO. ".$i." = "."<span style='color: green;'>Right Answer</span><br>";
									}
									else {
										echo "Question NO. ".$i." = "."<span style='color:red;'>Wrong Answer</span><br>";
									}
								}
								echo "<br>Your Total Score is: ".$mark;*/

								$total = $mark*$per;
								$sql = "INSERT INTO std_table(std_id,exam_id,exam_name,course_code,teacher_name,marks,outof) VALUES('$std','$exam_id','$name','$cc','$tnam','$total','$out')";
								if ($conn->query($sql) === TRUE) {
									?><script> location.replace("<?php echo BASE_URL;?>/Index/success");</script><?php }
								else {
									echo "Exam Error!";
								}
							}
						?>
					</div>
				</div>

						<!-- Footer -->
				<br><br>
				<footer>
					<hr>
					<p style="color: grey;" align="right">Developed By Azharul Islam</p>
				</footer>
			
		<?php }
		}
	?>
    	<br>
    	<div class="col-sm-4"></div>
    	<div class="col-sm-4">
    		<a href="<?php echo BASE_URL;?>/Index/exams" class="btn btn-home" style="background-color: rgb(31, 43, 49); color: white;">Back To Exam List</a>
    	</div>
    	<div class="col-sm-4"></div>
    	<span id="countdown" class="timer"></span>
</body>
</html>
<?php
	/*$s = strtotime($start);
	$c = strtotime($time);
	echo $dif = $s - $c;*/
?>
<script>
	/*var seconds = <php echo $dif;?>;
	function secondPassed() {
	    var minutes = Math.round((seconds - 30)/60);
	    var remainingSeconds = seconds % 60;
	    if (remainingSeconds < 10) {
	        remainingSeconds = "0" + remainingSeconds;  
	    }
	    document.getElementById('countdown').innerHTML = minutes+" Min " + ":" + remainingSeconds + " Seconds";
	    if (seconds == 0) {
	        clearInterval(countdownTimer);
	        document.getElementById('countdown').innerHTML = "Exam Is Started, Please Reload The Page";
	    } else {
	        seconds--;
	    }
	}
	 
	var countdownTimer = setInterval('secondPassed()', 1000);*/
</script>