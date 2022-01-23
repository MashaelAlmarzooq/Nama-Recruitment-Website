<?php include('includes/seeker_header.php'); ?>
<?php
include('includes/connection.php');

if(isset($_GET['likval']) && $_GET['likval'] != '')
{
    $id = $_GET['ID'];
    $val = $_GET['likval'] + 1;
$query = "update tbl_advice set likes = '$val' where advice_id='$id'";
$likes= mysqli_query($conn,$query);
}

if(isset($_GET['disval']) && $_GET['disval'] != '')
{
    $id = $_GET['ID'];
    $val = $_GET['disval'] + 1;
$query = "update tbl_advice set dislikes = '$val' where advice_id='$id'";
$likes= mysqli_query($conn,$query);
}
// selection code 
$excute = mysqli_query($conn, "select * from tbl_advice order by advice_id desc");

?>
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
    <button class="bordered_btn" onclick="window.location.href='ViewEmpProfile.php?ID=<?php echo $rec['emp_id']?>';"> Author profile</button>
        <button class="bordered_btn"><a href="job_sekeer_advice.php?ID=<?php echo $rec['advice_id'];?>&&likval=<?php echo $rec['likes']; ?>">Like</a><?php echo $rec['likes'];?></button>
        <button class="bordered_btn"><a href="job_sekeer_advice.php?ID=<?php echo $rec['advice_id'];?>&&disval=<?php echo $rec['dislikes']; ?>">Dislike</a><?php echo $rec['dislikes'];?></button>
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