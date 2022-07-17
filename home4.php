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
        <div class="col btn btn-danger" style="margin-top:5% !important;"> Select Mini Project Title From Here</div><div class="page-header">
		</div>
		<div class="page-content jumbotron" style="  background-color: #2B65EC;
  background-image: linear-gradient(to bottom, #659EC7, #79BAEC);">
<?php 

require_once("connection1.php");
$query = " SELECT * FROM project";
$result = mysqli_query($con,$query);


    ?>

<table class="table table-bordered">
<thead>
        <tr>
            <th colspan="5">Mini Project Titles Assigned By Faculties</th>
        </tr>
    </thead>
                            <tr>
                                <td> Project ID </td>
                                <td> Project Description </td>
                                <td> Working Days </td>
                                <td> Guide Name</td>
                                <td> Guide Email </td>
                            </tr>

                            <?php 
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $projectId = $row['projectid'];
                                        $projectDescription = $row['projectdescription']; 
                                        $workingDays = $row['workingdays'];
                                        $guideName = $row['guidename'];
                                        $guideEmail = $row['guideemail'];
                                        
                                        
                            ?>        
                            <?php 
                                      
                             ?>
                                    <tr>
                                        <td><?php echo $projectId ?></td>
                                        <td><?php echo $projectDescription ?></td>
                                        <td><?php echo $workingDays ?></td>
                                        <td><?php echo $guideName ?></td>
                                        <td><?php echo $guideEmail ?></td>
                                        
                                    </tr>        
                            <?php 
                                   }   
                             ?>
                                   

                        </table> <br><br><br>

    
                        <?php   /*
require_once("connection1.php");
$query = " select * from student_project ";
$result = mysqli_query($con,$query);

    ?>

<table class="table table-bordered">
<thead>
        <tr>
            <th colspan="5">LIST OF MINI PROJECTS ELECTED BY STUDENTS</th>
        </tr>
    </thead>
                            <tr>
                                <td> Project Id </td>
                                <td> USN </td>
                                <td> Student Name </td>
                                <!--<td> Project Description </td>-->
                                <td> Project Guide </td>
                            </tr>

                            <?php 
                                
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $studentName = $row['student_name'];
                                        $usn = $row['usn'];
                                        $projectId = $row['project_id'];
                                        //$projectDescription = $row['project_description'];
                                        $projectGuide = $row['project_guide'];
                                        
                            ?>
                                    <tr>
                                        <td><?php echo $projectId ?></td>
                                        <td><?php echo $usn ?></td>
                                        <td><?php echo $studentName ?></td>
                                        <!--<td><?php echo $projectDescription ?></td>-->
                                        <td><?php echo $projectGuide ?></td>
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table> <br><br><br>

                        <?php 

require_once("connection2.php");
$query = " select * from project_review ";
$result = mysqli_query($con,$query);

    ?>

<table class="table table-bordered">
<thead>
        <tr>
            <th colspan="9">MINI PROJECT REVIEW MARKS ASSIGNED BY FACULTY</th>
        </tr>
    </thead>
    <tr>
                                <td> Project Id </td>
                                <td> USN </td>
                                <td> Review 1 </td>
                                <td> Review 2 </td>
                                <td> Review 3 </td>
                                <td> Final Marks </td>
                            </tr>

                            <?php 
                                
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $usn = $row['usn'];
                                        $projectId = $row['project_id'];
                                        $review1 = $row['review1'];
                                        $review2 = $row['review2'];
                                        $review3 = $row['review3'];
                                        $finalMarks = ($review1+$review2+$review3)/3;
                            ?>
                                    <tr>
                                        <td><?php echo $projectId ?></td>
                                        <td><?php echo $usn ?></td>
                                        <td><?php echo $review1 ?></td>
                                        <td><?php echo $review2 ?></td>
                                        <td><?php echo $review3 ?></td>
                                        <td><?php printf("%.2f",$finalMarks) ?></td>
                                        
                                    </tr>        
                            <?php 
                                    }  */
                            ?>                                                                         
                                   

                        </table>
  <!--
  <div>
  <iframe width="650" height="600" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSMBX-DWTthnlBO4IqeArxTQu1LsvJUAhPu_0eFBKOHUQdYhuxGuId4MROMSnx2uVTmBkccUg4cBXY-/pubhtml"></iframe>
  </div>
  <br><br>
  <div>
  <iframe width="650" height="600" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSOQ1fIhQL1TuX9SQwAzs6rKN4jyKwD4UXJYWp1ltudipz8haEUYgT-mqt9nySvVWnIbP2iCVPx2QPJ/pubhtml"></iframe>
  </div>
  <br><br>
  <div>
  <iframe width="650" height="600" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRANWpL0D6XYTacSaO-7nmhSi1PlsdLFOGI5dI4k0mrJ6bIE1G9wSKt-v91Z5RXNtE9sqO1C_VEFPx9/pubhtml"></iframe>
  </div>
  -->
  
  
        </div> 
  
	</div>
</BODY>

</HTML>