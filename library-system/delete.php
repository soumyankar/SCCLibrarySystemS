<?php 
include 'connect.php';
$bid=$_GET['id'];
$rid=$_GET['roll'];
$dec=$_GET['decision'];
if($dec=='YES')
{
	$timestamp = date("Y-m-d");
	$new= date('Y-m-d',strtotime($timestamp. '+ 14 days'));
	$esql="update books_master set borrowed_by='$rid' , availability='Issued' , borrowed_at= '$timestamp' , due_date='$new' where access_code='$bid'";
	echo $esql;
	$eq=mysqli_query($conn,$esql);
	$usql="update borrow_requests set status='Issued' where roll_id='$rid' and book_id='$bid'";
	$uq=mysqli_query($conn,$usql);
	$unsql="update borrow_requests set status='Booked' where roll_id!='$rid' and book_id='$bid'";
	$unq=mysqli_query($conn,$unsql);
}
if($dec=='return')
{
	$timestamp = date("Y-m-d");
	$new= date('Y-m-d',strtotime($timestamp. '+ 14 days'));
	$esql="update books_master set borrowed_by=NULL , availability='Available' , borrowed_at= NULL , due_date=NULL where access_code='$bid'";
	echo $esql;
	$eq=mysqli_query($conn,$esql);
	$usql="delete from borrow_requests where roll_id='$rid' and book_id='$bid'";
	$uq=mysqli_query($conn,$usql);
}
if($dec=='returnNO')
{
	$timestamp = date("Y-m-d");
	$new= date('Y-m-d',strtotime($timestamp. '+ 14 days'));
	$esql="update books_master set borrowed_by='NULL' , availability='Available' , borrowed_at= 'NULL' , due_date='NULL' where access_code='$bid'";
	echo $esql;
	$eq=mysqli_query($conn,$esql);
	$unsql="update borrow_requests set status='Rejected' where roll_id='$rid' and book_id='$bid'";
	$unq=mysqli_query($conn,$unsql);
}
else
{
	$usql="update borrow_requests set status='Rejected' where roll_id='$rid' and book_id='$bid'";
	$uq=mysqli_query($conn,$usql);
}

	
	header("location:admin-panel-manage.php");
?>