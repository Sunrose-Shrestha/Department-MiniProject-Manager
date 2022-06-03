<!DOCTYPE html>
<html lang="en">

<head>
	<title>Faculty Portal 2</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<img class="cmr" src="cmrit.jpg" alt="cmrit">	
	<center>
		<h1>Enter the mini project review marks here</h1>

		<form action="insert2.php" method="post">
			
			
<!--<p>
				<label for="studentName">Student Name:</label>
				<input type="text" name="student_name" id="studentName">
			</p>-->



			
			
<p>
				<label for="usn">USN:</label>
				<input type="text" name="usn" id="usn">
			</p>



			
			
<p>
				<label for="projectId">Project Id:</label>
				<input type="int" name="project_id" id="projectId">
			</p>


			<!--<p>
				<label for="projectDescription">Project Description:</label>
				<input type="text" name="project_description" id="projectDescription">
			</p>

			<p>
				<label for="projectGuide">Project Guide:</label>
				<input type="text" name="project_guide" id="projectGuide">
			</p>-->

			<p>
				<label for="review1">Review 1 marks:</label>
				<input type="int" name="review1" id="review1">
			</p>

			<p>
				<label for="review2">Review 2 marks:</label>
				<input type="int" name="review2" id="review2">
			</p>

			<p>
				<label for="review3">Review 3 marks:</label>
				<input type="int" name="review3" id="review3">
			</p>

			<!--<p>
				<label for="finalMarks">Final marks:</label>
				<input type="int" name="final_marks" id="finalMarks">
			</p>-->

			
			<input type="submit" value="Submit">
		</form>
	</center>
</body>

</html>
