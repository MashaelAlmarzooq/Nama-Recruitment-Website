<?php
include('includes/connection.php'); 
// selection code 
$query= "select * from tbl_jobpost order by job_id desc";
$excute = mysqli_query($conn , $query);

?>



<!DOCTYPE html>
<html>
<head>
<title> Nama | Posted jobs</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="background">

<div id="nav">
    <ul>
    <!-- https://www.w3schools.com/jsref/met_his_go.asp -->
        <li> <a class="backbutton" type="button" value="go back" onclick="history.go(-1)" >Go back</a></li>

    </ul>
</div>
<!--=========Main Content============-->
<main id="main"> 
    <h1 class="jobname" style="font-size: 25pt; width: 78%; text-align: center;">Posted Jobs</h1>
    <br>
    <div class="job_wrapper">

    <?php $i= 1; while($rec = mysqli_fetch_array($excute)){ ?>
<div id="myjobsborder">
     <?php $company= mysqli_query($conn,"select * from tbl_employeers where emp_id ='".$rec['emp_id']."'"); 
     $record = mysqli_fetch_array($company);
     ?>
    <h2 class="jobname"><?php echo $rec['job_title']; ?></h2>
    <h3 class="jobname">
        <a href="ViewEmpProfile.php?ID=<?php echo $record['emp_id'];?>" style="color: #647397;"><?php echo $record['emp_company']; ?></a>
    </h3>
    <br>
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Job title: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_title']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Major: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_major']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">position: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_position']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">job description: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_desc']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">required skill: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_skills']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">required qualifications: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_qualification']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">location: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_location']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">type: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_type']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">gender: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_gender']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">salary: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_salary']; ?></span></p>
    <br>  
</div>
<?php if($i % 2 == 0 ){ ?>
</div>
<div class="job_wrapper">
<?php } ?>
<?php $i++; } ?>

</div>
</main>
    <br> <br> <br>  <br> <br> <br>  
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>