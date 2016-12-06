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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    
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
 ?>

    <div class="container">
        <div class="page-header">
            <h1>Online Examination System</h1>
        </div>
    </div>
    <h2 align="center">Sign Up</h2>
    <p align="center"><a href="http://localhost/online_exam/Index/logview">Have a account, go to Login page</a></p><hr>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" placeholder="Full Name" required="1" name="fn">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Email Address" required="1" name="em">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" id="txtNewPassword" required="1" name="p1">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" id="txtConfirmPassword" required="1" name="p2" onChange="checkPasswordMatch()">
                            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                        </div>
                        <div class="form-group">
                            <label>Student Id</label>
                            <input type="text" class="form-control" placeholder="Student Id" required="1" id="si" name="si" onBlur="checkAvailability()"><span id="user-availability-status"></span>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" placeholder="Type your Department" required="1" name="dp">
                        </div>
                        <div class="form-group">
                            <label>Batch</label>
                            <input type="text" class="form-control" placeholder="Type your Batch" required="1" name="bt">
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <input type="text" class="form-control" placeholder="Type your Section" required="1" name="se">
                        </div>
                        <span style="float: right;"><button type="Submit" name="submit" class="btn btn-primary btn-home">Submit</button></span>
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

<?php

    if (isset($_POST['submit'])) {
            $std_name   = $_POST['fn'];
            $email      = $_POST['em'];
            $std_pass   = $_POST['p1'];
            $std_id     = $_POST['si'];
            $std_dep    = $_POST['dp'];
            $std_batch  = $_POST['bt'];
            $std_sec    = $_POST['se'];

            $sql = "INSERT INTO std_sign(std_name,email,pass,std_id,std_dep,std_batch,std_sec) VALUES('$std_name','$email','$std_pass','$std_id','$std_dep','$std_batch','$std_sec')";

            if ($conn->query($sql) === TRUE) {
                $msg = "Signup successfully";
?>
            <script> location.replace("http://localhost/online_exam/Index/logview");</script>
<?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        $conn->close();
    }

?>

<script>
    function checkAvailability() {
        jQuery.ajax({
        url: "http://localhost/online_exam/Index/check_availability",
        data:'si='+$("#si").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
        },
        error:function (){}
        });
    }

    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword)
            $("#divCheckPasswordMatch").html("<span style='color: red;'>Passwords do not match!");
        else
            $("#divCheckPasswordMatch").html("<span style='color: green;'>Passwords match.</span>");
    }

    $(document).ready(function () {
       $("#txtNewPassword, #txtConfirmPassword").keyup(checkPasswordMatch);
    });

</script>