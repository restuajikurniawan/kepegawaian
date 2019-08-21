<?php 
function get_status(){
	global $link;
	  $query2 = "SELECT * FROM master_status ";
  		$sql2 = mysqli_query($link, $query2);

  		while ($data = mysqli_fetch_array($sql2)) {
  			$status[] = $data;
  		}
  		return $status;
 }
 function data_lembur_byid($id){
 	global $link;
 	$query = "SELECT * FROM master_lembur WHERE id_master_lembur = '$id' ";
 	$sql = mysqli_query($link,$query);

 	while($row = mysqli_fetch_array($sql)){
 		$data[] = $row;
 	}
 	return $data;
 }
function insert_master_lembur($id_lembur,$nm_lembur,$jumlah_lembur,$status){
	global $link;

	$query = "INSERT INTO `master_lembur`(`id_master_lembur`, `nama_lembur`, `gaji_lembur`, `id_status`) VALUES ('$id_lembur','$nm_lembur','$jumlah_lembur','$status')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_master_lembur($id_lembur,$nm_lembur,$jumlah_lembur,$status){
	global $link;

	$query = "UPDATE `master_lembur` SET `nama_lembur`= '$nm_lembur',`gaji_lembur`= '$jumlah_lembur',`id_status`= '$status' WHERE id_master_lembur = '$id_lembur' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_master_lembur($id){
	global $link;

	$query = "DELETE FROM `master_lembur` WHERE id_master_lembur = '$id' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>