<?php
	function insert_master_pajak($id_pajak,$nm_pajak,$jumlah_pajak, $jumlah_penghasilan){
		global $link;
		$query = "INSERT INTO `master_pajak`(`id_pajak`, `nm_pajak`,`jumlah_penghasilan`, `jumlah_pajak`) VALUES ('$id_pajak','$nm_pajak','$jumlah_penghasilan','$jumlah_pajak')";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			die($query);
			return false;
		}
	}

	function update_master_pajak($id_pajak,$nm_pajak,$jumlah_pajak,$jumlah_penghasilan){
		global $link;
		$query = "UPDATE `master_pajak` SET `nm_pajak`='$nm_pajak',`jumlah_pajak`='$jumlah_pajak',`jumlah_penghasilan` = '$jumlah_penghasilan' WHERE id_pajak = '$id_pajak' ";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
	}

?>