<?php 
include 'connect.php';
$bid=$_GET['id'];
$rid=$_GET['roll'];
$dec=$_GET['decision'];
if($dec=='return')
{
	$s1="select status from borrow_requests where roll_id='$rid' and book_id='$bid'";
	$q1=mysqli_query($conn,$s1);
	$r1=mysqli_fetch_assoc($q1);
	if($r1['status']=='Return Approval')
	{
		header("location:student-profile-home.php?return=false");
	}
	else
	{
		$s2="update borrow_requests set status='Return Approval' where roll_id='$rid' and book_id='$bid'";
		$q2=mysqli_query($conn,$s2);
		$r2=mysqli_fetch_assoc($q2);
		header("location:student-profile-home.php?return=true");
	}
}
if($dec=='reissue')
{
	$s0="select * from books_master where borrowed_by='$rid' and access_code='$bid'";
	$q0=mysqli_query($conn,$s0);
	$r0=mysqli_fetch_assoc($q0);
	$earlier = new DateTime();
	$later = new DateTime($r0['due_date']);
	$diff = $earlier->diff($later)->format("%a");
	if(strtotime($r0['due_date']) > strtotime($earlier))
		header("location:student-profile-home.php?reissue=late");
	else
	{	
		$s1="select status from borrow_requests where roll_id='$rid' and book_id='$bid'";
		$q1=mysqli_query($conn,$s1);
		$r1=mysqli_fetch_assoc($q1);

		if($r1['status']=='reissue_approve')
		{
			echo "<script>alert('Re-issue request already submitted!')</script>";
			header("location:student-profile-home.php?reissue=false&diff=$diff");
		}
		else
		{
			$s2="update borrow_requests set status='Reissue Approval' where roll_id='$rid' and book_id='$bid'";
			$q2=mysqli_query($conn,$s2);
			// header("location:student-profile-home.php");
		}
	}
}
?>