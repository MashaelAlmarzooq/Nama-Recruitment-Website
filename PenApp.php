<?php
include('includes/connection.php'); 

if(!isset($_SESSION['seeker_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}

if(isset($_POST['jobcancel']))
{
 
	$app_id = $_POST['app_id'];
   
$query = "delete from tbl_job_application where app_id = '$app_id'"; 

    $excute = mysqli_query($conn , $query);
    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green">Job application canceled successfully</span>';
        header('location:PenApp.php');
        exit;
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }
	
}


$query= "select * from tbl_job_application inner join tbl_jobpost USING(job_id) 
where tbl_job_application.job_seeker_id = '".$_SESSION['seeker_id']."' 
AND tbl_job_application.app_status = 0
order by tbl_job_application.app_id desc";
$excute = mysqli_query($conn , $query);

?>
<?php include('includes/seeker_header.php'); ?>
<div id="nav">
    <!-- <ul>
        <li> <a class="backbutton" type="button" value="go back" onclick="history.go(-1)" >Go back</a></li>

    </ul> -->
</div>
<div id="nav">
    <div class="nav_title">
        <h1 class="jobname1">My Jobs</h1>
    </div>
    <ul>
     <li><a href="AccApp.php">Accepted</a></li>
     <li><a href="RejApp.php" href="#rejected">Rejected</a></li>
     <li><a href="PenApp.php" class="active">Pending</a></li>
    </ul>
</div>

<main id="main"> 

    <h1 class="jobname" style="font-size: 25pt; width: 78%; text-align: center;">Pending job application</h1>
    <br>
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
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

    <div class="btns_container">  
    <form action="" method="post">
    <input type="hidden" name="app_id" value="<?php echo $rec['app_id']; ?>"/>
    <button class="bordered_btn" type="submit" name="jobcancel">Cancel</button>

  
    </form>
    </div> 
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

