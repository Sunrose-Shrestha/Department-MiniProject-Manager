<!DOCTYPE html>
<html lang="en">

<head>
	<title>Faculty Portal 1</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<img class="cmr" src="cmrit.jpg" alt="cmrit">	
	<center>
		<h1>Enter the mini project details here</h1>

		<form action="insert.php" method="post">
			
			
<p>
				<label for="projectDescription">Project Description:</label>
				<input type="text" name="project_description" id="projectDescription">
			</p>



			
			
<p>
				<label for="facultyName">Faculty Name:</label>
				<input type="text" name="faculty_name" id="facultyName">
			</p>



			
			
<p>
				<label for="hoursRequired">Days Required:</label>
				<input type="int" name="days_required" id="daysRequired">
			</p>



			
			<input type="submit" value="Submit">
		</form>
	</center>
</body>

</html>
