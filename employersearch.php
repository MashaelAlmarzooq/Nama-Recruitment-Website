<!DOCTYPE html>
<html>
<head>
<title> Nama | Search for an Employer</title>
<link rel="stylesheet" href="./css/style.css">
</head>


<body class="background">

    <div id="nav">
        <ul>
        <!-- https://www.w3schools.com/jsref/met_his_go.asp -->
          <li> <a class="backbutton" type="button" value="go back" onclick="history.go(-1)" >Go back</a></li>
        </ul>
    </div>  
<!--=========Main Content============-->
<main id="main">

<form action="employersearchresult.php" method="post">  
<div>
<input type="text" id="sinput" placeholder="Company name, scope" name="name">
<button type="submit"  name="search" class="bordered_btn mt">Search</button>
</div>
</form>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


</main>

<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>