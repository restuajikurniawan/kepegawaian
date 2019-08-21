<?php
function read_jadwal(){
	global $link;
	$query = "SELECT * FROM `jadwal`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$jadwal[] = $data;
		}
		return $jadwal;
	}else{
		$jadwal[] = 0;
		return $jadwal;
	}
}
function read_jadwal_byid($id){
	global $link;
	$query = "SELECT * FROM `jadwal` WHERE id_jadwal = '$id'";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$jadwalbyid[] = $data;
		}
		return $jadwalbyid;
	}else{
		$jadwalbyid[] = 0;
		return $jadwalbyid;
	}
}
function insert_jadwal($id_jadwal,$jam_datang,$jam_istirahat,$jam_masuk,$jam_pulang,$jam_terlambat){
	global $link;
	$query = "INSERT INTO `jadwal`(`id_jadwal`, `jam_datang`, `jam_keluar`, `jam_masuk`, `jam_pulang`, `batas_terlambat`) VALUES ('$id_jadwal','$jam_datang','$jam_istirahat','$jam_masuk','$jam_pulang','$jam_terlambat')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_jadwal($id_jadwal,$jam_datang,$jam_istirahat,$jam_masuk,$jam_pulang,$jam_terlambat){
	global $link;
	$query = "UPDATE `jadwal` SET `jam_datang`='$jam_datang',`jam_keluar`='$jam_istirahat',`jam_masuk`='$jam_masuk',`jam_pulang`='$jam_pulang',`batas_terlambat`='$jam_terlambat' WHERE id_jadwal = '$id_jadwal' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_jadwal($id){
	global $link;
	$query = "DELETE FROM `jadwal` WHERE id_jadwal = '$id'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>