<?php 
function get_id_kr(){
	global $link;
	$query1 = "SELECT `gen_id` ('id_pegawai') AS `gen_id`";
  	$sql1 = mysqli_query($link,$query1);

 	if(mysqli_num_rows($sql1)>0){
 		while($data = mysqli_fetch_array($sql1)){
 			$id_kr[] = $data;
 		}
 		return $id_kr;
 	}else{
 		$id_kr[] = 0;
 		return $id_kr;
 	}
}
function pend_pegawai(){
	global $link;
	$query = "SELECT * FROM `master_pendidikan`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)>0){
 		while($data = mysqli_fetch_array($sql)){
 			$pendidikan[] = $data;
 		}
 		return $pendidikan;
 	}else{
 		$pendidikan[] = 0;
 		return $pendidikan;
 	}

}
function jabatan(){
	global $link;
	$query = "SELECT * FROM `jabatan_pegawai`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)>0){
 		while($data = mysqli_fetch_array($sql)){
 			$jabatan[] = $data;
 		}
 		return $jabatan;
 	}else{
 		$jabatan[] = 0;
 		return $jabatan;
 	}
}
function divisi_pegawai(){
	global $link;
	$query = "SELECT * FROM `master_bagian`";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)>0){
 		while($data = mysqli_fetch_array($sql)){
 			$divisi[] = $data;
 		}
 		return $divisi;
 	}else{
 		$divisi[] = 0;
 		return $divisi;
 	}
}
function read_pegawai(){
	global $link;
	$query = "SELECT * FROM `karyawan` 
	JOIN master_bagian 
	ON karyawan.id_bagian = master_bagian.id_bagian 
	JOIN master_status 
	ON karyawan.id_status = master_status.id_status 
	 LEFT JOIN jabatan_pegawai 
	ON jabatan_pegawai.id_jabatan = karyawan.id_jabatan WHERE karyawan.status = '1'";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$pegawai[] = $data;
		}
		return $pegawai;
	}else{
		$pegawai = 0;
		return $pegawai;
	}
}
function read_pegawai_kontrak(){
	global $link;
	$query = "SELECT * FROM `karyawan` 
	JOIN master_bagian 
	ON karyawan.id_bagian = master_bagian.id_bagian 
	JOIN master_status 
	ON karyawan.id_status = master_status.id_status 
	 LEFT JOIN jabatan_pegawai 
	ON jabatan_pegawai.id_jabatan = karyawan.id_jabatan
	LEFT JOIN kontrak_pegawai
    ON karyawan.id_karyawan = kontrak_pegawai.id_pegawai
    WHERE karyawan.id_status = 'S003' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$pegawai[] = $data;
		}
		return $pegawai;
	}else{
		$pegawai = 0;
		return $pegawai;
	}
}
function insert_master_pegawai($id_pegawai,$nip,$nm_pegawai,$jk,$tmp_lahir,$tgl_lahir,$agama,$alamat,$no_tlp,$stts_pernikahan,$jml_anak,$tgl_masuk,$no_npwp,$pend_pegawai,$divisi,$jabatan,$id_status,$a_koperasi,$id_rfid,$gbr_pgw){
	global $link;
	$query = "INSERT INTO `karyawan`(`id_karyawan`, `nip`, `nama_karyawan`, `jk_karyawan`, `tmpt_lahir`, `tgl_lahir`, `agama`, `tgl_masuk`, `alamat`, `no_telpn`, `pend_terakhir`, `id_jabatan`, `id_bagian`, `id_status`, `no_npwp`, `anggota_koperasi`, `status_pernikahan`, `jml_anak`,`id_rfid`,`foto_pegawai`) VALUES ('$id_pegawai','$nip','$nm_pegawai','$jk','$tmp_lahir','$tgl_lahir','$agama','$tgl_masuk','$alamat','$no_tlp','$pend_pegawai','$jabatan','$divisi','$id_status','$no_npwp','$a_koperasi','$stts_pernikahan','$jml_anak','$id_rfid','$gbr_pgw')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}


}

function read_peg_byid($id){
	global $link;
	$query = "SELECT * FROM karyawan JOIN master_status ON master_status.id_status = karyawan.id_status JOIN jabatan_pegawai ON jabatan_pegawai.id_jabatan = karyawan.id_jabatan JOIN master_bagian ON master_bagian.id_bagian = karyawan.id_bagian JOIN master_pendidikan ON master_pendidikan.id_pend = karyawan.pend_terakhir WHERE id_karyawan ='$id' ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$peg_detail[] = $data;
		}
		return $peg_detail;
	}else{
		$peg_detail[] = 0;
		return $peg_detail;
	}
}

function update_master_pegawai($id_pegawai,$nip,$nm_pegawai,$jk,$tmp_lahir,$tgl_lahir,$agama,$alamat,$no_tlp,$stts_pernikahan,$jml_anak,$tgl_masuk,$no_npwp,$a_koperasi,$id_rfid){
	global $link;
	$query = "UPDATE `karyawan` SET `nip`='$nip',`nama_karyawan`='$nm_pegawai',`jk_karyawan`='$jk',`tmpt_lahir`='$tmp_lahir',`tgl_lahir`='$tgl_lahir',`agama`='$agama',`tgl_masuk`='$tgl_masuk',`alamat`='$alamat',`no_telpn`='$no_tlp',`no_npwp`='$no_npwp',`anggota_koperasi`='$a_koperasi',`status_pernikahan`='$stts_pernikahan',`jml_anak`='$jml_anak',`id_rfid`='$id_rfid' WHERE `id_karyawan` = '$id_pegawai' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function update_master_pegawai2($id_pegawai,$nip,$nm_pegawai,$jk,$tmp_lahir,$tgl_lahir,$agama,$alamat,$no_tlp,$stts_pernikahan,$jml_anak,$tgl_masuk,$no_npwp,$a_koperasi,$gbr_pgw,$id_rfid){
	global $link;
	$query = "UPDATE `karyawan` SET `nip`='$nip',`nama_karyawan`='$nm_pegawai',`jk_karyawan`='$jk',`tmpt_lahir`='$tmp_lahir',`tgl_lahir`='$tgl_lahir',`agama`='$agama',`tgl_masuk`='$tgl_masuk',`alamat`='$alamat',`no_telpn`='$no_tlp',`no_npwp`='$no_npwp',`anggota_koperasi`='$a_koperasi',`status_pernikahan`='$stts_pernikahan',`jml_anak`='$jml_anak',`foto_pegawai` = '$gbr_pgw',`id_rfid`='$id_rfid' WHERE `id_karyawan` = '$id_pegawai' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function delete_pegawai($id){
	global $link;
	$query = "UPDATE `karyawan` SET`status`='0' WHERE id_karyawan = '$id'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>