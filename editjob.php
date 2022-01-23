<?php
include('includes/connection.php'); 
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
    exit;
}
//Update code
if(isset($_POST['updatejob']))
{

    foreach($_POST as $key => $value)
    {
        $$key = $value;
    }

  $query = "update tbl_jobpost set 
    job_title='$job_title',
    job_major = '$job_major',
    job_position = '$job_position',
    job_desc = '$job_desc',
    job_skills = '$job_skills',
    job_qualification = '$job_qualification',
    job_type = '$job_type',
    job_gender = '$job_gender',
    job_location = '$job_location',
    emp_id = '".$_SESSION['emp_id']."',
    job_salary = '$job_salary',
    company_name='". $_SESSION['companyname']."'
    where job_id = '".$id."'
    ";

    $excute = mysqli_query($conn , $query);

    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green">Job updated successfully</span>';
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }

}

//edit code

$query= "select * from tbl_jobpost where job_id = '".$_GET['ID']."'";
$excute = mysqli_query($conn , $query);
$rec=mysqli_fetch_array($excute);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nama | Edit Job</title>
    <link rel="stylesheet" href="./css/style.css">
   </head>
<body>
   <form class="modal-content1" method="post" action="editjob.php?ID=<?php echo $rec['job_id']?>">
      <a href="MyJobs.php"> <span class="close" title="Close Modal">&times;</span> </a>
    <div class="container1">
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
        <div class="jobname">
      <h1><b>Edit Job</b></h1>
            <br>
      <hr>
            <br>   
            <h2><b>Job title</b></h2>
            <input value="<?php echo $rec['job_title']; ?>" id="sinput" type="text" placeholder="Job title" name="job_title">
            <input value="<?php echo $rec['job_id']; ?>" id="sinput" type="hidden" placeholder="Job title" name="id">

            <h2 ><b>Major</b></h2>
            <input value="<?php echo $rec['job_major']; ?>" id="sinput" type="text" placeholder="Major" name="job_major">
            <h2 ><b>Position</b></h2>
            <input value="<?php echo $rec['job_position']; ?>" id="sinput" type="text" placeholder="position" name="job_position"> 
            <h2  ><b>Job Description</b></h2>
            <input  value="<?php echo $rec['job_desc']; ?>" id="sinput" type="text" placeholder="job description" name="job_desc">
            <h2 ><b>Required skills</b></h2>
            <input  value="<?php echo $rec['job_skills']; ?>" id="sinput" type="text" placeholder="required skills" name="job_skills">
            <h2  ><b>Required Qualifications</b></h2>
            <input value="<?php echo $rec['job_qualification']; ?>" id="sinput" type="text" placeholder="required qualifications" name="job_qualification">
            <h2  ><b>Location</b></h2>
            <input value="<?php echo $rec['job_location']; ?>" id="sinput" type="text" placeholder="location" name="job_location">
            <h2 ><b>Job Type</b></h2>
            <input  value="<?php echo $rec['job_type']; ?>" id="sinput" type="text" placeholder="type" name="job_type">
            <h2 ><b>Gender</b></h2>
            <input type="radio" name="job_gender" value = "Female" <?php if($rec['job_gender' == 'Female']) { echo 'checked';}?>>
     <label style="color:#3e443b; font-size: 22px;">Female</label>
         <input type="radio" name="job_gender" value="Male" <?php if($rec['job_gender' == 'Male']) { echo 'checked';}?>>
        <label style="color:#3e443b; font-size: 22px;">Male</label>
            <br>
            <h2 ><b>Salary</b></h2>
    <input value="<?php echo $rec['job_salary']; ?>" id="sinput" type="text" placeholder="Salary" name="job_salary">
    </div>
    <div><button class="bordered_btn mt" name="updatejob">save</button></div>  
        </div>
    </div>
  </form>
</body>
</html>