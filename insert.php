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
<h1><a href="home.php" style="color: black"> 🏠Dashboard </a></h1>
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
		if (isset($_SESSION["email"])) {
    		$guideemail = $_SESSION["email"];
    		$guidename = $_SESSION["username"];
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
		// Taking all 3 values from the form data(input)
		$projectid = $_REQUEST['projectid'];
		$projectdescription = $_REQUEST['projectdescription'];
		$workingdays = $_REQUEST['workingdays'];
		// Performing insert query execution
		// here our table name is faculty_project
		$sql = "INSERT INTO project VALUES ('$projectid', '$projectdescription',
			'$workingdays', '$guideemail', '$guidename')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully."
				. " Please browse your localhost phpmyadmin"
				. " to view the updated data</h2>";

			/*echo nl2br("<h3>\nProject description: $project_description\nFaculty name: $faculty_name\n "
				. "Hours required: $hours_required<h3>");*/
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
