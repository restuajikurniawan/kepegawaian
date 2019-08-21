<?php
require_once "core/init.php"; 
$id = $_GET['id'];
if(delete_jadwal($id)){
	header('Location:jadwal.php');
}else{
	echo 'delete gagal !';
}
?>