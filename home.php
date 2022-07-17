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
  <h3 style="color:white; font-weight:bold;">Welcome to CMRIT Staff Account >>> <?php echo $username;?></h3> <br>
  <div>
    <h4 style="color:white; "> Submit your mini project details<a href="action.php"> here</a></h4> 
  </div>
  
  <div>
    <h4 style="color:white; "> Assign the review marks<a href="action2.php"> here</a></h4> <br><br>
  </div>

  <?php 

require_once("connection.php");
$query = " SELECT * FROM project,team,staff WHERE project.projectid=team.projectid and staff.email=project.guideemail and team.guidename='$username'";
/*$query2 = " SELECT * FROM team WHERE guidename='$username'";*/
$result = mysqli_query($con,$query);
/*$result2 = mysqli_query($con,$query2);*/

    ?>

<table class="table table-bordered">
<thead>
        <tr>
            <th colspan="9">DETAILS OF MINI PROJECTS ASSIGNED</th>
        </tr>
    </thead>
                            <tr>
                                <td> Project ID </td>
                                <td> Project Description </td>
                                <td> Team No </td>
                                <td> Team Lead</td>
                                <td> Review 1 </td>
                                <td> Review 2 </td>
                                <td> Review 3 </td>
                                <td> Final </td>
                                <td> Report</td>
                            </tr>

                            <?php 
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $projectId = $row['projectid'];
                                        $projectDescription = $row['projectdescription']; 
                                        $teamNo = $row['teamno'];
                                        $teamLead = $row['leadname'];
                                        $review1 = $row['review1'];
                                        $review2 = $row['review2'];
                                        $review3 = $row['review3'];
                                        $total = ($review1+$review2+$review3)/3;
                                        $report = $row['report'];
                                        
                            ?>        
                            <?php 
                                      
                             ?>
                             
                             <?php 
                                    
                                        
                            ?>
                                    <tr>
                                        <td><?php echo $projectId ?></td>
                                        <td><?php echo $projectDescription ?></td>
                                        <td><?php echo $teamNo ?></td>
                                        <td><?php echo $teamLead ?></td>
                                        <td><?php echo $review1 ?></td>
                                        <td><?php echo $review2 ?></td>
                                        <td><?php echo $review3 ?></td>
                                        <td><?php echo $total ?></td>
                                        <td><a href="<?php echo $report ?>"><?php echo "Team-".$teamNo." Report" ?> </a></td>
                                    </tr>        
                            <?php 
                                     } 
                             ?>
                                   

                        </table> <br><br><br>


<?php   
/*require_once("connection1.php");
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
                                <td> USN </td>
                                <td> Project Id </td>
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
                                        <td><?php echo $usn ?></td>
                                        <td><?php echo $projectId ?></td>
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
                                <!--<td> Student Name </td>-->
                                <td> Review 1 </td>
                                <td> Review 2 </td>
                                <td> Review 3 </td>
                                <td> Final Marks </td>
                            </tr>

                            <?php 
                                
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        //$studentName = $row['student_name'];
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
  <span class="login-signup btn btn-warning"><a href="logout.php" style="color:black">Logout</a></span>
	</div>
</BODY>
</HTML>
