<!DOCTYPE html>
<html>

<head>
	<title>Insert Page</title>

	<style>
		body{
			background-color: #79BAEC;
		}
	</style>
</head>

<body>
<h1><a href="home1.php" style="color: black"> 🏠Dashboard </a></h1>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "dmpm");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		session_start();
		if (isset($_SESSION["leademail"])) {
    		$leademail = $_SESSION["leademail"];
    		$leadname = $_SESSION["leadname"];
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
		
		// Taking all 4 values from the form data(input)
		$report = $_REQUEST['report'];
		
		// Performing insert query execution
		// here our table name is student_project
		$sql = "UPDATE team SET report='$report' WHERE leadname='$leadname'";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully."
				. " Please browse your localhost phpmyadmin"
				. " to view the updated data</h2>";

			/*echo nl2br("<h3>\nStudent name: $student_name \nUSN: $usn \nProject id: $project_id \n Project guide: $project_guide</h3> ");*/
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
