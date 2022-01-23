<?php
include('includes/connection.php'); 
// security code//
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}
//job Apply Code

if(isset($_POST['acceptapp']))
{
 
	$app_id = $_POST['app_id'];
  $date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
	$date3 = $_POST['date3'];
 $query = "update tbl_job_application set
 date1= '$date1' ,
 date2 = '$date2',  
 date3 = '$date3' ,
 app_status= '1'
 where app_id = '$app_id'"; 

    $excute = mysqli_query($conn , $query);
    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green">Job application accepted successfully</span>';
        header('location:MyApplicants.php');
        exit;
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }
	
}

if(isset($_POST['rejectapp']))
{
 
	$app_id = $_POST['app_id'];
   
$query = "update tbl_job_application set app_status = '2' where app_id = '$app_id'"; 

    $excute = mysqli_query($conn , $query);
    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:red">Job application rejected</span>';
        header('location:MyApplicants.php');
        exit;
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }
	
}


// selection code
 $query= "select * from tbl_job_application 
inner join tbl_jobpost USING(job_id)
inner join tbl_jobseeker on tbl_jobseeker.seeker_id = tbl_job_application. job_seeker_id
where tbl_job_application.emp_id = '".$_SESSION['emp_id']."' 
order by tbl_job_application.app_id desc";

$excute = mysqli_query($conn , $query);

?>

<?php include('includes/emp_header.php'); ?>
<!--=========Main Content============-->
<main id="main">
  
	
    <div>
		
      <h1 class="FontcolApp">My Applicants</h1>
<br>
	  <div>



          <main id="main">
          <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
<div class="job_wrapper">

<?php $i =1;  while($rec = mysqli_fetch_array($excute)) {?>
<div id="myjobsborder">
    
<h1 class="jobname"><a style="color:#647397; "href="viewseekerprofile.php?ID=<?php echo $rec['seeker_id']; ?>&&job=<?php echo $rec['job_title']; ?>"><?php echo $rec['first_name'] .' '. $rec['last_name']; ?></a></h1>
      <p class="jobname"><?php echo $rec['job_title'];?></p>
  <a class="bordered_btn mb" href="mailto:<?php echo $rec['seeker_email']; ?>"> contact</a>
    <p class="jobname mb">Set suggested interview appointments</p>
 <?php if($rec['app_status'] == 3) { ?>
  <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Appointment Date: <br> <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['confirm_date'];?></span></p>
    <br>  

 <?php }else{ ?>
  <form action="" method="post">
    <input class="bordered_btn mb" type="datetime-local" name="date1" min="2021-04-11T14:30">
    <input class="bordered_btn mb" type="datetime-local" name="date2" min="2021-04-11T14:30">
    <input class="bordered_btn" type="datetime-local" name="date3" min="2021-04-11T14:30">
    <input class="bordered_btn" type="hidden" name="app_id" value="<?php echo $rec['app_id']; ?>">
                
    <div style="display:flex; flex-direction:row; justify-content:space-between">
    <div class="btns_container mt">
    <?php if($rec['app_status'] == 1) {?>
      <button class="bordered_btn" style="color:green">Accepted</button>
     
     <?php } elseif($rec['app_status'] == 0){ ?>
      <button class="bordered_btn" name="acceptapp">Accept</button>
       
      <?php } ?>
    </div>
    </form>
    <?php } ?>
    <form action="" method="post">
    <input type="hidden" name="app_id" value="<?php echo $rec['app_id'] ?>"/>
    <div class="btns_container mt">
    <?php if($rec['app_status'] == 2) {?>
      <button class="bordered_btn" style="color:red">Rejected</button>
     
     <?php } elseif($rec['app_status'] == 0){ ?>
      <button  class="bordered_btn" name="rejectapp">Reject</button>
     <?php } ?>
   
    </div>
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
	  </div>
      </div>
 
</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>