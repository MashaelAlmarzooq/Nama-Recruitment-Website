<?php
include('includes/connection.php');
// security code//
if(!isset($_SESSION['emp_id']))
{
    $_SESSION['msg'] = '<span style="color: red">Sorry Invalid access</span>';
    header('location:signin.php');
}

if(isset($_POST['addadvice']))
{
 
	$advice = $_POST['advice'];
    $title = $_POST['title'];
	$query = "insert into tbl_advice set 
	advice = '$advice',
    advice_title = '$title',
	emp_id = '".$_SESSION['emp_id']."'
	"; 

    $excute = mysqli_query($conn , $query);

    if($excute)
    {
        $_SESSION['msg'] = '<span style="color:green">Advice added successfully</span>';
    }
    else
    {
        $_SESSION['msg'] = '<span style="color:red">Opps something go wrong</span>';
    }
	
}



//Delete code
if(isset($_GET['ID']) && $_GET['ID'] != '')
{

$delete = mysqli_query($conn, "delete from tbl_advice where advice_id = '".$_GET['ID']."'");
if($delete)
{

$_SESSION['msg'] = '<span style="color:green">Advice deleted successfully</span>';
header('location:MyAdvice.php');
exit;
}
}
// selection code 
$excute = mysqli_query($conn, "select * from tbl_advice where emp_id = '".$_SESSION['emp_id']."'order by advice_id desc");

?>
<?php include('includes/emp_header.php'); ?>
<!--=========Main Content============-->
<main id="main">
<p> <?php if(isset( $_SESSION['msg'])){
                echo  $_SESSION['msg']; 
                unset( $_SESSION['msg']);
            } ?></p>
 
	
    <div >
      <h1 class="FontcolAdv">My Advices</h1>
      <br>
	  <div>
		  <div class="advList">
 
		<ul class="advList" style="display:flex; flex-direction:column">
		<?php while($rec = mysqli_fetch_array($excute)){ ?>
            
			<li class="adv"> <?php echo $rec['advice']; ?> <a href="MyAdvice.php?ID=<?php echo $rec['advice_id'];?>"><button class="bordered_btn">delete</button></a></li>

          <?php } ?>
			
			
		</ul>
        <div id="addadv">
          
          
		<h1 class="FontcolAdv"> Add new Advice</h1>
		<p class="FontcolAdv">write your advice then click ADD.</p>
<form action="" method="post">
<input id="sinput" type="text" placeholder="Advice title" name="title">
<br><br>
		<textarea name="advice" rows="6" cols="55" class="adv" placeholder="Enter Advice desc"></textarea>
		<br><br><br><br>
		<button class="bordered_btn" name="addadvice"> ADD</button>
</form>	
	</div>
	  </div>
	 
      </div>

</main>
<!--=========End Of Main Content============-->
<?php include('includes/footer.php'); ?>