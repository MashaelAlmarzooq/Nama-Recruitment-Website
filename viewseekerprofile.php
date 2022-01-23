<?php 
include('includes/connection.php'); 

$query = mysqli_query($conn,"select * from tbl_jobseeker where seeker_id = '".$_GET['ID']."'");
$rec= mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
<head>
<title> Nama | Job Seeker profile</title>
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

<!------ Include the above in your HEAD tag ---------->

<div class="emp-profile">
            <form method="post">
            <table  class="infotable"> 
                    <!-- 1 row-->
                     <tr>
                     <th class="tablehead"> Profile Visability </th>
                     <th class="tablehead"> Job Name </th>
                     </tr>
                     <!-- 2 row-->
                     <tr>
                         <td class="tabledata"><?php if($rec['seeker_status'] == 1) { echo 'Public';  }else{ echo 'Private'; }?></td>
                         <td class="tabledata"><?php echo $_GET['job']; ?></td>
                     </tr>
                     <!-- 3 row-->
                     <tr>
                        <th class="tablehead"> Name </th>
                        <th class="tablehead"> Nationality </th>
                        </tr>
                        <!-- 4 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['first_name'].' ' .$rec['last_name'];?></td>
                            <td class="tabledata"><?php echo $rec['seeker_nationality']; ?></td>
                        </tr>
                    
                        <!-- 5 row-->
                     <tr>
                        <th class="tablehead"> City </th>
                        <th class="tablehead"> Gender </th>
                        </tr>
                        <!-- 6 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['seeker_city']; ?></td>
                            <td class="tabledata"><?php echo $rec['seeker_gender']; ?></td>
                        </tr>
                    
                        <!-- 7 row-->
                     <tr>
                        <th class="tablehead"> Date of birth </th>
                        <th class="tablehead"> Majors </th>
                        </tr>
                        <!-- 8 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['seeker_dob']; ?></td>
                            <td class="tabledata"><?php echo $rec['seeker_majors']; ?></td>
                        </tr>
                        <!-- 9 row-->
                     <tr>
                        <th  class="tablehead"> Email </th>
                         <th  class="tablehead"> Phone </th>
                        </tr>
                        <!-- 10 row-->
                        <tr>
                            <td  class="tabledata"><?php echo $rec['seeker_email']; ?></td>
                            <td  class="tabledata"><?php echo $rec['seeker_phone']; ?></td>
                            
                        </tr>
                                            <!-- 11 row-->
                     <tr>
                        <th  class="tablehead"> Skills </th>
                         <th  class="tablehead"> Experience </th>
                        </tr>
                        <!-- 12 row-->
                        <tr>
                            <td  class="tabledata"><?php echo $rec['seeker_skills']; ?></td>
                            <td  class="tabledata"><?php echo $rec['seeker_experience']; ?></td>
                            
                        </tr>
                                            <!-- 13 row-->
                     <tr>
                        <th  class="tablehead"> Education </th>
                         <th  class="tablehead"> English level </th>
                        </tr>
                        <!-- 14 row-->
                        <tr>
                            <td  class="tabledata"><?php echo $rec['seeker_education']; ?></td>
                            <td  class="tabledata"><?php echo $rec['seeker_english']; ?></td>
                            
                        </tr>
                                            <!-- 15 row-->
                     <tr>
                        <th  class="tablehead"> Availability </th>
                         <th  class="tablehead"> Your bio </th>
                        </tr>
                        <!-- 16 row-->
                        <tr>
                            <td  class="tabledata"><?php echo $rec['seeker_availability']; ?></td>
                            <td  class="tabledata"><?php echo $rec['seeker_bio']; ?></td>
                            
                        </tr>


                    
                    
                    </table>
<br> <br>
            </form>    
                  
        </div>

        <br><br> <br><br> <br><br> <br><br> <br>
</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>