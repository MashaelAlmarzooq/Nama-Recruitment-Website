<?php
include('includes/connection.php'); 
// security code//
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}
// Updating employer record code//

if(isset($_POST['updaterecord']))
{

    foreach($_POST as $key => $value)
    {
        $$key = $value;
    }

    $query = "update tbl_employeers set 
    emp_email='$email',
    emp_password = '$password',
    emp_phone = '$phone',
    emp_address = '$address',
    emp_company = '$companyname',
    emp_vision = '$companyvision',
    emp_scope = '$companyscope',
    emp_mission = '$companymission',
    emp_desc = '$desc'
    where emp_id = '".$_SESSION['emp_id']."'
    ";

    $excute = mysqli_query($conn , $query);

    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green"> Record successfuly updated</span>';
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }

}

// getting employer record code//
$query= "select * from tbl_employeers where emp_id = '".$_SESSION['emp_id']."'";
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
        <form class="modal-content1" action="" method= "post">
         <a href="MyProfileEmp.php"> <span class="close" title="Close Modal">&times;</span> </a>
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
      <h2><b>Email</b></h2>
            
      <input  name="email" type="text" value="<?php echo $rec['emp_email']; ?>" id="sinput" required><br><br>

      <h2 ><b>Password</b></h2>
        
            
      <input name="password"  type="password" value="<?php echo $rec['emp_password']; ?>" id="sinput" required><br><br>
         <h2 ><b>Address</b></h2>
      <input name="address" type="text" value="<?php echo $rec['emp_address']; ?>" id="sinput" required><br><br>
         <h2 ><b>phone number</b></h2>
 
      <input name="phone" type="text" value="<?php echo $rec['emp_phone']; ?>" id="sinput" required><br><br>
        <hr><hr>
            <br>
    <h2  ><b>company name</b></h2>

            
      <input name="companyname"  type="text" value="<?php echo $rec['emp_company']; ?>" id="sinput" required><br><br>
    
      <h2  ><b>company scope</b></h2>
          
      <input name="companyscope" type="text" value="<?php echo $rec['emp_scope']; ?>" id="sinput" required><br><br>
         <h2  ><b>vision</b></h2>
            
      <input name="companyvision" type="text" value="<?php echo $rec['emp_vision']; ?>" id="sinput"><br><br>
         <h2 ><b>mission</b></h2>
          
      <input name="companymission" type="text"  value="<?php echo $rec['emp_mission']; ?>" id="sinput" ><br><br>
         <h2  ><b>description of the company</b></h2>
         <br>
  
  <textarea name="desc" style="width:500px; height:150px;"><?php echo $rec['emp_desc']; ?></textarea><br><br>


      <div class="clearfix">
        <button type="submit" class="bordered_btn" name="updaterecord">Save</button>
      </div>
        </div>
    </div>
  </form>
</body>
</html>