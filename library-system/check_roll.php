<?php
	include ("connect.php");
	$roll=$_REQUEST['roll'];
	$sql="Select roll_id from students where roll_id='$roll'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($query);
    if($result)
    	echo 'false';
    else
    	echo 'true';
?>