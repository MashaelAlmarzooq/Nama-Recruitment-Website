<?php
include('includes/connection.php'); 
// security code//
if(!isset($_SESSION['seeker_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}
// Updating seeker record code//

if(isset($_POST['updateseeker']))
{

    foreach($_POST as $key => $value)
    {
        $$key = $value;
    }

 $query = "update tbl_jobseeker set 
    seeker_email='$seeker_email',
    seeker_password = '$seeker_password',
    seeker_phone = '$seeker_phone',
    first_name = '$first_name',
    last_name = '$last_name',
    seeker_current_job = '$seeker_current_job',
    seeker_majors = '$seeker_majors',
    seeker_skills = '$seeker_skills',
    seeker_gender = '$seeker_gender',
    seeker_nationality = '$seeker_nationality',
    seeker_experience = '$seeker_experience',
    seeker_availability = '$seeker_availability',
    seeker_english = '$seeker_english',
    seeker_bio = '$seeker_bio',
    seeker_city = '$seeker_city',
    seeker_education = '$seeker_education',
    seeker_dob = '$seeker_dob',
    seeker_status = '$seeker_status'
    where seeker_id = '".$_SESSION['seeker_id']."'
    ";

    $excute = mysqli_query($conn , $query);

    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green"> Record Updated successfuly</span>';
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }

}

// getting seeker record code//
$query= "select * from tbl_jobseeker where seeker_id = '".$_SESSION['seeker_id']."'";
$excute = mysqli_query($conn , $query);
$rec = mysqli_fetch_array($excute);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nama | Edit Profile</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
<body>
    <form class="modal-content1" action="" method="post">
      <a href="MyProfile.php"> <span class="close" title="Close Modal">&times;</span> </a>
    <div class="container1">
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
        <div class="jobname">
      <h1><b>Edit Profile</b></h1>
            <br>
      <hr>
            <br>
        <input type="radio" name="seeker_status" value = "0"  <?php if($rec['seeker_status'] == '0') echo 'checked';?>>
     <label style="color:#3e443b; font-size: 22px;">Private</label>
         <input type="radio" name="seeker_status" value="1" <?php if($rec['seeker_status'] == '1') echo 'checked';?>>
        <label style="color:#3e443b; font-size: 22px;">Public</label>
            <br>     
            <h2 ><b>First Name</b></h2>
      <input type="text" id="sinput"  name="first_name" value="<?php echo $rec['first_name']; ?>"><br><br>
         <br> 
         <h2 ><b> Last Name</b></h2>
      <input type="text" id="sinput"  name="last_name" value="<?php echo $rec['last_name']; ?>"><br><br>
         <br>  
      <h2 ><b>Password</b></h2>
      <input type="password"  id="sinput"  name="seeker_password" value="<?php echo $rec['seeker_password']; ?>"><br><br>
         <h2 ><b>Nationality</b></h2>
         <br>
      <input type="text" placeholder="Enter Nationality" id="sinput"  name="seeker_nationality" value="<?php echo $rec['seeker_nationality']; ?>"><br><br>
         <h2 ><b>City</b></h2>
            
            
      <input type="text" placeholder="Enter city" id="sinput"  name="seeker_city" value="<?php echo $rec['seeker_city']; ?>"><br><br>
        <hr><hr>
            <br>
            <h2  ><b>Gender</b></h2>
                                <input type="radio" name="seeker_gender" value = "Female" <?php if($rec['seeker_gender'] == 'Female') echo 'checked';?> >
     <label style="color:#3e443b; font-size: 22px;">Female</label>
         <input type="radio" name="seeker_gender" value="Male" <?php if($rec['seeker_gender'] == 'Male') echo 'checked';?> >
        <label style="color:#3e443b; font-size: 22px;">Male</label> <br><br>
    <h2  ><b>Dob</b></h2>    
      <input type="text" placeholder="20" id="sinput"  name="seeker_dob" value="<?php echo $rec['seeker_dob']; ?>"><br><br>
    
      <h2  ><b>Profission</b></h2>
          
      <input type="text" placeholder="Enter current job" id="sinput"  name="seeker_current_job" value="<?php echo $rec['seeker_current_job']; ?>"><br><br>
      <h2  ><b>Email</b></h2>
            
            <input type="text" placeholder="Enter Email" id="sinput"name="seeker_email" value="<?php echo $rec['seeker_email']; ?>"><br><br>
            <h2  ><b>Majors</b></h2>
            
            <input type="text" placeholder="Enter majors" id="sinput"name="seeker_majors" value="<?php echo $rec['seeker_majors']; ?>"><br><br>
       
         <h2 ><b>Phone</b></h2>
      <input type="text" placeholder="0500403311" id="sinput"name="seeker_phone" value="<?php echo $rec['seeker_phone']; ?>"><br><br>
         <h2  ><b>skills</b></h2>
         <input type="text" placeholder="Enter skills " id="sinput" name="seeker_skills" value="<?php echo $rec['seeker_skills']; ?>"><br><br>
            
                     <h2  ><b>Experience</b></h2>
         <input type="text" placeholder="Enter Experience" id="sinput" name="seeker_experience" value="<?php echo $rec['seeker_experience']; ?>"><br><br>
            
                     <h2  ><b>Education</b></h2>
         <input type="text" placeholder="Enter education" id="sinput" name="seeker_education" value="<?php echo $rec['seeker_education']; ?>"><br><br>
            
                     <h2  ><b>English Level</b></h2>
         <input type="text" placeholder="Enter level" id="sinput" name="seeker_english" value="<?php echo $rec['seeker_english']; ?>"><br><br>
            
                     <h2  ><b>Availablity</b></h2>
         <input type="text" placeholder="Enter availablity" id="sinput" name="seeker_availability" value="<?php echo $rec['seeker_availability']; ?>"><br><br>
            
                     <h2 ><b>Your bio</b></h2>
         
  <textarea name="seeker_bio" style="width:500px; height:150px;" placeholder="Enter Bio"><?php echo $rec['seeker_bio']; ?></textarea><br><br>
      <div class="clearfix">
        <button type="submit" class="bordered_btn" name="updateseeker">Save</button>
      </div>
        </div>
    </div>
  </form>
</body>
</html>



