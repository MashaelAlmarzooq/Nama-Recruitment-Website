<?php
include('includes/connection.php'); 
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
    exit;
}
// delete job post code
if(isset($_GET['ID']) && $_GET['ID'] != '')
{
  $deletejob = mysqli_query($conn,"delete from tbl_jobpost where job_id = '".$_GET['ID']."'");
 if($deletejob)
 {

  $_SESSION['msg'] = '<span style="color:green">Job Deleted</span>';
   header('location:MyJobs.php');
   exit;
 }
} 
// selection code 
$query= "select * from tbl_jobpost where emp_id = '".$_SESSION['emp_id']."'";
$excute = mysqli_query($conn , $query);

?>

<?php include('includes/emp_header.php'); ?>
<!--=========Main Content============-->
<main id="main">
<p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
    <div>
   <a href="Jobpost.php"> <button class="bordered_btn">Add</button></a>
    </div> 

<div class="job_wrapper">
<?php $i = 1; while($rec = mysqli_fetch_array($excute)) { ?>
<div id="myjobsborder">
<h1 class="jobname"><?php echo $rec['job_title'];?></h1>
<!-- <h3 class="jobnam"><?php echo $rec['job_position'];?></h3> -->
      <p class="wrap1"><?php echo $rec['job_desc'];?></p>
    <hr class="hr">
  
    <div class="btns_container mt">
     <a href="MyJobs.php?ID=<?php echo $rec['job_id']; ?>" onclick="return confirm('Are you sure to delete this job post?');"> <button class="bordered_btn">Delete</button></a>
      <button onclick="window.location.href='editjob.php?ID=<?php echo $rec['job_id'];?>';" class="bordered_btn">Edit</button>
    </div>
</div>
<?php if($i % 2 == 0){ ?>
  </div>


<div class="job_wrapper">
<?php } ?>
<?php $i++; } ?>


</div>
</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>