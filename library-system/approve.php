<?php 
include 'connect.php';
$bid=$_GET['id'];
$dec=$_GET['decision'];
if($dec=='YES')
{	
	$usql="update students set approved='yes' where roll_id='$bid'";
	$uq=mysqli_query($conn,$usql);
}
else
{
	$unsql="delete from students where roll_id='$bid'";
	$unq=mysqli_query($conn,$unsql);
}
	header("location:admin-panel-manage.php");
?>