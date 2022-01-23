<?php
include('includes/connection.php');
if(isset($_POST['seekersignup']))
{

  if (empty($_POST["seeker_email"]))
  {
    $emailErr = "Email is required";
  } 
  
  if (empty($_POST["seeker_password"])) {
    $passwordErr = "password is required";
  }
   else if (strlen($_POST['seeker_password']) < 8) {
    $passwordErr = "Min 8 characters";
  } 
    
  if (empty($_POST["seeker_phone"])) {
    $phoneErr = "Phone is required min 12 characters";
  } 
  else if (strlen($_POST['seeker_phone']) < 12) {
    $phoneErr = "Min 12 characters";
  } 

  if (empty($_POST["first_name"])) {
    $fnameErr = "FirstName is required";
} 

  if (empty($_POST["last_name"])) {
    $lnameErr = "LastName is required";
  }
  
  if (empty($_POST["seeker_current_job"])) {
    $jobErr = "Current job is required";
  }

  if (empty($_POST["seeker_majors"])) {
    $majorsErr = "Majors is required";
  }

  if (empty($_POST["seeker_experience"])) {
    $expErr = "Experience is required";
  }
  if (empty($_POST["seeker_gender"])) {
    $genderErr = "Gender is required";
  }
  if (empty($_POST["seeker_nationality"])) {
    $descErr = "Nationality is required"; 
  }
  if (empty($_POST["seeker_dob"])) {
    $dobErr = "DOB is required"; 
  }
  if (empty($_POST["seeker_skills"])) {
    $skillsErr = "Skills is required";
  }

  //double check 
  if(!empty($_POST["first_name"]) && 
    !empty($_POST["seeker_email"])  &&
    !empty($_POST["seeker_password"])  &&
    !empty($_POST["seeker_phone"])  &&
    !empty($_POST["last_name"])  &&

    !empty($_POST["seeker_current_job"]) &&
    !empty($_POST["seeker_majors"]) && 
    !empty($_POST["seeker_experience"]) && 
    !empty($_POST["seeker_gender"]) &&
    !empty($_POST["seeker_nationality"]) && 
    !empty($_POST["seeker_dob"]) &&
    !empty($_POST["seeker_skills"]) &&
    strlen($_POST['seeker_password']) >= 8 &&
    strlen($_POST['seeker_phone']) >= 12
    ){


    //write on database 
    foreach($_POST as $key => $value)
    {
        $$key = $value;
    }

 $query = "insert into tbl_jobseeker set 
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
    seeker_dob = '$seeker_dob'";
    

    $excute = mysqli_query($conn , $query);
    if(mysqli_errno($conn) == 1062)
    {
       $_SESSION['msg'] = '<span style="color:red">'.$_POST["seeker_email"].' aleardy exists</span>';
    }
    if($excute)
    {
      $email = $_POST['seeker_email'];

      $password = $_POST['seeker_password'];
    
      $query = "select * from tbl_jobseeker where seeker_email = '$email' AND seeker_password = '$password'";
      $excute=mysqli_query($conn, $query);
      $num= mysqli_num_rows($excute);
     
      if($num >= 1)
      {
       $rec = mysqli_fetch_array($excute);
       $_SESSION['seeker_id'] = $rec['seeker_id'];
       $_SESSION['seeker_name'] = $rec['first_name'].' '. $rec['last_name'];
       $_SESSION['seeker_email'] = $rec['seeker_email'];
    header('location:job_sekeer_homepage.php');
    exit();
      }
      

}
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Nama | SignUp </title>
    <link rel="stylesheet" href="./css/style.css">

    <style>
.error {color: #FF0000;}
</style>
  </head>
    <body> 

    <!-- action= "" it mean go the same page-->         
    <form class="modal-content1" method="post" action="">
      <a href="SignUp.php"> <span class="close" title="Close Modal">&times;</span> </a>
    <div class="container1">
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
        <div class="jobname">
            
     <h1>Sign Up</h1>
      <p class="jobname" >Please fill in this form to create an account.</p>
      <hr>
            <br>

            <span class="error"><?php if(isset($emailErr)) {echo  '*'. $emailErr; }?></span>
         <h2><b>Email</b></h2>
      <input type="email" placeholder="Enter your Email "  id="sinput"  name="seeker_email" value="<?php if(isset($_POST['seeker_email'])){echo $_POST['seeker_email'];} ?>"><br><br>
    

      <span class="error"><?php if(isset($passwordErr)) {echo  '*'. $passwordErr; }?></span>
      <h2><b>Password</b></h2>
      <input type="password" placeholder="Enter your 8 digits Password"  id="sinput"  name="seeker_password" value="<?php if(isset($_POST['seeker_password'])){echo $_POST['seeker_password'];} ?>"><br><br>
        
      <span class="error"><?php if(isset($fnameErr)) {echo  '*'. $fnameErr; }?></span>
         <h2><b>First Name</b></h2>
      <input type="text" placeholder="Enter your First Name "  id="sinput"  name="first_name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>"><br><br>
        
      <span class="error"><?php if(isset($lnameErr)) {echo  '*'. $lnameErr; }?></span>
            <h2><b>Last Name</b></h2>
      <input type="text" placeholder="Enter your Last Name "  id="sinput"  name="last_name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];} ?>"><br><br>
     

      <span class="error"><?php if(isset($phoneErr)) {echo  '*'. $phoneErr; }?></span>
     <h2><b>Phone Number</b></h2>
      <input type="number" placeholder="Enter your 12 digits phone number"  id="sinput"  name="seeker_phone" value="<?php if(isset($_POST['seeker_phone'])){echo $_POST['seeker_phone'];} ?>"><br><br>
      
      <span class="error"><?php if(isset($jobErr)) {echo  '*'. $jobErr; }?></span>
      <h2><b>Current Job</b></h2>
      <input type="text" placeholder="Enter your current job"  id="sinput"  name="seeker_current_job" value="<?php if(isset($_POST['seeker_current_job'])){echo $_POST['seeker_current_job'];} ?>"><br><br>
       

      <span class="error"><?php if(isset($majorsErr)) {echo  '*'. $majorsErr; }?></span>
         <h2><b>Major</b></h2>
      <input type="text" placeholder="Enter your Major"  id="sinput"  name="seeker_majors" value="<?php if(isset($_POST['seeker_majors'])){echo $_POST['seeker_majors'];} ?>"><br><br>
        
      <span class="error"><?php if(isset($expErr)) {echo  '*'. $expErr; }?></span>
         <h2><b>experience</b></h2>
  <textarea name="seeker_experience" style="width:500px; height:150px;"><?php if(isset($_POST['seeker_experience'])){echo $_POST['seeker_experience'];} ?></textarea><br><br>
       

  <span class="error"><?php if(isset($skillsErr)) {echo  '*'. $skillsErr; }?></span>
         <h2><b>Skills</b></h2>
  <textarea name="seeker_skills" style="width:500px; height:150px;"><?php if(isset($_POST['seeker_skills'])){echo $_POST['seeker_skills'];} ?></textarea><br><br>
       <br><br>
  <span class="error"><?php if(isset($genderErr)) {echo  '*'. $genderErr; }?></span>    
       <h2><b>gender</b></h2>
        <input type="radio" name="seeker_gender" value = "Male">
     <label style="color:#3e443b; font-size: 22px;">Male</label>
         <input type="radio" name="seeker_gender" value="Female">
        <label style="color:#3e443b; font-size: 22px;">Female</label><br><br>

       <span class="error"><?php if(isset($descErr)) {echo  '*'. $descErr; }?></span>    
          <h2><b>nationality</b></h2>
        <select style="background-color: white; color: #3e443b; " name="seeker_nationality">
          <option value="american">American</option>
          <option value="australian">Australian</option>
          <option value="bahraini">Bahraini</option>
          <option value="brazilian">Brazilian</option>
          <option value="british">British</option>
          <option value="chinese">Chinese</option>
          <option value="egyptian">Egyptian</option>
          <option value="indian">Indian</option>
          <option value="iraqi">Iraqi</option>
          <option value="japanese">Japanese</option>
          <option value="kuwaiti">Kuwaiti</option>
          <option value="lebanese">Lebanese</option>
          <option value="libyan">Libyan</option>
          <option value="mexican">Mexican</option>
          <option value="moroccan">Moroccan</option>
          <option value="omani">Omani</option>
          <option value="qatari">Qatari</option>
          <option value="russian">Russian</option>
          <option value="saudi">Saudi</option>
          <option value="spanish">Spanish</option>
          <option value="sudanese">Sudanese</option>
          <option value="syrian">Syrian</option>
        </select>
      <br><br>

      <span class="error"><?php if(isset($dobErr)) {echo  '*'. $dobErr; }?></span>
          <h2 ><b>date of birth</b></h2>
        <input type="date" name="seeker_dob" style="color:#3e443b; font-size: 22px;" max="2005-04-08" value="<?php echo $_POST['seeker_dob'] ?>">
      <div>
        <button class="bordered_btn mt" type="submit" class="signupbtn" name="seekersignup">SignUp </button>
      </div>
      </div>
    </div>
  </form>
  </body>
</html>

	