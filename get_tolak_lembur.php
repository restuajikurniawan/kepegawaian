<?php
require_once "core/init.php";
global $link;

$id_lembur = $_GET['id'];
if(tolak_lembur($id_lembur)){
	header('Location:index.php');
}
?>