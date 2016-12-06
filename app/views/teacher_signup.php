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

    <div class="container">
        <div class="page-header">
            <h1>Online Examination System</h1>
        </div>
    </div>
    <h2 align="center">Teacher Sign Up</h2>
    <p align="center"><a href="http://localhost/online_exam/Index/teacherlogin">Have a account, go to Login page</a></p><hr>

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

                            if($_POST['p1'] == $_POST['p2']) {
                                $th_name   = $_POST['fn'];
                                $email     = $_POST['em'];
                                $th_pass   = $_POST['p2'];
                                $th_dep    = $_POST['dp'];

                                $sql ="INSERT INTO teacher_sign(teacher_name,teacher_email,teacher_pass,teacher_dep)VALUES('$th_name','$email','$th_pass','$th_dep')";

                                if ($conn->query($sql) === TRUE) {
                                    header('Location:http://localhost/online_exam/Index/teacherlogin');
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            } else {
                                echo "<span style='color: red;'><p align='center'>Sorry! Password Not Match</p></span>";
                            }

                            $conn->close();
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" placeholder="Full Name" required="1" name="fn">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Email Address" required="1" id="em" name="em" onBlur="checkAvailability()"><span id="user-availability-status"></span>
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
                            <label>Department</label>
                            <input type="text" class="form-control" placeholder="Department" required="1" name="dp">
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

<script>
    function checkAvailability() {
        jQuery.ajax({
        url: "http://localhost/online_exam/Index/check_availability",
        data:'em='+$("#em").val(),
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