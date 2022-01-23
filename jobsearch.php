<?php
include('includes/connection.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title> Nama | Search for a job</title>
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
<form action="jobsearchresult.php" method="post">   

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
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>