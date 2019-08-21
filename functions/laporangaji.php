<?php
function select_gaji($id,$bln){
	global $link;

	$query = "SELECT * FROM `gaji_pegawai`INNER JOIN master_gaji_pokok ON gaji_pegawai.id_master_gaji = master_gaji_pokok.id_master_gaji WHERE id_pegawai = '$id' AND bulan = '$bln' ";
	$sql = mysqli_query($link,$query);
	
	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
		$gaji[] = $data;
		}
		return $gaji;
	}else{
		$gaji[] = 0;
		return $gaji;
	}
	
}
function select_lembur($id,$bln){
	global $link;
	$query = "SELECT nama_lembur, SUM(jumlah) AS jumlah  FROM `gaji_lembur_pegawai` INNER JOIN master_lembur ON gaji_lembur_pegawai.id_master_lembur = master_lembur.id_master_lembur WHERE id_pegawai = '$id' AND bulan = '$bln' GROUP BY id_pegawai ";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql) > 0){
		while ($data = mysqli_fetch_array($sql)) {
			$lembur[] = $data;
		}
		return $lembur;
	}else{
		$lembur[]= 0;
		return $lembur;
	}
}
function select_tunjangan($id,$bln){
	global $link;
	$query = "SELECT * FROM `tunjangan_pegawai` JOIN master_tunjangan ON tunjangan_pegawai.id_tunjangan = master_tunjangan.id_tunjangan WHERE id_pegawai = '$id' AND bulan = '$bln'";
	$sql = mysqli_query($link,$query);

	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
		$tunjangan[] = $data;
		}
		return $tunjangan;
	}else{
		$tunjangan[] = 0;
		return $tunjangan;
	}
	
}
function select_pegawai($id){
	global $link;
	$query = "SELECT * FROM karyawan WHERE id_karyawan = '$id' ";
	$sql = mysqli_query($link,$query);
	while($data = mysqli_fetch_array($sql)){
		$pegawai[] = $data;
	}
	return $pegawai;
}
function select_piutang($id,$bln){
	global $link;
	$query = "SELECT * FROM `potongan_piutang` WHERE id_pegawai = '$id' AND bulan = '$bln' ";
	$sql = mysqli_query($link, $query);

	if(mysqli_num_rows($sql)){
		while($data = mysqli_fetch_array($sql)){
			$pot_piutang[] = $data;
		}
		return $pot_piutang;
	}else{
		$pot_piutang[] = 0;
		return $pot_piutang;
	}
}
function select_terlambat($id,$bln){
	global $link;
	$query = "SELECT * FROM `potongan_pegawai` JOIN master_potongan ON master_potongan.id_potongan = potongan_pegawai.id_potongan WHERE id_pegawai = '$id' AND bulan = '$bln' ";
	$sql = mysqli_query($link,$query);
	if(mysqli_num_rows($sql)){
		while($data = mysqli_fetch_array($sql)){
			$pot_terlambat[] = $data;
		}
		return $pot_terlambat;
	}else{
		$pot_terlambat[] = 0;
		return $pot_terlambat;
	}
}
function select_koperasi($id,$bln){
	global $link;
	$query = "SELECT * FROM `potongan_koperasi` join deposit_koperasi ON deposit_koperasi.id_deposit = potongan_koperasi.id_potongan WHERE id_pegawai = '$id' AND bulan = '$bln' ";
	$sql = mysqli_query($link,$query);
	if(mysqli_num_rows($sql)){
		while($data = mysqli_fetch_array($sql)){
			$pot_koperasi[] = $data;
		}
		return $pot_koperasi;
	}else{
		$pot_koperasi[] = 0;
		return $pot_koperasi;
	}
}
function select_bpjs($id,$bln){
	global $link;
	$query = "SELECT * FROM `potongan_bpjs` JOIN asuransi ON asuransi.id_asuransi = potongan_bpjs.id_potongan WHERE id_pegawai = '$id' AND bulan = '$bln' ";
	$sql = mysqli_query($link,$query);
	if(mysqli_num_rows($sql)){
		while($data = mysqli_fetch_array($sql)){
			$pot_bpjs[] = $data;
		}
		return $pot_bpjs;
	}else{
		$pot_bpjs[] = 0;
		return $pot_bpjs;
	}
}
function laporan_gaji($bln){
	global $link;

	$query = "SELECT 
    gaji_pegawai.id_pegawai, 
    karyawan.nama_karyawan,
    gaji_pegawai.jumlah AS gaji_pokok,
    (SELECT SUM(gaji_lembur_pegawai.jumlah) FROM gaji_lembur_pegawai WHERE gaji_lembur_pegawai.id_pegawai = gaji_pegawai.id_pegawai AND gaji_lembur_pegawai.bulan = '$bln') AS gaji_lembur,
	(SELECT SUM(tunjangan_pegawai.jumlah) FROM tunjangan_pegawai WHERE tunjangan_pegawai.id_pegawai = gaji_pegawai.id_pegawai AND tunjangan_pegawai.bulan = '$bln') AS tot_tunjangan,
    (SELECT SUM(potongan_pegawai.jumlah) FROM potongan_pegawai WHERE potongan_pegawai.id_pegawai = gaji_pegawai.id_pegawai AND potongan_pegawai.bulan = '$bln') AS pot_absensi,
    (SELECT SUM(potongan_piutang.jumlah) FROM potongan_piutang WHERE potongan_piutang.id_pegawai = gaji_pegawai.id_pegawai AND potongan_piutang.bulan = '$bln') AS pot_piutang,
    (SELECT SUM(potongan_bpjs.jumlah) FROM potongan_bpjs WHERE potongan_bpjs.id_pegawai = gaji_pegawai.id_pegawai AND potongan_bpjs.bulan = '$bln') AS pot_bpjs,
    (SELECT SUM(potongan_koperasi.jumlah) FROM potongan_koperasi WHERE potongan_koperasi.id_pegawai = gaji_pegawai.id_pegawai AND potongan_koperasi.bulan = '$bln') AS pot_koperasi,
    gaji_pegawai.bulan 
    FROM `gaji_pegawai` 
    JOIN karyawan
    ON karyawan.id_karyawan = gaji_pegawai.id_pegawai
    WHERE gaji_pegawai.bulan = '$bln'";
  $sql = mysqli_query($link,$query);

		if(mysqli_num_rows($sql) > 0){
			while ($data = mysqli_fetch_array($sql)) {
  				$total_gaji[] = $data;
  		}
  		return $total_gaji;
		}else{
			$total_gaji[] = 0;
			return $total_gaji;
		}
}
// function laporan_gaji_pokok($bln){
// 	global $link;

