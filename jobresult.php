<?php
include('includes/connection.php'); 


if(isset($_POST['search']))
{

$name= $_POST['name'];
$company= $_POST['company'];
$major = $_POST['majors'];
$position = $_POST['position'];
$city = $_POST['city'];
$type = $_POST['type'];
  $query = "select * from tbl_jobpost where job_title like '%$name%' 

AND  job_major like'%$major%'
AND  job_position like'%$position%'
AND  job_location like '%$city%'
AND  job_type like '%$type%'
AND company_name like '%$company%'
";

 $excute = mysqli_query($conn,$query);
}

if(isset($_POST['jobApply']))
{
 
	$emp_id = $_POST['emp_id'];
    $job_id = $_POST['job_id'];
 $query = "insert into tbl_job_application set 
	emp_id = '$emp_id',
    job_id = '$job_id',
	job_seeker_id = '".$_SESSION['seeker_id']."'
	"; 

    $excute = mysqli_query($conn , $query);

   
    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green">Applied for the job successfully</span>';
        header('location:PenApp.php');
        exit;
    }
   else if(mysqli_errno($conn) == 1062)
    {
       $_SESSION['msg'] = '<span style="color:red">already Applied</span>';
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }
	
}

?>

<!DOCTYPE html>
<html>
<head>
<title> Nama | Search for a job</title>
<link rel="stylesheet" href="./css/style.css">
</head>


<body class="background">


<main id="main">

<form action="" method="post">   

<div>
<input id="sinput" type="text" placeholder="Search job post" name="name">
    <input id="sinput" type="text" placeholder="Search company name" name="company">    </div>

    <div class="btns_container" style="width: 60%;"> 
                <select class="bordered_btn mt" style=" width: auto; height: auto; padding:4px 14px;" name="majors">
   <option value="" selected>Major</option>
   <?php $query = mysqli_query($conn,"select job_major from tbl_jobpost group by job_major"); 
while($majors = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $majors['job_major']; ?>"><?php echo $majors['job_major']; ?></option>

  <?php } ?>
 
</select>

<select class="bordered_btn mt" style=" width: auto; height: auto;  padding:4px 14px;" name="position">
   <option value="" selected>Position</option>
   <?php $query = mysqli_query($conn,"select job_position from tbl_jobpost group by job_position"); 
while($position = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $position['job_position']; ?>"><?php echo $position['job_position']; ?></option>

  <?php } ?>
 
</select>

<select class="bordered_btn mt" style=" width: auto; height: auto;  padding:4px 14px;" name="city">
   <option value="" selected>City</option>
   <?php $query = mysqli_query($conn,"select job_location from tbl_jobpost group by job_location"); 
while($city = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $city['job_location']; ?>"><?php echo $city['job_location']; ?></option>

  <?php } ?>
</select>

<select class="bordered_btn mt" style=" width: auto; height: auto;  padding:4px 14px;" name="type">
   <option value="" selected>Job Type</option>
   <?php $query = mysqli_query($conn,"select job_type from tbl_jobpost group by job_type"); 
while($type = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $type['job_type']; ?>"><?php echo $type['job_type']; ?></option>

  <?php } ?>
</select>
         <button type="submit" class="bordered_btn mt" name="search">Search</button>
    </div>  
    
</form>

<h2 class="jobname mt" style="font-size: 25pt;">Results:</h2>
    <br>
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
    <div class="job_wrapper">
        <?php
        $num = mysqli_num_rows($excute);
 if($num != 0){
       $i =1; while($rec = mysqli_fetch_array($excute)) { ?>
    <div id="myjobsborder">
    <h3 class="jobname">
        <a class="jobname" href="postedjobsseeker.php?ID=<?php echo $rec['job_id']; ?>"><?php echo $rec['job_title'] ?></a></h3>
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Job Desc: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_desc'] ?></span></p>
     <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Job Location: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_location'] ?></span></p>
<p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Type: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_type'] ?></span></p>
<p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Majors: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_major'] ?></span></p>
    <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Company: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['company_name'] ?></span></p>
<p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Position: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_position'] ?></span></p>

<?php if(isset($_SESSION['seeker_id'])) {?>
 <form action="" method="post">
<input type="hidden" name="emp_id" value="<?php echo $rec['emp_id']; ?>">
<input type="hidden" name="job_id" value="<?php echo $rec['job_id']; ?>">
<button class="bordered_btn" type="submit" name="jobApply">Apply</button>
 </form>
    <?php } ?>
    <br>  
</div>
<?php if($i % 2 == 0){ ?>
</div>
<div class="job_wrapper">
<?php }
$i++; }}else{ ?>
  NO Record Found for <?php echo $_POST['name'];?> <?php echo $_POST['company'];  ?>
    <?php } ?>
</div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>