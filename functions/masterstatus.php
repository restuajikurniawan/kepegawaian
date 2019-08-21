<?php 
function read_status(){
	global $link;
	$query = "SELECT * FROM `master_status`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$status[] = $data;
		}
		return $status;
	}else{
		$status[] = 0;
		return $status;
	}
}
function get_stts_byid($id){
	global $link;
	$query = "SELECT * FROM `master_status` WHERE id_status = '$id' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$stts[] = $data;
		}
		return $stts;
	}else{
		$stts[] = 0;
		return $stts;
	}
}
function get_id_stts(){
global $link;
  $query = "SELECT `gen_id` ('id_status') AS `gen_id`";
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
function insert_master_status($id_status,$nm_status){
	global $link;
	$query = "INSERT INTO `master_status`(`id_status`, `nama_status`) VALUES ('$id_status','$nm_status')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function update_master_status($id_status,$nm_status){
	global $link;
	$query = "UPDATE `master_status` SET `nama_status`='$nm_status' WHERE id_status = '$id_status'  ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function delete_master_status($id){
	global $link;
	$query = "DELETE FROM `master_status` WHERE id_status = '$id' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>