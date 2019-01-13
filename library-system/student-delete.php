<?php 
include 'connect.php';
$bid=$_GET['id'];
$rid=$_GET['roll'];
$dec=$_GET['decision'];
$sql="Select * from books_master where access_code='$bid' and  borrowed_by='$rid'";
$query=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($query);
if($dec=='YES')
{
	if($r)
	{
		echo "<script>alert('May not delete issued book, submit return or reissue request');</script>";
		header("location:student-profile-activity.php?issued=yes");
	}
	else
	{
		$s2="select queue_position from borrow_requests where roll_id='$rid' and book_id='$bid'";
		$q2=mysqli_query($conn,$s2);
		$r2=mysqli_fetch_assoc($q2);
		$rx=$r2['queue_position'];
		$unsql="update borrow_requests set queue_position=queue_position-1 where roll_id!='$rid' and book_id='$bid' and queue_position>$rx";
		$unq=mysqli_query($conn,$unsql);
		$s3="delete from borrow_requests where roll_id='$rid' and book_id='$bid'";
		$q3=mysqli_query($conn,$s3);
		header("location:student-profile-activity.php");
	}
}
?>