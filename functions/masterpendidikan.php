<?php 
function read_pendidikan(){
	global $link;
	$query = "SELECT * FROM `master_pendidikan`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$pendidikan[] = $data;
		}
		return $pendidikan;
	}else{
		$pendidikan[] = 0;
		return $pendidikan;
	}
}
function read_pend_byid($id){
	global $link;
	$query = "SELECT * FROM `master_pendidikan` WHERE id_pend = '$id' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$pend_id[] = $data;
		}
		return $pend_id;
	}else{
		$pend_id[] = 0;
		return $pend_id;
	}
}
function get_id_pend(){
global $link;
  $query = "SELECT `gen_id` ('id_pend') AS `gen_id`";
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
function insert_master_pendidikan($id_pend,$nm_pend){
	global $link;
	$query = "INSERT INTO `master_pendidikan`(`id_pend`, `nama_pend`) VALUES ('$id_pend','$nm_pend')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_master_pendidikan($id_pend,$nm_pend){
	global $link;
	$query = "UPDATE `master_pendidikan` SET `nama_pend`= '$nm_pend' WHERE id_pend = '$id_pend' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_master_pendidikan($id){
	global $link;
	$query = "DELETE FROM `master_pendidikan` WHERE id_pend = '$id' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>