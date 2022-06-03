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
		$conn = mysqli_connect("localhost", "root", "", "college");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 3 values from the form data(input)
		$project_description = $_REQUEST['project_description'];
		$faculty_name = $_REQUEST['faculty_name'];
		$days_required = $_REQUEST['days_required'];
		
		// Performing insert query execution
		// here our table name is faculty_project
		$sql = "INSERT INTO faculty_project VALUES ('$project_description',
			'$faculty_name','$days_required')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully."
				. " Please browse your localhost phpmyadmin"
				. " to view the updated data</h2>";

			echo nl2br("<h3>\nProject description: $project_description\nFaculty name: $faculty_name\n "
				. "Hours required: $hours_required<h3>");
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
