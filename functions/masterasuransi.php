<?php 
	function insert_master_asuransi($id_asuransi,$nm_asuransi,$jumlah_asuransi,$id_status){
		global $link;
		$query = "INSERT INTO `asuransi`(`id_asuransi`, `nama_asuransi`, `jumlah_asuransi`,`id_status`) VALUES ('$id_asuransi','$nm_asuransi','$jumlah_asuransi','$id_status')";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
	}

	function update_master_asuransi($id_asuransi,$nm_asuransi,$jumlah_asuransi){
		global $link;
		$query = "UPDATE `asuransi` SET `nama_asuransi`='$nm_asuransi',`jumlah_asuransi`='$jumlah_asuransi' WHERE `id_asuransi`= '$id_asuransi'";
		if (mysqli_query($link,$query)) {
			return true;
		}else{
			return false;
		}
	}
	function select_status(){
		global $link;

		$query = "SELECT * FROM master_status";
		$sql = mysqli_query($link,$query);

		while ($data = mysqli_fetch_array($sql)) {
			$status[] = $data;
		}
		return $status;
	}
?>