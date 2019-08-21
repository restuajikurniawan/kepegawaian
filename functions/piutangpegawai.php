<?php
function insert_piutang_pegawai($id_piutang,$id_pegawai,$j_pinjam,$cicilan,$tanggal,$keterangan){
		global $link;
		$query = "INSERT INTO `piutang_pegawai`(`id_piutang`, `id_pegawai`, `tanggal`, `j_pinjaman`,`j_cicilan`,`keterangan`) VALUES ('$id_piutang','$id_pegawai','$tanggal','$j_pinjam','$cicilan','$keterangan')";
		if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
	}
function laporan_piutang_pegawai($bln){
	global $link;
	$query = "SELECT karyawan.nama_karyawan, piutang_pegawai.id_piutang, piutang_pegawai.tanggal, piutang_pegawai.j_pinjaman,piutang_pegawai.j_cicilan, piutang_pegawai.id_pegawai, IF(SUM(potongan_piutang.jumlah) > 0 , SUM(potongan_piutang.jumlah), '0')  AS total , piutang_pegawai.j_pinjaman,piutang_pegawai.j_pinjaman - IF(SUM(potongan_piutang.jumlah) > 0 , SUM(potongan_piutang.jumlah), '0') AS sisa, potongan_piutang.bulan FROM `potongan_piutang` RIGHT JOIN piutang_pegawai ON potongan_piutang.id_pegawai = piutang_pegawai.id_pegawai INNER JOIN karyawan ON karyawan.id_karyawan = piutang_pegawai.id_pegawai  WHERE potongan_piutang.bulan = '$bln' AND piutang_pegawai.acc = '1' GROUP BY piutang_pegawai.id_piutang";
	$sql = mysqli_query($link,$query);
	if(mysqli_num_rows($sql)){
		while ($data = mysqli_fetch_array($sql)) {
				$piutang[] = $data;
		}
		return $piutang;
	}else{
		$piutang[] = 0;
		return $piutang;
	}
}
function cek_acc_utang(){
	global $link;
	$query = "SELECT * FROM `piutang_pegawai`  JOIN karyawan ON karyawan.id_karyawan = piutang_pegawai.id_pegawai WHERE piutang_pegawai.acc = '0'";
	$sql = mysqli_query($link,$query);

		if(mysqli_num_rows($sql) > 0){
		while ($data = mysqli_fetch_array($sql)) {
			$acc[] = $data;
		}
		return $acc;
	}else{
		$acc[]= 0;
		return $acc;
	}
}
function utang_tolak($id_utang){
	global $link;
	$query = "UPDATE `piutang_pegawai` SET `acc`='2' WHERE id_piutang = '$id_utang' ";
	if(mysqli_query($link,$query)){
			return true;
			
		}else{
			return false;

		}
}
function utang_setuju($id_utang){
	global $link;
	$query = "UPDATE `piutang_pegawai` SET `acc`='1' WHERE id_piutang = '$id_utang' ";
	if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
}
function delete_utang($id){
	global $link;
	$query = "DELETE FROM `piutang_pegawai` WHERE id_piutang = '$id'";
	if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;
		}
}
?>