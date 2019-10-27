<?php
	
	$str_browser_language = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
	$str_browser_language = !empty($_GET['language']) ? $_GET['language'] : $str_browser_language;
	//MAKE SURE server we upload website to has a mail server or we set up a gmail webserver

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Moms Against AI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>  
 
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #4663e8;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: ##2b3e94;
    font-size: 50px;
  }
  .logo {
    color: ##2b3e94;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #2b3e94;
  }
  .carousel-indicators li {
    border-color: #2b3e94;
  }
  .carousel-indicators li.active {
    background-color: #2b3e94;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #2b3e94; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #2b3e94;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #2b3e94 !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #2b3e94;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #2b3e94;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #2b3e94 !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #2b3e94;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
   
   
    input[type=text], 
    input[type=password] { 
        width: 100%; 
        padding: 15px 15px; 
        margin: 15px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        box-sizing: border-box; 
    } 
    
    button { 
        background-color: #1b1d45; 
        color: white; 
        padding: 15px 20px; 
        margin: 5px 0; 
        border: none; 
        cursor: pointer; 
        width: 100%; 
    } 
    
    button:hover { 
        opacity: 0.8; 
    } 
    
    .cancelbtn { 
        width: auto; 
        padding: 10px 18px; 
        background-color: #f44336; 
    } 
  
    .imgcontainer { 
        text-align: center; 
        margin: 24px 0 12px 0; 
        position: relative; 
    } 
    
    img.avatar { 
        width: 40%; 
        border-radius: 50%; 
    } 
    
    .container { 
        padding: 16px; 
    } 
      
    span.psw { 
        float: right; 
        padding-top: 16px; 
    } 
     
    .modal { 
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0; 
        top: 0; 
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0, 0, 0); 
        background-color: rgba(0, 0, 0, 0.4); 
        padding-top: 60px; 
    } 
    
    .modal-content { 
        background-color: #fefefe; 
        margin: 7% auto 25% auto; 
        border: 1px solid #888; 
        width: 100%; 
    } 
    
    
    .close { 
        position: absolute; 
        right: 25px; 
        top: 0; 
        color: #000; 
        font-size: 35px; 
        font-weight: bold; 
    } 
      
    .close:hover, 
    .close:focus { 
        color: red; 
        cursor: pointer; 
    } 
	
    .animate { 
        -webkit-animation: animatezoom 0.6s; 
        animation: animatezoom 0.6s 
    } 
      
    @-webkit-keyframes animatezoom { 
        from { 
            -webkit-transform: scale(0) 
        } 
        to { 
            -webkit-transform: scale(1) 
        } 
    } 
      
    @keyframes animatezoom { 
        from { 
            transform: scale(0) 
        } 
        to { 
            transform: scale(1) 
        } 
    } 
      
    @media screen and (max-width: 300px) { 
        span.psw { 
            display: block; 
            float: none; 
        } 
        .cancelbtn { 
            width: 100%; 
        } 
    } 
  
  </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
		<li><a href="#mission">MISSION</a></li>
        <li><a href="#values">VALUES</a></li>
        <li><a href="#events">EVENTS</a></li>
        <li><a href="#contact">CONTACT</a></li>

<!-- add php session detection to remove login and sighup button if logged in and add logout button-->
		
		<!--login button-->
		<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> 
  
        <div id="id01" class="modal"> 
  
        <form class="modal-content animate" action="/login.php" method='post'> 
            <div class="imgcontainer"> 
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> 
            </div> 

            <div class="container"> 
                <label><b>Username</b></label> 
                <input type="text" placeholder="Enter Username" name="uname" required> 
  
                <label><b>Password</b></label> 
                <input type="password" placeholder="Enter Password" name="psw" required> 
  
                <button type="submit" name="login-submit">Login</button> 
                <input type="checkbox" checked="checked"> Remember me 
            </div> 
  
            <div class="container" style="background-color:#f1f1f1"> 
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> 
                <span class="psw">Forgot <a href="/forgot_pwd.php">password?</a></span> 
            </div> 
        </form> 
    </div> 
  
    <script> 
        var modal = document.getElementById('id01'); 
        window.onclick = function(event) { 
            if (event.target == modal) { 
                modal.style.display = "none"; 
            } 
        } 
    </script>
		
	<!--signup button-->	
	<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SignUp</button> 
  
    <div id="id02" class="modal"> 
  
      <form class="modal-content animate" action="/register.php"> 
         <div class="imgcontainer"> 
             <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span> 
         </div> 
  
         <!-- add echo error messages that match url error messages when user fails to fill in field properly-->

         <div class="container"> 
            <label><b>Create Username</b></label> 
            <input type="text" placeholder="New Username" name="uname" required> 

            <label><b>Email</b></label> 
            <input type="email" placeholder="Email" name="email" required>
  
            <label><b>Create Password</b></label> 
            <input type="password" placeholder="New Password" name="psw" required> 

            <label><b>Confirm Password</b></label> 
            <input type="password" placeholder="Confirm Password" name="con_psw" required>
  
            <button type="submit" name="signup-submit">SignUp</button> 
         </div> 
  
         <div class="container" style="background-color:#f1f1f1"> 
             <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> 
         </div> 
      </form> 
   </div> 
  
   <script> 
      var modal = document.getElementById('id01'); 
      window.onclick = function(event) { 
       if (event.target == modal) { 
          modal.style.display = "none"; 
       } 
     } 
    </script>	
	
      </ul>
    </div>
  </div>
</nav>

<div id="id02" class="modal">
	<form action="reset_pwd_email.php" method="post">
		<h1>Reset Password</h1>
		<p>Enter your email so instructions on how to reset your password can be sent to you</p>
		<p>Use the same email as your account!</p>
		<label><b>Email</b></label> 
		<input type="email" placeholder="Email" name="email" required>
		<button type="submit" name="forgot-pwd-submit">Send</button>
	</form>
</div>

</body>
</html>
