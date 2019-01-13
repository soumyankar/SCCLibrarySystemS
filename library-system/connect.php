<?php
$db="scclibrary";
$conn=mysqli_connect('localhost','root','',$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>