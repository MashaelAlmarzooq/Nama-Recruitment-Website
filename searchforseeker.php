<?php
include('includes/connection.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title> Nama | Search for a job seeker</title>
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
    <div>
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
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>