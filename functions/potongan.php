<?php 
function potongan_piutang(){
	global $link;
	$query = "SELECT id_pegawai, id_piutang,tanggal, j_pinjaman, j_cicilan, (j_pinjaman/j_cicilan) AS pot_piutang FROM piutang_pegawai WHERE piutang_pegawai.acc = '1'";
	$sql = mysqli_query($link,$query);
	while ($data = mysqli_fetch_array($sql)) {
		 $tanggal = $data['tanggal'];
		$tanggal1 = date('Y-m');
		$j_bln = $data['j_cicilan'];
		$j_tempo = date('Y-m', strtotime("+ $j_bln month", strtotime($tanggal)));
		$bln = date('F Y');
	if(strtotime($tanggal1) <= strtotime($j_tempo)){
		$query2 = "SELECT `gen_id` ('id_potongan_pg') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);
		$id2 = $id['gen_id'];
		
			$id_pegawai = $data['id_pegawai'];
			$id_piutang = $data['id_piutang'];
			$pot_piutang = $data['pot_piutang'];

		$query3 = "INSERT INTO `potongan_piutang`(`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES ('$id2','$id_pegawai','$id_piutang','$pot_piutang','$bln')";
		$sql3 = mysqli_query($link, $query3);

		}
	}
	return true;
	// die($query3);
}

function potongan_koperasi(){
	global $link;
	$query = "SELECT * FROM `karyawan` WHERE anggota_koperasi = '1'";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$query2 = "SELECT * FROM `deposit_koperasi`";
		$sql2 = mysqli_query($link,$query2);
		$row = mysqli_fetch_assoc($sql2);
		$id_potongan = $row['id_deposit'];
		$jumlah = $row['jumlah'];
		$bln = date('F Y');

		$query3 = "SELECT `gen_id` ('id_potongan_pg') AS `gen_id`";
		$sql3 = mysqli_query($link,$query3);
		$id = mysqli_fetch_assoc($sql3);
		$id2 = $id['gen_id'];

		$id_pegawai = $data['id_karyawan'];

		$query4 = "INSERT INTO `potongan_koperasi`(`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES ('$id2','$id_pegawai','$id_potongan','$jumlah','$bln')";
		$sql4 = mysqli_query($link,$query4);

	}
	return true;

}
function potongan_bpjs(){
	global $link;
	$query = "SELECT * FROM `karyawan` JOIN asuransi ON karyawan.id_status = asuransi.id_status";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$id_pegawai = $data['id_karyawan'];
		$id_potongan = $data['id_asuransi'];
		$jumlah = $data['jumlah_asuransi']*0.2;
		$bulan = date('F Y');

		$query2 = "SELECT `gen_id` ('id_potongan_pg') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);
		$id2 = $id['gen_id'];

		$query3 = "INSERT INTO `potongan_bpjs`(`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES ('$id2','$id_pegawai','$id_potongan','$jumlah','$bulan')";
		$sql3 = mysqli_query($link,$query3);

	}
	return true;
}
function potongan_terlambat(){
	global $link;
	$bln = date('F Y');
	//$query1 = "SELECT id_karyawan, tgl_absen, jam_masuk_1, if(jam_masuk_1 >= '083500', jam_masuk_1 - '083500',0 ) AS telat1 FROM `absensi_pegawai` WHERE keterangan = 'HADIR' GROUP BY id_absensi ASC";
	$query1 = "SELECT id_pegawai,COUNT(jml_terlambat) AS telat1 FROM `rekap_terlambat` WHERE bulan = '$bln' GROUP BY id_pegawai";
	$sql1 = mysqli_query($link,$query1);


	while($data = mysqli_fetch_array($sql1)){
			$query2 = "SELECT * FROM `master_potongan` WHERE id_status='1'";
		$sql2 = mysqli_query($link,$query2);
		$data2 = mysqli_fetch_array($sql2);

		$query3 = "SELECT `gen_id` ('id_potongan_pg') AS `gen_id`";
		$sql3 = mysqli_query($link,$query3);
		$id = mysqli_fetch_assoc($sql3);
		$bln = date('F Y');
		// $tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 = date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));

				$id2 = $id['gen_id'];
				$id_potongan = $data2['id_potongan'];
				$jumlah = $data2['jumlah_potongan'];
				$id_karyawan = $data['id_pegawai'];
				$terlambat = $data['telat1'];
				$total = $jumlah*($terlambat);
		


	//if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){

			if($total > 0){
				$query4 = "INSERT INTO `potongan_pegawai`(`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_potongan','$total','$bln')";
			$sql4 = mysqli_query($link,$query4);
			}
		//}
	}
	return true;
}
function potongan_alpha(){
	global $link;
	$query1 = "SELECT id_karyawan, tgl_absen FROM `absensi_pegawai` WHERE keterangan = 'ALPHA' GROUP BY id_absensi";
	$sql1 = mysqli_query($link,$query1);
	$query2 = "SELECT * FROM `master_potongan` WHERE id_status='2'";
		$sql2 = mysqli_query($link,$query2);
		$data2 = mysqli_fetch_array($sql2);

		$query3 = "SELECT `gen_id` ('id_potongan_pg') AS `gen_id`";
		$sql3 = mysqli_query($link,$query3);
		$id = mysqli_fetch_assoc($sql3);

	while($data = mysqli_fetch_array($sql1)){
		$bln = date('F Y');
		$tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 = date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
				$id2 = $id['gen_id'];
				$id_potongan = $data2['id_potongan'];
				$jumlah = $data2['jumlah_potongan'];
				$id_karyawan = $data['id_karyawan'];
			$query4 = "INSERT INTO `potongan_pegawai`(`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_potongan','$jumlah','$bln')";
			$sql4 = mysqli_query($link,$query4);
		}
	}
	return true;
}
?>