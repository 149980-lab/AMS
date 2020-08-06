<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: home.php"); // Redirecting To Profile Page
}
?>



<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>AMS Login Page</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">


      <div id="login">
<h2>Asset Management Login</h2>
        <form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password"><br><br>
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>

       

      </div> <!-- end login -->

    </div>
   
  
  
</body>
</html>
