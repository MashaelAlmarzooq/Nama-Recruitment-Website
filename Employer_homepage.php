<?php include('includes/emp_header.php'); ?>
<?php
include('includes/connection.php');
$advices = mysqli_query($conn, "select * from tbl_advice order by advice_id desc");
$jobs = mysqli_query($conn , "select * from tbl_jobpost order by job_id desc");
?>
<!--=========Main Content============-->
<main id="main">
<div class="row">
    <!-- SEARCH AREA-->
    <div class="searchArea">
        <h1 class="title">Search</h1>
        <br>
         <ul id="flex_list">
        <li><a href="searchforseeker.php">Job Seeker</a></li>
    </ul>
    </div>


    <!--POSTED JOBS-->
    <div id="employ_row">
    <div class="PostedJobs">
                       <h1 class="title">
        <a href="postedjobs.php" style=" color: #647397">Posted Jobs</a></h1>

        <marquee  width="100%" height="100%" direction="left" height="100px" onmouseover="this.stop();" onmouseout="this.start();">
            <div style="display: flex;align-items: center;justify-content: center;">
            <?php while($rec = mysqli_fetch_array($jobs)){ ?>
                <div class="box" style="overflow:hidden;">
                    <!--../ is used to go back to one directory level-->
                    <!-- <img src="./images/elm.png" width="150" height="150"> -->
                    <h2 class="jobname"><?php echo $rec['job_title']; ?></h2>
                    <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['job_position']; ?></span>
                    <br><br>
                    <span style="color: #3e443b; font-weight: normal; align:center;"><?php echo $rec['job_qualification']; ?></span>
     <br>
                <br>
                <button class="apply" onclick="window.location.href='postedjobs.php';">Details</button>
                </div>
                <?php } ?>
              
    
            </div>
        </marquee>

    </div>


    <!--ADVICES AREA-->
    <div class="notification">
        <h3 class="title">
            <a class="jobname" href="MyAdvice.php">Advices</a></h3>

        <div class="notificationContent">
            <marquee  width="100%" direction="up" height="100px" onmouseover="this.stop();" onmouseout="this.start();">
            <?php $i = 1; while($rec = mysqli_fetch_array($advices)){ ?>
         <h4 class="jobname"><?php echo $rec['advice_title']; ?></h4>
             <p class="wrap"><?php echo $rec['advice']; ?></p>
             <a href="MyAdvice.php" class="wrap">Read more</a>
             <br><br>
             <?php $i++; } ?>
            </marquee>

        </div>

    </div>
    </div>
</div>
</main>
</div>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>