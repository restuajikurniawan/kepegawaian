<?php
	require_once "../functions/db.php";
	require_once "../functions/get_ip.php";
	global $link;
		$id = $_POST['id_pegawai'];
		$pass = $_POST['password'];
		$user = get_server_user();
		$ip = get_ip();
		  // die($user);

		$query = "SELECT password FROM user WHERE id_user = '$id'";
		$sql = mysqli_query($link,$query);
		$psw = mysqli_fetch_assoc($sql);
		$password = $psw['password'];
		
		if(password_verify($pass,$password)){

			$query = "INSERT INTO `log_login`(`user`,`ip`,`user_server`, `keterangan`) VALUES ('$id','$ip','$user','Melakukan Login')";
			
		$sql = mysqli_query($link,$query);
		}
?>