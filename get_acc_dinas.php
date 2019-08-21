<?php
require_once "core/init.php";
global $link;

$id_dinas = $_GET['id'];
if(dinas_setuju($id_dinas)){
	header('Location:index.php');
}
?>