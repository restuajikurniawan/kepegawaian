<?php
require_once "core/init.php";
global $link;

$id_utang = $_GET['id'];
if(utang_tolak($id_utang)){
	header('Location:index.php');
}
?>