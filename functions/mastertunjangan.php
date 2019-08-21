<?php 
function insert_master_tunjangan($id_tunjangan,$nm_tunjangan,$jumlah_tunjangan,$id_jabatan,$status){
		global $link;
		$query = "INSERT INTO `master_tunjangan`(`id_tunjangan`, `nama_tunjangan`, `jumlah_tunjangan`,`id_jabatan`,`status`) VALUES ('$id_tunjangan','$nm_tunjangan','$jumlah_tunjangan','$id_jabatan','$status')";
		if (mysqli_query($link,$query)) {
			return true;
		}else{
			return false;
		}

	}

	function update_master_tunjangan($id_tunjangan,$nm_tunjangan,$jumlah_tunjangan){
		global $link;
		$query = "UPDATE `master_tunjangan` SET `nama_tunjangan`='$nm_tunjangan',`jumlah_tunjangan`='$jumlah_tunjangan' WHERE `id_tunjangan` = '$id_tunjangan' ";
		if (mysqli_query($link,$query)) {
			# code...
			return true;
		}else{
			return false;
		}

	}
	function delete_master_tunjangan($id){
		global $link;
		$query = "DELETE FROM `master_tunjangan` WHERE `id_tunjangan`= '$id'";
		if (mysqli_query($link,$query)) {
			# code...
			return true;
		}else{
			return false;
		}

	}

	?>