// 	$query = "SELECT 
//     gaji_pegawai.id_pegawai, 
//     karyawan.nama_karyawan,
//     gaji_pegawai.jumlah AS gaji_pokok, 
//     gaji_pegawai.bulan 
//     FROM `gaji_pegawai` 
//     LEFT JOIN karyawan
//     ON karyawan.id_karyawan = gaji_pegawai.id_pegawai
//     WHERE gaji_pegawai.bulan = '$bln'
//     GROUP BY gaji_pegawai.id_pegawai, gaji_pegawai.bulan";
//   $sql = mysqli_query($link,$query);

// 		if(mysqli_num_rows($sql) > 0){
// 			while ($data = mysqli_fetch_array($sql)) {
//   				$total_gaji[] = $data;
//   		}
//   		return $total_gaji;
// 		}else{
// 			$total_gaji[] = 0;
// 			return $total_gaji;
// 		}
// }
// function laporan_gaji_lembur($bln){
// global $link;

// 	$query = "SELECT karyawan.nama_karyawan, nama_lembur, SUM(jumlah) AS jumlah FROM `gaji_lembur_pegawai` INNER JOIN master_lembur ON gaji_lembur_pegawai.id_master_lembur = master_lembur.id_master_lembur INNER JOIN karyawan ON gaji_lembur_pegawai.id_pegawai = karyawan.id_karyawan WHERE bulan = '$bln' GROUP BY karyawan.id_karyawan";
//   $sql = mysqli_query($link,$query);

// 		if(mysqli_num_rows($sql) > 0){
// 			while ($data = mysqli_fetch_array($sql)) {
//   				$total_gaji[] = $data;
//   		}
//   		return $total_gaji;
// 		}else{
// 			$total_gaji[] = 0;
// 			return $total_gaji;
// 		}
// }
?>