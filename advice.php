<?php
include('includes/connection.php');

// selection code 
$excute = mysqli_query($conn, "select * from tbl_advice order by advice_id desc");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nama | Advices</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="background">

<div id="nav">
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="signin.php">Join Us</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
    </ul>
</div>
<!--=========Main Content============-->
<main id="main">
    <h1 class="jobname1" style="font-size: 25pt; width: 78%; text-align: center;">Advices</h1>
    <div class="job_wrapper">
<?php $i= 1; while ($rec = mysqli_fetch_array($excute)){?>
<div id="myjobsborder">
<h1 class="jobname1"><?php echo $rec['advice_title']; ?> </h1>
    <br>
    <p class="wrap1"><?php echo $rec['advice']; ?></p>
    <hr class="hr">
    <div class="btns_container mt">
    <!--https://www.w3schools.com/js/js_window_location.asp-->
        <button class="bordered_btn" onclick="window.location.href='ViewEmpProfile.php?ID=<?php echo $rec['emp_id']?>';"> Author profile</button>
    </div>
</div>
<?php if($i % 2 == 0 ){ ?>
    </div>
<div class="job_wrapper">
<?php } ?>
<?php $i++; } ?>

</div>
</div>
    
</main>
</div>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>