<?php
	require_once "functions/db.php";
	require_once "functions/get_ip.php";
	global $link;
		
session_start();
		$id_user = $_SESSION['username'];
		$user = get_server_user();
		$ip = get_ip();
		$query = "INSERT INTO `log_login`(`user`,`ip`,`user_server`, `keterangan`) VALUES ('$id_user','$ip','$user','Melakukan Logout')";
		$sql = mysqli_query($link,$query);

session_destroy();
header('Location:login.php');
?>