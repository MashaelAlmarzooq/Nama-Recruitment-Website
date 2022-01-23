<?php
include('includes/connection.php'); 
if(isset($_POST['search']))
{

$name= $_POST['name'];

$query = "select * from tbl_employeers where emp_company like '%$name%' OR  emp_scope like '%$name%'";
 $excute = mysqli_query($conn,$query);
}

?>

<!DOCTYPE html>
<html>
<head>
<title> Nama | Search for an Employer</title>
<link rel="stylesheet" href="./css/style.css">
</head>


<body class="background">

    <div id="nav">
        <ul>
            <li> <a href="employersearch.php" class="backbutton" type="button" value="go back" >Go back</a></li>
        </ul>
    </div>  
<!--=========Main Content============-->
<main id="main">
   
<form action="employersearchresult.php" method="post">  
<div>
<input type="text" id="sinput" placeholder="Company name, scope" name="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; }  ?>">
<button type="submit"  name="search" class="bordered_btn mt">Search</button>
</div>
</form>
    
        <h2 class="jobname mt" style="font-size: 25pt;">Results:</h2>
    <br>
    <div class="job_wrapper">
        <?php
        $num = mysqli_num_rows($excute);
 if($num != 0){
    $i=1;    while($rec = mysqli_fetch_array($excute)) { ?>
    <div id="myjobsborder">
    <h3 class="jobname">
        <a class="jobname" href="ViewEmpProfile.php?ID=<?php echo $rec['emp_id']; ?>"><?php echo $rec['emp_company'] ?></a></h3>
        <p style="color: #647397;
    font-size: 100%; text-align: left; font-weight: bold;">Company Scope: <span style="color: #3e443b; font-weight: normal;"><?php echo $rec['emp_scope'] ?></span></p>

    <br>  
</div>
<!-- For design -->
<?php if($i % 2 == 0){ ?>
</div>
<div class="job_wrapper">
<?php } ?>
<?php $i++; }}else{ ?>
  NO Record Found for <?php echo $_POST['name']; ?>
    <?php  } ?>
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


</main>

<!--=========End Of Main Content============-->
<footer>
    <div id="footer_wrapper">
        <div class="footer_title">
            <div class="about_nama social_media">
                <h3>About Nama</h3>
                <ul id="footer_links">
                    <li><a href="./AboutUs.html">About Us</a></li>
                    <li><a href="./contactus.html">Contact Us</a></li>
                    <li><a href="./viewjob.html">Nama Careers</a></li>
                    <li><a href="./advice.html">Advices</a></li>
                </ul>
            </div>
            <div class="about_nama care_ers">
                <h3>Job Seekers</h3>
                <ul id="footer_links">
                    <li><a href="./JobDetail.html">Vacancies by specialization</a></li>
                    <li><a href="./jobsearch.html">Vacancies by company name</a></li>
                    <li><a href="./My Advice.html">Career resources</a></li>
                    <li><a href="./advice.html">Guide to finding a safe job</a></li>
                </ul>
            </div>
            <div class="about_nama care_ers">
                <h3>Company</h3>
                <ul id="footer_links">
                    <li><a href="./Jobpost.html">Post a job</a></li>
                    <li><a href="./employersearch.html">Talent search</a></li>
                    <li><a href="./index.html">Advertise with us</a></li>
                    <li><a href="./Employer_homepage.html">Company profile</a></li>
                </ul>
            </div>
            <div class="about_nama social_media">
                <h3>Social Media</h3>
                <ul id="footer_links">
                    <li>
                        <span class="icons">
                            <img src="./images/linkedin.png" alt="linkedin icon">
                        </span>
                        <a href="#">Linkedin</a>
                    </li>
                    <li>
                        <span class="icons">
                            <img src="./images/twitter.png" alt="Twitter icon">
                        </span>
                        <a href="#">Twitter</a>
                    </li>
                    <li>
                        <span class="icons">
                            <img src="./images/facebook.png" alt="facebook icon">
                        </span>
                        <a href="#">Facebook</a>
                    </li>
                    <li>
                        <span class="icons">
                            <img src="./images/instagram.png" alt="instagram icon">
                        </span>
                        <a href="#">Instagram</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copy_rights">
            <ul class="copy_links">
                <li><a href="#">Privacy statement</a></li>
                <li><a href="#">Terms & conditions</a></li>
            </ul>
            <p>Copyright &copy; 2021 Nama</p>
        </div>
    </div>
    </footer>
</body>

</html>