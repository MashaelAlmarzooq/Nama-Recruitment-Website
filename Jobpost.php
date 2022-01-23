<?php
include('includes/connection.php');
// security code//
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}

if(isset($_POST['postjob']))
{

    foreach($_POST as $key => $value)
    {
        $$key = $value;
    }

    $query = "insert into tbl_jobpost set 
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
    company_name='". $_SESSION['companyname']."',
    job_salary = '$job_salary'";

    $excute = mysqli_query($conn , $query);

    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green">Job added successfully</span>';
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }

}

?>

<?php include('includes/emp_header.php'); ?>
<!--=========Main Content============-->
<main id="main">
<p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
    <form action="" method="post">
    <div class="jobname">
    <h2>Job's Details</h2><br>
    <input id="sinput" type="text" placeholder="Job title" name="job_title" required>
    <input id="sinput" type="text" placeholder="Major" name="job_major" required>
    <input id="sinput" type="text" placeholder="position" name="job_position" required> 
    <input id="sinput" type="text" placeholder="job description" name="job_desc" required> 
    <input id="sinput" type="text" placeholder="required skills" name="job_skills" required>
    <input id="sinput" type="text" placeholder="required qualifications" name="job_qualification" required>
    <input id="sinput" type="text" placeholder="location" name="job_location"required>
    <input id="sinput" type="text" placeholder="type" name="job_type">
   <br>
            <input type="radio" name="job_gender" value = "Female">
     <label style="color:#3e443b; font-size: 22px;">Female</label>
         <input type="radio" name="job_gender" value="Male">
        <label style="color:#3e443b; font-size: 22px;">Male</label>
            <br>
    <input id="sinput" type="text" placeholder="Salary" name="job_salary" required>
    </div>
    <div><button class="bordered_btn mt" name="postjob">Post</button></div>  
</form>
</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>