<?php
include('includes/connection.php'); 
if(isset($_POST['search']))
{

$seeker_email= $_POST['email'];
$gender= $_POST['gender'];
$major = $_POST['major'];
$national = $_POST['national'];
$skills = $_POST['skills'];
 $query = "SELECT * FROM `tbl_jobseeker` 
 WHERE seeker_gender LIKE '%$gender%' 
 AND seeker_majors LIKE '%$major%' AND seeker_skills LIKE '%$skills%' 
 AND seeker_nationality LIKE '%$national%'
 AND seeker_email LIKE '%$seeker_email%'
 "; 

 $excute = mysqli_query($conn,$query);
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Nama | Search for a job seeker</title>
<link rel="stylesheet" href="./css/style.css">
</head>


<body class="background">


<div id="nav">
    <ul>
        <li> <a class="backbutton" type="button" value="go back" onclick="history.go(-1)" >Go back</a></li>

    </ul>
</div>
<!--=========Main Content============-->
<main id="main">

<form action="searchforseekerresult.php" method="post">
    <input id="sinput" type="text" placeholder="Search" name="email">
    </div>

    <div class="btns_container mt" style="width: 60%;"> 
 <select class="bordered_btn" style=" width: auto; height: auto;  padding: 4px 14px;" name="major">   
<option value="" selected>Major</option>
<?php $query = mysqli_query($conn,"select seeker_majors from tbl_jobseeker group by seeker_majors"); 
while($majors = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $majors['seeker_majors']; ?>"><?php echo $majors['seeker_majors']; ?></option>

  <?php } ?>
 
</select>
                      <select class="bordered_btn" style=" width: auto; height: auto;  padding: 4px 14px;" name="gender">
   <option value="" selected>Gender</option>
   <?php $query = mysqli_query($conn,"select seeker_gender from tbl_jobseeker group by seeker_gender"); 
while($gender = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $gender['seeker_gender']; ?>"><?php echo $gender['seeker_gender']; ?></option>

  <?php } ?>
 
</select>
    <select class="bordered_btn" style=" width: auto; height: auto;  padding: 4px 14px;" name="national">
   <option value="" selected>Nationality</option>
   <?php $query = mysqli_query($conn,"select seeker_nationality from tbl_jobseeker group by seeker_nationality"); 
while($national = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $national['seeker_nationality']; ?>"><?php echo $national['seeker_nationality']; ?></option>

  <?php } ?>
 
</select>
                      <select class="bordered_btn" style=" width: auto; height: auto; padding: 4px 14px;" name="skills">
   <option value="" selected>Skills</option>
   <?php $query = mysqli_query($conn,"select seeker_skills from tbl_jobseeker group by seeker_skills"); 
while($skills = mysqli_fetch_array($query)){
?>
  <option value="<?php echo $skills['seeker_skills']; ?>"><?php echo $skills['seeker_skills']; ?></option>

  <?php } ?>
</select>
          <button type="submit" class="bordered_btn" name="search">Search</button>
</form>

</div>  
    <br><br><br><br>
    <h2 class="jobname" style="font-size: 25pt;">Results:</h2>
    <br>
    <div class="job_wrapper">
    <?php
        $num = mysqli_num_rows($excute);
 if($num != 0){
       $i =1; while($rec = mysqli_fetch_array($excute)) { ?>
    <div id="myjobsborder">
    <h3 class="jobname">
        <a class="jobname" href="viewseekerprofile.php?ID=<?php echo $rec['seeker_id']; ?>&&job=<?php echo $rec['seeker_current_job']; ?>"><?php echo $rec['first_name'].' ' .$rec['last_name'];?></a></h3>
    <h4 class="jobname"><?php echo $rec['seeker_majors']; ?></h4>
    <br>
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Current job: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['seeker_current_job']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Experience: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['seeker_experience']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Skills: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['seeker_skills']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">City: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['seeker_city']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Nationality: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['seeker_nationality']; ?></span></p>
    
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Gender: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['seeker_gender']; ?></span></p>
    <br>  
</div>
<?php if($i % 2 == 0){ ?>
</div>
<div class="job_wrapper">
<?php }
$i++; }}else{ ?>
  NO Record Found for <?php echo $_POST['email'];?> 
    <?php } ?>
</div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>