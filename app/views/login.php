<!DOCTYPE html>
<!-- saved from url=(0035)http://demo.phptpoint.com/quiz/home -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="php online exam, php quiz script, php quiz code, php quiz application, quiz php code, php quiz system, online quiz using php, quiz using php, how to make quiz in php, quiz system in php, php programming quiz, online quiz using php and mysql, create online quiz using php and mysql, create quiz using php mysql, php quiz script free">
    <meta name="keywords" content="php quiz script, php quiz code, php quiz application, quiz php code, php quiz system, online quiz using php, quiz using php, how to make quiz in php, quiz system in php, php programming quiz, online quiz using php and mysql, create online quiz using php and mysql, create quiz using php mysql, php quiz script free">
	<meta name="author" content="https://plus.google.com/+MuniAyothi/">
    
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

    <div class="container">
        <div class="page-header">
            <h1>Online Examination System</h1>
        </div>
    </div>
    <h2 align="center">Log In</h2>
    <p align="center"><a href="http://localhost/online_exam/Index/signview">Have No Account??, go to Signup page</a></p><hr>

    <p align="center"><?php if(isset($msg)) { echo $msg; } ?></p>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <?php

                        if (isset($_POST['submit'])) {

                            $host = "localhost";
                            $user = "root";
                            $pass = "";
                            $db   = "exam";

                            $conn = new mysqli($host, $user, $pass, $db);

                            $std_id     = $_POST['si'];
                            $std_pass   = $_POST['p1'];

                            $sql    = "SELECT * FROM std_sign WHERE std_id = $std_id";
                            $result = $conn->query($sql);
                            if($conn->query($sql) == true) {
                                $row = $result->fetch_assoc();
                                $id     = $row['std_id'];
                                $pass   = $row['pass'];
                                $name   = $row['std_name'];

                                if ($id == $std_id) {
                                    if ($pass == $std_pass) {
                                        session_start();
                                        $_SESSION['std_id'] = $id;
                                        $_SESSION['name']   = $name;
                                        header('Location: http://localhost/online_exam/Index/home');
                                    }
                                    else {
                                        echo "<span style='color: red'>Wrong Password</span>";
                                    }
                                }
                                else {
                                    echo "<span style='color: red'>Wrong Id Number</span>";
                                }
                            }
                            else {
                                echo "<span style='color: red'>Wrong ID Number</span>";
                            }
                        }

                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Student Id</label>
                            <input type="text" class="form-control" placeholder="Student Id" required="1" name="si">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" required="1" name="p1">
                        </div>
                        <span style="float: left;"><a href="http://localhost/online_exam/Index/forgot">Forgot Password</a></span>
                        <span style="float: right;"><button name="submit" class="btn btn-primary btn-home">Submit</button></span>
                    </form>
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