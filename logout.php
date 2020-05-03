<?php
session_start();
if(isset($_SESSION['userdata'])){
	session_unset('userdata'); 
}
header("location: index.php");
?>