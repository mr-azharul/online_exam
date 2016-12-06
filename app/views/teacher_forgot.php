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

    <div class="container">
        <div class="page-header">
            <h1>Online Examination System</h1>
        </div>
    </div>
    <h2 align="center">Forgot Password</h2>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="" method="post">
                    <p align="center">Enter your email address for identify you. A email will sent on your email address with recovery option</p>
                        <div class="form-group">
                            <label>Student Id</label>
                            <input type="email" class="form-control" placeholder="Email Address" required="1" name="em">
                        </div>
                        <span style="float: right;"><button name="submit" class="btn btn-primary btn-home">Submit</button></span>
                    </form>
                    <?php

                        if (isset($_POST['submit'])) {

                            $host = "localhost";
                            $user = "root";
                            $pass = "";
                            $db   = "exam";

                            $conn = new mysqli($host, $user, $pass, $db);

                            $to = $_POST['em'];

                            $sql    = "SELECT * FROM teacher_sign WHERE teacher_email = $to";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $pass= $row['teacher_pass'];
                                $subject = "Forgot Password";
                                $msg  = "Here is your password ".$pass;
                                $msg  = wordwrap($msg,70);
                                $headers = "emailofazharul@gmail.com";
                                mail($to,$subject,$msg,$headers);
                                echo "<span style='color: green;'>Congratulation! Now check your email for recover your password.</span>";
                            }
                            else {
                                echo "<span style='color: red'>Wrong Email Address</span>";
                            }
                        }
                    ?>
                </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

<br><br>
<footer>
    <hr>
    <p style="color: grey;" align="right">Developed By Azharul Islam</p>
</footer>
        
</body>
</html>