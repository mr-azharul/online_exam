<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Online Examination System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: black !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Online Examination System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">ABOUT</a></li>
        <li><a href="#tour">FEATURES</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Students
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/online_exam/Index/logview">Log In</a></li>
            <li><a href="http://localhost/online_exam/Index/signview">Sign Up</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Teachers
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/online_exam/Index/teacherlogin">Log In</a></li>
            <li><a href="http://localhost/online_exam/Index/teachersignup">Sign Up</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="http://localhost/online_exam/Index/image1" width="700" height="500">
        <div class="carousel-caption">
          <h3>Online Examination System</h3>
          <p>A System For Make Easy Your Life</p>
        </div>      
      </div>

      <div class="item">
        <img src="http://localhost/online_exam/Index/image2" width="700" height="500">
        <div class="carousel-caption">
          <h3>Online Examination System</h3>
          <p>A System For Make Teachers Happy</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="http://localhost/online_exam/Index/image3" width="700" height="500">
        <div class="carousel-caption">
          <h3>Online Examination System</h3>
          <p>A System For Make Students Happy</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>ABOUT</h3>
  <p><em>Online Examination System</em></p>
  <p style="text-align: justify;">Today Online Examination System has become a fast growing examination method because of its speed and accuracy. It is also needed less manpower to execute the examination. Almost all organizations now-a-days, are conducting their exams by online examination system, it saves students time in examinations. Organizations can also easily check the performance of the student that they give in an examination. As a result of this, organizations are releasing results in less time. It also helps the environment by saving paper. According to today’s requirement, online examination project in php is very useful to learn it.</p>
  <br>
</div>

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">FEATURES</h3>
    <p class="text-center">Online Examination System Features</p>
      <ul class="list-group">
        <li>Login system must be present and secured by password</li>
        <li>Ability to save the answer given by the candidate along with the question</li>
        <li>Answer checking system should be available</li>
        <li>Could Update Profile</li>
        <li>Log out after the over</li>
        <li>Teachers and Students have different profiles</li>
      </ul>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Student Portal</h3>

  <div class="row">
    <p>Online Examination System is a very friendly system to students. There students should have to create a profile for him self first. After Complete the profile registration, then you have to log into on your profile. There you will find the examination list. From there you have to select the exam, where you want to participate. After Complete the exam, you will find the result on your results tab.</p>
    <div align="center"><br><br>
      <a class="btn btn-primary" href="http://localhost/online_exam/Index/logview">Log In</a>
      <a class="btn btn-primary" href="http://localhost/online_exam/Index/signview">Sign Up</a>
    </div>
  </div>
</div>

<hr>

<div class="container">
  <h3 class="text-center">Teacher Portal</h3>

  <div class="row">
    <p>Online Examination System is a very friendly system to teachers. There teachers should have to create a profile for him self first. After Complete the profile registration, then you have to log into on your profile. There you will find the options for create exam. From there you have to create the exam, by given the details. After Complete the exam create, you will see the examlist on your resultlist tab.</p>
    <div align="center"><br><br>
      <a class="btn btn-primary" href="http://localhost/online_exam/Index/teacherlogin">Log In</a>
      <a class="btn btn-primary" href="http://localhost/online_exam/Index/teachersignup">Sign Up</a>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-right">
  <p>Developerd By Azharul Islam</p> 
</footer>

</body>
</html>