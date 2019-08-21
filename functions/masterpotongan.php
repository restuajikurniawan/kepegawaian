<?php 
function insert_master_potongan($id_potongan,$nm_potongan,$jumlah_potongan,$id_status){
		global $link;
		$id_pot = base64_encode($id_potongan);
		$query = "INSERT INTO `master_potongan`(`id_potongan`, `nama_potongan`, `jumlah_potongan`,`id_status`) VALUES ('$id_potongan','$nm_potongan','$jumlah_potongan','$id_status')";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			echo true;
		}
	}
	function update_master_potongan($id_potongan,$nm_potongan,$jumlah_potongan){
		global $link;
		$query = "UPDATE `master_potongan` SET `nama_potongan`='$nm_potongan',`jumlah_potongan`='$jumlah_potongan' WHERE id_potongan = '$id_potongan' ";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			echo true;
		}

	}
	?>