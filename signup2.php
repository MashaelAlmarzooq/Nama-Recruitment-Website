<?php
include('includes/connection.php');


if(isset($_POST['signup']))
{
   $phone= strlen($_POST['phone']);
   
   if (empty($_POST["email"]))
    {
      $emailErr = "Email is required";
    } 
    else
    {
       $emailErr= "";
    }
    
    if (empty($_POST["password"])) {
      $passwordErr = "password is required";
    } 
    if (strlen($_POST['password']) < 8) {
      $passwordErr = "Min 8 characters";
    } 
      
    if (empty($_POST["phone"])) {
      $phoneErr = "Phone is required";
    } 
   if (strlen($_POST['phone']) < 12) {
      $phoneErr = "Min 12 characters";
    } 
  
    if (empty($_POST["address"])) {
      $addressErr = "Address is required";
  } 
  
    if (empty($_POST["companyname"])) {
      $nameErr = "Companyname is required";
    }
    
    if (empty($_POST["companyvision"])) {
      $visionErr = "Companyvision is required";
    }

    if (empty($_POST["companyscope"])) {
      $scopeErr = "Companyscope is required";
    }

    if (empty($_POST["companymission"])) {
      $missionErr = "Companymission is required";
    }
    if (empty($_POST["desc"])) {
      $descErr = "Description is required"; 
    }

    //double check
    if(!empty($_POST["desc"]) && 
    !empty($_POST["companymission"])  &&
    !empty($_POST["companyscope"]) &&
    !empty($_POST["companyvision"]) && 
    !empty($_POST["email"]) && 
    !empty($_POST["phone"]) &&
    !empty($_POST["password"]) && 
    !empty($_POST["address"]) &&
    !empty($_POST["companyname"]) &&
    strlen($_POST['password']) >= 8 &&
    strlen($_POST['phone']) >= 12
    )
    {

      //write on databas
      foreach($_POST as $key => $value)
      {
          $$key = $value;
      }
      $query = "insert into tbl_employeers set 
      emp_email='$email',
      emp_password = '$password',
      emp_phone = '$phone',
      emp_address = '$address',
      emp_company = '$companyname',
      emp_vision = '$companyvision',
      emp_scope = '$companyscope',
      emp_mission = '$companymission',
      emp_desc = '$desc'";
  
      $excute = mysqli_query($conn , $query);

      // 1062 is an error number in My php admin
     if(mysqli_errno($conn) == 1062)
     {
        $_SESSION['msg'] = '<span style="color:red">'.$_POST["email"].' aleardy exists</span>';
     }
      if($excute)
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
          
      <form class="modal-content1" action="" method="post">
         <a href="SignUp.php"> <span class="close" title="Close Modal">&times;</span> </a>
    <div class="container1">
        <p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
        <div class="jobname">
      <h1><b>Sign Up</b></h1>
            <br>
           
      <p class="jobname">Please fill in this form to create an account.</p>
      <hr>
            <br>
      <span class="error"><?php if(isset($emailErr)) {echo  '*'. $emailErr; }?></span>
      <h2><b>Email</b></h2>
      <input type="email" placeholder="Enter your Email" id="sinput" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" ><br><br>
      
      <span class="error"><?php if(isset($passwordErr)) {echo  '*'. $passwordErr; }?></span> 
      <h2 ><b>Password</b></h2>
      <input type="password" placeholder="Enter your 8 digits Password" id="sinput" name="password"  value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>"><br><br>

      <span class="error"><?php if(isset($addressErr)) {echo  '*'. $addressErr; }?></span> 
         <h2 ><b>Address</b></h2>
      <input type="text" placeholder="Enter your Address" id="sinput" name="address"  value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>"><br><br>
         
      <span class="error"><?php if(isset($phoneErr)) {echo  '*'. $phoneErr; }?></span>
         <h2 ><b>phone number</b></h2>     
      <input  type="number" placeholder="Enter your 12 digits phone number" id="sinput" name="phone"  value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>"><br><br>
       
            <br>

            <span class="error"><?php if(isset($nameErr)) {echo  '*'. $nameErr; }?></span>
    <h2  ><b>company name</b></h2>
      <input type="text" placeholder="Enter your company name" id="sinput"  name="companyname"  value="<?php if(isset($_POST['companyname'])){echo $_POST['companyname'];} ?>"><br><br>

       <span class="error"><?php if(isset($scopeErr)) {echo  '*'. $scopeErr; }?></span>   
      <h2  ><b>company scope</b></h2>
      <input type="text" placeholder="Enter your company scope" name="companyscope" id="sinput"  value="<?php if(isset($_POST['companyscope'])){echo $_POST['companyscope'];} ?>"><br><br>
       
      <span class="error"><?php if(isset($visionErr)) {echo  '*'. $visionErr; }?></span>   
         <h2  ><b>vision</b></h2>   
   <input type="text" placeholder="Enter a vision" id="sinput" name="companyvision"  value="<?php if(isset($_POST['companyvision'])){echo $_POST['companyvision'];} ?>"><br><br>
     
      <span class="error"><?php if(isset($missionErr)) {echo  '*'. $missionErr; }?></span>          
         <h2 ><b>mission</b></h2>
      <input type="text" placeholder="Enter a mission" name="companymission" id="sinput"  value="<?php if(isset($_POST['companymission'])){echo $_POST['companymission'];} ?>" ><br><br>

      <span class="error"><?php if(isset($descErr)) {echo  '*'. $descErr; }?></span>          
         <h2  ><b>description of the company</b></h2>
         <br>  

  <textarea  style="width:500px; height:150px;" name="desc"></textarea><br><br>
      <div class="clearfix">
        <button class="bordered_btn" type="submit"  name="signup" class="signupbtn">SignUp</button>
      </div>
      </div>
    </div>
  </form>
   </body>
</html>