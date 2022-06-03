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
		
		// Taking all 4 values from the form data(input)
		$student_name = $_REQUEST['student_name'];
		$usn = $_REQUEST['usn'];
		$project_id = $_REQUEST['project_id'];
		$project_guide = $_REQUEST['project_guide'];
		
		
		// Performing insert query execution
		// here our table name is student_project
		$sql = "INSERT INTO student_project VALUES ('$student_name','$usn','$project_id', '$project_guide')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully."
				. " Please browse your localhost phpmyadmin"
				. " to view the updated data</h2>";

			echo nl2br("<h3>\nStudent name: $student_name \nUSN: $usn \nProject id: $project_id \n Project guide: $project_guide</h3> ");
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
