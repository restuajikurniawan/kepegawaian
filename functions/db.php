<?php
$host = "localhost"; // server
$user = "root"; // username
$pass = ""; // password
$database = "gaji"; // nama database

$link = mysqli_connect($host, $user, $pass, $database); // menggunakan mysqli_connect

if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
}else{
	echo '';
}
?>