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
		
		// Taking all 5 values from the form data(input)
		//$student_name = $_REQUEST['student_name'];
		$usn = $_REQUEST['usn'];
		$project_id = $_REQUEST['project_id'];
		//$project_description = $_REQUEST['project_description'];
		//$project_guide = $_REQUEST['project_guide'];
		$review1 = $_REQUEST['review1'];
		$review2 = $_REQUEST['review2'];
		$review3 = $_REQUEST['review3'];
		//$final_marks = $_REQUEST['final_marks'];

		// Performing insert query execution
		// here our table name is project_review
		$sql = "INSERT INTO project_review VALUES ('$usn','$project_id','$review1', '$review2', '$review3')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully."
				. " Please browse your localhost phpmyadmin"
				. " to view the updated data</h2>";

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
