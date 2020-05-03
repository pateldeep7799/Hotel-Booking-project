<?php
session_start();
// connect to the database
include("db.php");

$errors = array(); 

$id = $_GET['id'];

$user_check_query = "SELECT * FROM users WHERE id='$id' AND status != 'ENABLE' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user){
	$user_update_query = "UPDATE users SET status = 'ENABLE' WHERE id = '$id'";
  	$resultupdate = mysqli_query($con, $user_update_query);
  	$userupdate = mysqli_fetch_assoc($resultupdate);
  	
  	header("location: http://localhost/Hotel/Login.php?status=success");
} else {
	array_push($errors, "Your account don't not active, please contact to admin.");
	header("location: http://localhost/Hotel/?status=fail");
}
exit;
?>