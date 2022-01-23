<?php
include('includes/connection.php'); 
// https://stackoverflow.com/questions/13533296/check-php-session-issetsession-is-not-working
if(!isset($_SESSION['seeker_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}

if(isset($_POST['confirm']))
{
    
$update= mysqli_query($conn,"update tbl_job_application set confirm_date ='".$_POST['appointment']."' , app_status = '3' , confrimed='1' where app_id = '".$_POST['id']."'");
if($update)
{
    $_SESSION['msg'] = '<span style="color: green">Date confirmed</span>';
}
else
{
    $_SESSION['msg'] = '<span style="color: red">oppps something went wrong</span>';
}
}

//https://www.geeksforgeeks.org/sql-using-clause/
  $query= "select * from tbl_job_application inner join tbl_jobpost USING(job_id) 
where tbl_job_application.job_seeker_id = '".$_SESSION['seeker_id']."' 
AND tbl_job_application.app_status > 0
order by tbl_job_application.app_id desc";

$excute = mysqli_query($conn , $query);

?>
<?php include('includes/seeker_header.php'); ?>

<div id="nav">
    <div class="nav_title">
        <h1 class="jobname1">My Jobs</h1>
    </div>
    <ul>
     <li><a href="AccApp.php" class="active">Accepted</a></li>
     <li><a href="RejApp.php" href="#rejected">Rejected</a></li>
     <li><a href="PenApp.php">Pending</a></li>
    </ul>
</div>

<main id="main"> 

    <h1 class="jobname" style="font-size: 25pt; width: 78%; text-align: center;">Accepted job application</h1>
    <br>
<!-- https://www.php.net/manual/en/function.session-unset.php -->
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
    <div class="job_wrapper">

    <?php $i= 1; while($rec = mysqli_fetch_array($excute)){ 
        if($rec['app_status'] == 2)
        {
            continue;
        }
        ?>
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
 <?php if($rec['app_status'] == 3){ ?>
    <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Date Confirmed: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['confirm_date']; ?></span></p>
    <br>  
    <?php } else{ ?>
    <div class="btns_container"> 
      
        <form action="" method="post">
         <select class="bordered_btn Emppen" style=" width: auto; padding: 4px 14px;" name="appointment">
   <option value="" selected>Select an appointment</option>
  <option value="<?php echo $rec['date1']; ?>"><?php echo $rec['date1']; ?></option>
  <option value="<?php echo $rec['date2']; ?>"><?php echo $rec['date2']; ?></option>
  <option value="<?php echo $rec['date3']; ?>"><?php echo $rec['date3']; ?></option>
</select> 

<input type="hidden" name="id" value="<?php  echo $rec['app_id'];?>" >
<button class="bordered_btn" type="submit" name="confirm">Send</button>   
    </form>
    </div>
    <?php } ?>
</div>
<?php if($i % 2 == 0 ){ ?>
</div>
<div class="job_wrapper">
<?php } ?>
<?php $i++; } ?>

</div>
</main>

    <br> <br> <br>  <br>

<?php include('includes/footer.php'); ?>


    