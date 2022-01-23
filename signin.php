<?php

//connect with database 
include('includes/connection.php');

// employer login code
if(isset($_POST['signin']) && $_POST['signin'] == 'employeeLogin')
{
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "select * from tbl_employeers where emp_email = '$email' AND emp_password = '$password'";
  $excute=mysqli_query($conn, $query);
  $num= mysqli_num_rows($excute);
 
  if($num >= 1)
  {
   
   $rec = mysqli_fetch_array($excute);
   $_SESSION['emp_id'] = $rec['emp_id'];
   $_SESSION['companyname'] = $rec['emp_company'];
   $_SESSION['emp_email'] = $rec['emp_email'];
header('location:Employer_homepage.php');
exit();
  }
  else
  {
   $_SESSION['msg'] = '<span style="color:red">Wrong username or Password</span>';
  }
}

// Job seeker login Code
elseif(isset($_POST['signin']) && $_POST['signin'] == 'jobseekerLogin')
{
  
  $email = $_POST['email'];

  $password = $_POST['password'];

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
  else
  {
   $_SESSION['msg'] = '<span style="color:red">Wrong username or Password</span>';
  }
}

elseif(isset($_POST['signin']) && $_POST['signin'] == '')

{

  $_SESSION['msg'] = '<span style="color:red">Please select option for Signin</span>';

}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Nama | SignIn</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="sbody">
<!--=========Main Content============-->
<main id="main">

<!-- action= "" it mean go the same page-->
<form class="modal-content1" action="" method="post"> 

    <div class="container1">
    <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
   <div class="sinner"> 
    <a href="index.php"> <span class="close" title="Close Modal">&times;</span> </a>

    <div class="jobname">
   
      <label id="lowert"  for="uname"><b>Email</b></label> <br>
    
      <input id="sinput" type="text" placeholder="Enter Email" name="email" required> <br>

      <label id="lowert"  for="psw"><b>Password</b></label> <br>
    
      <input id="sinput" type="password" placeholder="Enter Password" name="password" required> <br>
  <br>
 
  <select class="bordered_btn" style=" height:40px!important; width:50% !important;" name="signin">
       <option value="">Signin as </option>
       <option value="employeeLogin"> Employeer</option>
         <option value="jobseekerLogin">Job Seeker</option>
      
       </select>
     
      <!-- onclick="window.location.href='Employer_homepage.php';" -->
      <button  type="submit" class="bordered_btn mt" name="submit">SignIn</button>
 
       
<label> 

  <a class="jobname" href="SignUp.php" id="lowerc"> Create an account</a> 
</label>
    

        </div>  
       </div>
    </div>
    </form>
  </main>
  <!--=========End Of Main Content============-->
</body>
</html>