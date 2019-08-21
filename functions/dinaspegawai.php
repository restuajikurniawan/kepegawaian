<?php
function insert_dinas($id_dinas,$id_karyawan,$tgl_berangkat,$tgl_pulang,$j_pengeluaran,$tujuan_dinas){
	global $link;
	$bulan = date('F Y');
	$query ="INSERT INTO `perjalanan_dinas`(`id_dinas`, `id_pegawai`, `keterangan`, `tgl_berangkat`, `tgl_pulang`, `jumlah_pengeluaran`, `status`,`bulan`) VALUES ('$id_dinas','$id_karyawan','$tujuan_dinas','$tgl_berangkat','$tgl_pulang','$j_pengeluaran','0','$bulan')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function update_dinas($id_dinas, $status){
	global $link;

	$query = "UPDATE `perjalanan_dinas` SET `status`= '$status' WHERE id_dinas = '$id_dinas' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_dinas($id_dinas){
	global $link;
	$query = "DELETE FROM `perjalanan_dinas` WHERE id_dinas = '$id_dinas' ";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function upload_surat_dinas($id_dinas,$gbr_surat){
	global $link;

	$query = "INSERT INTO `perjalanan_dinas_berkas`(`id_dinas`, `nama_berkas`) VALUES ('$id_dinas','$gbr_surat')";
	$sql = mysqli_query($link,$query);
	if($sql){
		return true;
	}else{
		return false;
	}
}
function laporan_dinas($bln){
	global $link;
	$query = "SELECT * FROM `perjalanan_dinas`JOIN karyawan ON perjalanan_dinas.id_pegawai = karyawan.id_karyawan  WHERE perjalanan_dinas.status = '1' AND perjalanan_dinas.bulan = '$bln' ";
	$sql = mysqli_query($link,$query);
	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
			$dinas[] = $data;
		}
		return $dinas;
	}else{
		$dinas[] = 0;
		return $dinas;
	}
}
function cek_acc_dinas(){
	global $link;
	$query = "SELECT perjalanan_dinas.id_dinas, perjalanan_dinas.id_pegawai, karyawan.nama_karyawan, perjalanan_dinas.keterangan,perjalanan_dinas.jumlah_pengeluaran,perjalanan_dinas.tgl_berangkat, perjalanan_dinas.tgl_pulang,perjalanan_dinas.status, datediff(perjalanan_dinas.tgl_pulang, perjalanan_dinas.tgl_berangkat) AS jml_hari FROM `perjalanan_dinas` INNER JOIN karyawan ON karyawan.id_karyawan = perjalanan_dinas.id_pegawai ORDER BY `id_dinas` ASC ";
	$sql = mysqli_query($link,$query);

		if(mysqli_num_rows($sql) > 0){
		while ($data = mysqli_fetch_array($sql)) {
			$acc_dinas[] = $data;
		}
		return $acc_dinas;
	}else{
		$acc_dinas[]= 0;
		return $acc_dinas;
	}
}
function dinas_tolak($id_dinas){
	global $link;
	$query = "UPDATE `perjalanan_dinas` SET `status`='2' WHERE id_dinas = '$id_dinas' ";
	if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
}
function dinas_setuju($id_dinas){
	global $link;
	$query = "UPDATE `perjalanan_dinas` SET `status`='1' WHERE id_dinas = '$id_dinas' ";
	if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
}
?>