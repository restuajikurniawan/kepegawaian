<?php
function insert_jenjang_karir($id_pegawai,$status,$pend,$nm_jabatan,$nm_divisi){
	global $link;
	$queryid = "SELECT `gen_id` ('id_jjk') AS `gen_id`";
	$sqlid = mysqli_query($link,$queryid);
	$get_id = mysqli_fetch_assoc($sqlid);
	$id = $get_id['gen_id'];
	$tanggal = date('Y-m-d');
	$ket = 'Status Pegawai adalah : '.$status.' Pendidikan terakhir adalah : '.$pend.' Jabatan adalah : '.$nm_jabatan.' Divisi adalah : '.$nm_divisi;
	
	$query = "INSERT INTO `jenjang_karir`(`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES ('$id','$id_pegawai','$tanggal','$ket')";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}


}

function read_jenjang_karir(){
	global $link;

	$query = "SELECT DISTINCT karyawan.nama_karyawan, karyawan.id_karyawan, karyawan.status FROM `jenjang_karir` JOIN karyawan ON jenjang_karir.id_pegawai = karyawan.id_karyawan";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$jenjang_karir[] = $data;
		}
		return $jenjang_karir;
	}else{
		$jenjang_karir[] = 0;
		return $jenjang_karir;
	}
}
function read_jenjang_karir_byid($id_pegawai){
	global $link;
	$query = "SELECT * FROM `jenjang_karir` JOIN karyawan ON jenjang_karir.id_pegawai = karyawan.id_karyawan WHERE jenjang_karir.id_pegawai = '$id_pegawai' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$jenjang_karir_byid[] = $data;
		}
		return $jenjang_karir_byid;
	}else{
		$jenjang_karir_byid[] = 0;
		return $jenjang_karir_byid;
	}
}
function update_status_pegawai($id_pegawai,$id_status){
	global $link;
	$query = "UPDATE `karyawan` SET `id_status`='$id_status' WHERE id_karyawan = '$id_pegawai' ";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_status_jjk($id_pegawai,$status){
	global $link;
	$queryid = "SELECT `gen_id` ('id_jjk') AS `gen_id`";
	$sqlid = mysqli_query($link,$queryid);
	$get_id = mysqli_fetch_assoc($sqlid);
	$id = $get_id['gen_id'];
	$tanggal = date('Y-m-d');
	$ket = 'Status Pegawai diubah ke : '.$status;
	
	$query = "INSERT INTO `jenjang_karir`(`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES ('$id','$id_pegawai','$tanggal','$ket')";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_pend_pegawai($id_pegawai,$id_status){
	global $link;
	$query = "UPDATE `karyawan` SET `pend_terakhir`='$id_status' WHERE id_karyawan = '$id_pegawai' ";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_pend_jjk($id_pegawai,$status){
	global $link;
	$queryid = "SELECT `gen_id` ('id_jjk') AS `gen_id`";
	$sqlid = mysqli_query($link,$queryid);
	$get_id = mysqli_fetch_assoc($sqlid);
	$id = $get_id['gen_id'];
	$tanggal = date('Y-m-d');
	$ket = 'Pendidikan Terakhir Pegawai diubah ke : '.$status;
	
	$query = "INSERT INTO `jenjang_karir`(`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES ('$id','$id_pegawai','$tanggal','$ket')";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_div_pegawai($id_pegawai,$id_status){
	global $link;
	$query = "UPDATE `karyawan` SET `id_bagian`='$id_status' WHERE id_karyawan = '$id_pegawai' ";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_div_jjk($id_pegawai,$status){
	global $link;
	$queryid = "SELECT `gen_id` ('id_jjk') AS `gen_id`";
	$sqlid = mysqli_query($link,$queryid);
	$get_id = mysqli_fetch_assoc($sqlid);
	$id = $get_id['gen_id'];
	$tanggal = date('Y-m-d');
	$ket = 'Divisi Pegawai diubah ke : '.$status;
	
	$query = "INSERT INTO `jenjang_karir`(`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES ('$id','$id_pegawai','$tanggal','$ket')";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_jbtn_pegawai($id_pegawai,$id_status){
	global $link;
	$query = "UPDATE `karyawan` SET `id_jabatan`='$id_status' WHERE id_karyawan = '$id_pegawai' ";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_jbtn_jjk($id_pegawai,$status){
	global $link;
	$queryid = "SELECT `gen_id` ('id_jjk') AS `gen_id`";
	$sqlid = mysqli_query($link,$queryid);
	$get_id = mysqli_fetch_assoc($sqlid);
	$id = $get_id['gen_id'];
	$tanggal = date('Y-m-d');
	$ket = 'Jabatan Pegawai diubah ke : '.$status;
	
	$query = "INSERT INTO `jenjang_karir`(`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES ('$id','$id_pegawai','$tanggal','$ket')";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_rsgn_pegawai($id_pegawai){
	global $link;
	$query = "UPDATE `karyawan` SET `status`='0' WHERE id_karyawan = '$id_pegawai' ";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_rsgn_jjk($id_pegawai){
	global $link;
	$queryid = "SELECT `gen_id` ('id_jjk') AS `gen_id`";
	$sqlid = mysqli_query($link,$queryid);
	$get_id = mysqli_fetch_assoc($sqlid);
	$id = $get_id['gen_id'];
	$tanggal = date('Y-m-d');
	$ket = 'Telah Mengundurkan Diri ';
	
	$query = "INSERT INTO `jenjang_karir`(`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES ('$id','$id_pegawai','$tanggal','$ket')";

	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>