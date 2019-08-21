<?php
function insert_master_hariraya($id_bulan,$bulan,$tahun){
	global $link;
	$query = "INSERT INTO `master_hariraya`(`id_bulan`, `bulan`, `tahun`) VALUES ('$id_bulan','$bulan','$tahun')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_master_hariraya($id_bulan,$bulan,$tahun){
	global $link;
	$query = "UPDATE `master_hariraya` SET `bulan`='$bulan',`tahun`='$tahun' WHERE id_bulan = '$id_bulan' ";
	if (mysqli_query($link,$query)) {
		return true;	
	}else{
		return false;
	}
}
?>