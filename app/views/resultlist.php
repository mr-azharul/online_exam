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
				$std_id = $_SESSION['std_id'];
			?>
			
			<!-- Navbar -->
			  <div class="collapse navbar-collapse">
			   	<ul class="nav navbar-nav">
			      <li><a href="http://localhost/online_exam/Index/home">Home</a></li>
			      <li><a href="http://localhost/online_exam/Index/exams">Exams</a></li>
			      <li class="active"><a href="http://localhost/online_exam/Index/results/<?php echo $std_id;?>">Results</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Wellcome <?php echo $_SESSION['name'];?> <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="http://localhost/online_exam/Index/logout">Log Out</a></li>
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
    		<h1>Your Results: </h1>
    	</div>
    </div><br>

    <div class="container">
	  <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Exam Name</th>
	        <th>Course Code</th>
	        <th>Teacher Name</th>
	        <th>Marks</th>
	        <th>Out of</th>
	      </tr>
	    </thead>
	    <tbody>
		    <?php
				if(isset($result)) {
				foreach ($result as $value) {
			?>
	      <tr>
	        <td><?php echo $value['exam_name']; ?></td>
	        <td><?php echo $value['course_code']; ?></td>
	        <td><?php echo $value['teacher_name']; ?></td>
	        <td><?php echo $value['marks']; ?></td>
	        <td><?php echo $value['outof']; ?></td>
	      </tr>
	      <?php } } ?>
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