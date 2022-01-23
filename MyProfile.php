<?php
include('includes/connection.php'); 
if(!isset($_SESSION['seeker_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}
//Delete profile code
if(isset($_GET['ID']) && $_GET['ID'] != "")
{
 
  $delete= mysqli_query($conn,"delete from tbl_jobseeker where seeker_id ='".$_SESSION['seeker_id']."'");

 if($delete)
    {

        session_destroy();
        $_SESSION['msg'] = '<span style="color: red">Your Account is deleted Permanantly</span>';
        header('location:index.php');
        exit();
    }
}

$query= "select * from tbl_jobseeker where seeker_id = '".$_SESSION['seeker_id']."'";
$excute = mysqli_query($conn , $query);
$rec = mysqli_fetch_array($excute);
?>
<?php include('includes/seeker_header.php'); ?>
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
                         <td class="tabledata">Private</td>
                         <td class="tabledata">Software engineer</td>
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
            <div style="display: flex; justify-content: center; width: 50%;">
                <a class="bordered_btn" href="Editseeker.php" style="width: 80px; text-decoration: none"> Edit</a>
                <a class="bordered_btn" href="MyProfile.php?ID=<?php echo $rec['seeker_id']; ?>" onclick="return confirm('Are you sure to delete your profile Permantly?');" style="width: 80px; text-decoration: none"> Delete</a>

            </div>
            </form>    
                  
        </div>

        <br><br> <br><br> <br><br> <br><br> <br>
</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>