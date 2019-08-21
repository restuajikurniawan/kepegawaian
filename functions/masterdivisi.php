<?php 
function read_divisi(){
	global $link;
	$query = "SELECT * FROM `master_bagian`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$divisi[] = $data;
		}
		return $divisi;
	}else{
		$divisi[] = 0;
		return $divisi;
	}
}
function get_id_div(){
	global $link;
  $query = "SELECT `gen_id` ('id_bagian') AS `gen_id`";
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
function read_div_byid($id){
	global $link;
	$query = "SELECT * FROM `master_bagian` WHERE id_bagian = '$id' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$div[] = $data;
		}
		return $div;
	}else{
		$div[] = 0;
		return $div;
	}
}
function insert_master_divisi($id_divisi, $nm_divisi){
	global $link;
	$query = "INSERT INTO `master_bagian`(`id_bagian`, `nama_bagian`) VALUES ('$id_divisi','$nm_divisi')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_master_divisi($id_divisi, $nm_divisi){
	global $link;
	$query = "UPDATE `master_bagian` SET `nama_bagian`='$nm_divisi' WHERE id_bagian = '$id_divisi' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_master_divisi($id){
	global $link;
	$query = "DELETE FROM `master_bagian` WHERE id_bagian = '$id'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>