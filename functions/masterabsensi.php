<?php 
function read_absensi(){
	global $link;
	$query = "SELECT * FROM `absensi_pegawai` JOIN karyawan ON karyawan.id_karyawan = absensi_pegawai.id_karyawan LEFT JOIN absensi_berkas ON absensi_pegawai.id_absensi = absensi_berkas.id_absensi ORDER BY absensi_pegawai.tgl_absen DESC ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$absensi[] = $data;
		}
		return $absensi;
	}else{
		$absensi[] = 0;
		return $absensi;
	}
}
function read_absensi_byid($id){
	global $link;
	$query = "SELECT * FROM `absensi_pegawai` JOIN karyawan ON karyawan.id_karyawan = absensi_pegawai.id_karyawan WHERE absensi_pegawai.id_absensi = '$id' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$absensi_byid[] = $data;
		}
		return $absensi_byid;
	}else{
		$absensi_byid[] = 0;
		return $absensi_byid;
	}
}
function get_id_absensi(){
	global $link;
  	$query = "SELECT `gen_id` ('id_absensi') AS `gen_id`";
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
function get_pegawai(){
	global $link;
  	$query = "SELECT * FROM karyawan WHERE status = '1' ";
  	$sql = mysqli_query($link,$query);

  if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_array($sql)){
			$pegawai[] = $data;
		}
		return $pegawai;
	}else{
		$pegawai[] = 0;
		return $pegawai;
	}
}
function insert_master_absensi($id_absensi,$id_pegawai,$tgl_absensi,$jam_m1,$jam_m2,$jam_k1,$jam_k2){
	global $link;
	$query = "INSERT INTO `absensi_pegawai`(`id_absensi`, `id_karyawan`, `tgl_absen`, `jam_masuk_1`, `jam_keluar_1`, `jam_masuk_2`, `jam_keluar_2`, `keterangan`) VALUES ('$id_absensi','$id_pegawai','$tgl_absensi','$jam_m1','$jam_k1','$jam_m2','$jam_k2','HADIR')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function insert_cuti_absensi($id_absensi,$id_pegawai,$tgl_absensi,$keterangan){
	global $link;

	$query = "INSERT INTO `absensi_pegawai`(`id_absensi`, `id_karyawan`, `tgl_absen`, `keterangan`) VALUES ('$id_absensi','$id_pegawai','$tgl_absensi','$keterangan')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function upload_surat($id_absensi,$gbr_surat){
global $link;

	$query = "INSERT INTO `absensi_berkas`(`id_absensi`, `nama_surat`) VALUES ('$id_absensi','$gbr_surat')";
	$sql = mysqli_query($link,$query);
	if($sql){
		return true;
	}else{
		return false;
	}
}
function cek_rfid($id_rfid){
global $link;
			$query = "SELECT * FROM karyawan WHERE id_rfid = '$id_rfid'";
			if($result = mysqli_query($link,$query)){
				if(mysqli_num_rows($result) !=0) return true;
				else return false;
			}
}
function absen_masuk($id_pegawai,$jam,$tgl){
	global $link;

	  	$queryid = "SELECT `gen_id` ('id_absensi') AS `gen_id`";
  		$sql = mysqli_query($link,$queryid);
  		$id = mysqli_fetch_assoc($sql);
  		$id_absensi = $id['gen_id'];

	$query = "INSERT INTO `absensi_pegawai`(`id_absensi`, `id_karyawan`, `tgl_absen`, `jam_masuk_1`, `keterangan`) VALUES ('$id_absensi','$id_pegawai','$tgl','$jam','HADIR')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function absen_keluar($id_absensi,$jam){
	global $link;

	$query = "UPDATE `absensi_pegawai` SET `jam_keluar_1`='$jam' WHERE id_absensi = '$id_absensi' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function absen_masuk2($id_absensi,$jam){
	global $link;

	$query = "UPDATE `absensi_pegawai` SET `jam_masuk_2`='$jam' WHERE id_absensi = '$id_absensi' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function absen_keluar2($id_absensi,$jam){
	global $link;

	$query = "UPDATE `absensi_pegawai` SET `jam_keluar_2`='$jam' WHERE id_absensi = '$id_absensi' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function update_master_absensi($id_absensi,$jam_m1,$jam_m2,$jam_k1,$jam_k2){
	global $link;

	$query = "UPDATE `absensi_pegawai` SET `jam_masuk_1`='$jam_m1',`jam_keluar_1`='$jam_k1',`jam_masuk_2`='$jam_m2',`jam_keluar_2`='$jam_k2' WHERE id_absensi = '$id_absensi' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>