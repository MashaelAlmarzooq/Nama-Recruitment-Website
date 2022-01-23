<?php
include('includes/connection.php'); 
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}
//Delete profile code
if(isset($_GET['ID']) && $_GET['ID'] != "")
{
   $delete= mysqli_query($conn,"delete from tbl_employeers where emp_id ='".$_SESSION['emp_id']."'");

 if($delete)
    {

        session_destroy();
        $_SESSION['msg'] = '<span style="color: red">Your Account is deleted Permanantly</span>';
        header('location:index.php');
        exit();
    }
}

$query= "select * from tbl_employeers where emp_id = '".$_SESSION['emp_id']."'";
$excute = mysqli_query($conn , $query);
$rec = mysqli_fetch_array($excute);
?>

<?php include('includes/emp_header.php'); ?>
<!--=========Main Content============-->
<main id="main">

<!------ Include the above in your HEAD tag ---------->

<div class="emp-profile">
            <form method="post">
                <table  class="infotable"> 

                     <!-- 3 row-->
                     <tr>
                        <th class="tablehead"> Company's Name </th>
                        <th class="tablehead"> Company's Scope </th>
                        </tr>
                        <!-- 4 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['emp_company']; ?></td>
                            <td class="tabledata"><?php echo $rec['emp_scope']; ?></td>
                        </tr>
                    
                        <!-- 5 row-->
                     <tr>
                        <th class="tablehead"> Email </th>
                        <th class="tablehead"> Phone </th>
                        </tr>
                        <!-- 6 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['emp_email']; ?></td>
                            <td class="tabledata"><?php echo $rec['emp_phone']; ?></td>
                        </tr>
                    
                        <!-- 7 row-->
                     <tr>
                        <th class="tablehead"> Company's Description </th>
                        <th class="tablehead"> Vision </th>
                        </tr>
                        <!-- 8 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['emp_desc']; ?></td>
                            <td class="tabledata"><?php echo $rec['emp_vision']; ?></td>
                        </tr>
                        <!-- 9 row-->
                     <tr>
                        <th colspan="2" class="tablehead"> Mission </th>
                        </tr>
                        <!-- 10 row-->
                        <tr>
                            <td colspan="2" class="tabledata"><?php echo $rec['emp_mission']; ?></td>
                            
                        </tr>
                    
                    
                    </table>
<br> <br>
<div style="display: flex; justify-content: center; width: 60%;">
 <a class="bordered_btn" href="Editemp.php" style="text-decoration: none; width: 80px;"> Edit</a>
 <a class="bordered_btn" href="MyProfileEmp.php?ID=<?php echo $rec['emp_id']; ?>" style="text-decoration: none; width: 80px;" onclick="return confirm('Are you sure to delete your profile Permantly?');"> Delete</a>

</div>
            </form>    
                  
        </div>

        <br><br> <br><br> <br><br> <br><br> <br>
</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>