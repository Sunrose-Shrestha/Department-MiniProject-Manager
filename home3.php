<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css?version=1" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
    body{
        background-image:url("./assets/A.png");
        background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
    }
</style>
</HEAD>
<BODY>
    
	<div class="phppot-container" >
        <div class="col btn btn-danger" style="margin-top:5% !important;"> Staff Dashboard</div><div class="page-header">
		</div>
		<div class="page-content jumbotron" style="  background-color: #2B65EC;
  background-image: linear-gradient(to bottom, #659EC7, #79BAEC);">
  <h3 style="color:white; font-weight:bold;">Welcome to Admin Account >>> <?php echo $username;?></h3> <br>
  <div>
    <h4 style="color:white; "> Register the Mini Project Guide, <a href="staff-registration.php"> here</a></h4> 
  </div>
  <div>
    <h4 style="color:white; "> Assign mini project for left out students, <a href="action1.php"> here</a></h4> 
  </div>
</BODY>
</HTML>
