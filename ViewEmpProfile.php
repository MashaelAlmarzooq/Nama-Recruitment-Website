<?php
include('includes/connection.php'); 
// getting employer record code//
$query= "select * from tbl_employeers where emp_id = '".$_GET['ID']."'";
$excute = mysqli_query($conn , $query);
$rec = mysqli_fetch_array($excute);
?>

<!DOCTYPE html>
<html>

<head>
<title> Nama | Employer Profile</title>
<link rel="stylesheet" href="./css/style.css">
</head>


<body class="background">


<div id="nav">
    <ul>
    <!-- https://www.w3schools.com/jsref/met_his_go.asp -->
       <li> <a class="backbutton" type="button" value="go back" onclick="history.go(-1)" >Go back</a></li>
    </ul>
</div>

<main id="main">



<div class="emp-profile">
            <form method="post">
                <table  class="infotable"> 
                    <!-- 1 row-->
                     <tr>
                     <th class="tablehead"> Company's Name </th>
                     <th class="tablehead"> Company's Scop </th>
                     </tr>
                     <!-- 2 row-->
                     <tr>
                         <td class="tabledata"><?php echo $rec['emp_company']; ?></td>
                         <td class="tabledata"><?php echo $rec['emp_scope']; ?></td>
                     </tr>
                     <!-- 3 row-->
                     <tr>
                        <th class="tablehead"> Address </th>
                        <th class="tablehead"> Mission </th>
                        </tr>
                        <!-- 4 row-->
                        <tr>
                            <td class="tabledata"><?php echo $rec['emp_address']; ?></td>
                            <td class="tabledata"><?php echo $rec['emp_mission']; ?></td>
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
                     <!-- <tr>
                        <th colspan="2" class="tablehead"> Address </th>
                        </tr>
                       
                        <tr>
                            <td colspan="2" class="tabledata"><?php echo $rec['emp_address']; ?></td>
                            
                        </tr> -->
                    
                    
                    </table>
<br> <br>
            </form>    
                  
        </div>

        <br><br> <br><br> <br><br> <br><br> <br>
</main>

<?php include('includes/footer.php'); ?>