<?php
require_once $_SERVER['DOCUMENT_ROOT']."/kepegawaian/functions/get_ip.php";
function get_id_gp(){
	global $link;
		   $query = "SELECT `gen_id` ('ID_G_POKOK') AS `gen_id`";
    		$sql = mysqli_query($link,$query);
    		while ($data = mysqli_fetch_array($sql)) {
    			$id[] = $data;
    		}
    		return $id;
}
function select_pendidikan(){
	global $link;
	    $query = "SELECT * FROM `master_pendidikan`";
    	$sql = mysqli_query($link,$query);
    	while ($data = mysqli_fetch_array($sql)) {
    		$pendidikan[] = $data;
    	}
    	return $pendidikan;
}
function select_status_pegawai(){
	global $link;
	    $query = "SELECT * FROM `master_status`";
    	$sql = mysqli_query($link,$query);
    	while ($data = mysqli_fetch_array($sql)) {
    		$status[] = $data;
    	}
    	return $status;
}
function select_bagian(){
	global $link;
		$query = "SELECT * FROM `master_bagian`";
		$sql = mysqli_query($link,$query);
		while($data = mysqli_fetch_array($sql)){
			$bagian[] = $data;
		}
		return $bagian;

}
function insert_master_gaji($id_user,$id_gaji,$status,$bagian,$nama_gaji,$jumlah_gaji,$pendidikan){
		global $link;

		$query = "INSERT INTO `master_gaji_pokok`(`id_master_gaji`, `nama_gaji`, `jml_gaji_pokok`, `id_status`,`id_bagian`,`pend_terakhir`) VALUES ('$id_gaji','$nama_gaji','$jumlah_gaji','$status','$bagian','$pendidikan')";

		$q = "INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES ($id_gaji,$nama_gaji,$jumlah_gaji,$status)";

      
      if(mysqli_query($link,$query)){
      		$user = get_server_user();
			$ip = get_ip();

      		$query2 = "INSERT INTO `log_login`(`user`,`ip`,`user_server`, `keterangan`) VALUES ('$id_user','$ip','$user','$q')";
      		mysqli_query($link,$query2);

      	return true;
      }else{
      	return false;
      }

	}
	function update_master_gaji_pokok($id_gaji,$nama_gaji,$jumlah_gaji){
		global $link;

		$query = "UPDATE `master_gaji_pokok` SET `nama_gaji`='$nama_gaji',`jml_gaji_pokok`='$jumlah_gaji' WHERE `id_master_gaji` = '$id_gaji' ";
      
      if(mysqli_query($link,$query)){
      	return true;
      }else{
      	 // die($query);
      	return false;
      }

	}

	function delete_master_gaji($id_gaji){
		global $link;
		$query = "DELETE FROM `master_gaji_pokok` WHERE id_master_gaji = '$id_gaji' ";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
	}

?>