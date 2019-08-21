<?php
function read_jabatan(){
	global $link;
	$query = "SELECT * FROM `jabatan_pegawai`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$jabatan[] = $data;
		}
		return $jabatan;
	}else{
		$jabatan[] = 0;
		return $jabatan;
	}
}
function read_jabatan_byid($id){
	global $link;
	$query = "SELECT * FROM `jabatan_pegawai` WHERE id_jabatan = '$id' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$jbtn_id[] = $data;
		}
		return $jbtn_id;
	}else{
		$jbtn_id[] = 0;
		return $jbtn_id;
	}
}
function get_id_jabatan(){
	global $link;
  $query = "SELECT `gen_id` ('id_jabatan') AS `gen_id`";
  $sql = mysqli_query($link,$query);

  if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$id[] = $data;
		}
		return $id;
	}else{
		$id[] = 0;
		return $id;
	}
}
function insert_master_jabatan($id_jabatan,$nm_jabatan){
	global $link;
	$query = "INSERT INTO `jabatan_pegawai`(`id_jabatan`, `nama_jabatan`) VALUES ('$id_jabatan','$nm_jabatan')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_master_jabatan($id_jabatan,$nm_jabatan){
	global $link;
	$query = "UPDATE `jabatan_pegawai` SET`nama_jabatan`='$nm_jabatan' WHERE id_jabatan = '$id_jabatan'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_master_jabatan($id){
	global $link;
	$query = "DELETE FROM `jabatan_pegawai` WHERE id_jabatan = '$id'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>