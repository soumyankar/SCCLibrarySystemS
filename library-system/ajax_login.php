<?php

include "connect.php";
session_start();

$roll = $_POST['login_roll'];
$pass = $_POST['login_pass'];
$sql="Select * from students where roll_id='$roll' and Password='$pass'";
$query=mysqli_query($conn,$sql);
$found=mysqli_num_rows($query);
$profile=mysqli_fetch_array($query,MYSQLI_ASSOC);
if($found)
{
    $_SESSION['user_id']=$profile['roll_id'];
    echo $_SESSION['user_id'];
    // header("location:home.php");
}
else
{
    echo "Error";
}
?>