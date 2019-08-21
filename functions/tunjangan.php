<?php
function insert_tunjangan_jabatan(){
	global $link;
	$query1 = "SELECT karyawan.id_karyawan , karyawan.jk_karyawan, karyawan.id_jabatan, karyawan.status_pernikahan,karyawan.jml_anak, master_tunjangan.id_tunjangan, master_tunjangan.jumlah_tunjangan, master_gaji_pokok.jml_gaji_pokok,master_gaji_pokok.jml_gaji_pokok*(master_tunjangan.jumlah_tunjangan/100) AS tot_tunjangan FROM `karyawan` INNER JOIN master_tunjangan ON karyawan.id_jabatan = master_tunjangan.id_jabatan JOIN master_gaji_pokok ON karyawan.id_status = master_gaji_pokok.id_status  WHERE master_tunjangan.status = '1'AND master_gaji_pokok.id_status = karyawan.id_status AND master_gaji_pokok.id_bagian = karyawan.id_bagian GROUP BY master_tunjangan.id_tunjangan";
	$sql1 = mysqli_query($link,$query1);
	$bulan = date('F Y');

	while ($data = mysqli_fetch_array($sql1)) {
		$query2 = "SELECT `gen_id` ('id_tunjangan') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);

		$id2 = $id['gen_id'];
		$id_karyawan = $data['id_karyawan'];
		$id_tunjangan = $data['id_tunjangan'];
		$jumlah = $data['tot_tunjangan'];

		$query = "INSERT INTO `tunjangan_pegawai`(`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_tunjangan','$jumlah','$bulan')";
		mysqli_query($link,$query);

	}
	return true;
}
function insert_tunjangan_istri(){
	global $link;

	$query1 = "SELECT karyawan.id_karyawan , karyawan.jk_karyawan, karyawan.id_jabatan, karyawan.status_pernikahan,karyawan.jml_anak, master_tunjangan.id_tunjangan, master_tunjangan.jumlah_tunjangan, master_gaji_pokok.jml_gaji_pokok,master_gaji_pokok.jml_gaji_pokok*(master_tunjangan.jumlah_tunjangan/100) AS tot_tunjangan FROM `karyawan` INNER JOIN master_tunjangan ON karyawan.id_jabatan = master_tunjangan.id_jabatan JOIN master_gaji_pokok ON karyawan.id_status = master_gaji_pokok.id_status  WHERE master_tunjangan.status = '2'AND master_gaji_pokok.id_status = karyawan.id_status AND master_gaji_pokok.id_bagian = karyawan.id_bagian GROUP BY master_tunjangan.id_tunjangan";
	$sql1 = mysqli_query($link,$query1);
	$bulan = date('F Y');

	while ($data = mysqli_fetch_array($sql1)) {
		$query2 = "SELECT `gen_id` ('id_tunjangan') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);

		$id2 = $id['gen_id'];
		$id_karyawan = $data['id_karyawan'];
		$id_tunjangan = $data['id_tunjangan'];
		$jumlah = $data['tot_tunjangan'];
		$jk_karyawan = $data['jk_karyawan'];
		$status_pernikahan = $data['status_pernikahan'];

		if($jk_karyawan == 'L' && $status_pernikahan == 1){
			$query = "INSERT INTO `tunjangan_pegawai`(`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_tunjangan','$jumlah','$bulan')";
		mysqli_query($link,$query);
		}
	}
	return true;
}
function insert_tunjangan_anak(){
	global $link;

	$query1 = "SELECT karyawan.id_karyawan , karyawan.jk_karyawan, karyawan.id_jabatan, karyawan.status_pernikahan,karyawan.jml_anak, master_tunjangan.id_tunjangan, master_tunjangan.jumlah_tunjangan, master_gaji_pokok.jml_gaji_pokok,master_gaji_pokok.jml_gaji_pokok*(master_tunjangan.jumlah_tunjangan/100) AS tot_tunjangan FROM `karyawan` INNER JOIN master_tunjangan ON karyawan.id_jabatan = master_tunjangan.id_jabatan JOIN master_gaji_pokok ON karyawan.id_status = master_gaji_pokok.id_status  WHERE master_tunjangan.status = '3' AND master_gaji_pokok.id_status = karyawan.id_status AND master_gaji_pokok.id_bagian = karyawan.id_bagian GROUP BY karyawan.id_karyawan";
	$sql1 = mysqli_query($link,$query1);

	$query3 = "SELECT karyawan.id_karyawan , karyawan.jk_karyawan, karyawan.id_jabatan, karyawan.status_pernikahan,karyawan.jml_anak, master_tunjangan.id_tunjangan, master_tunjangan.jumlah_tunjangan, master_gaji_pokok.jml_gaji_pokok,master_gaji_pokok.jml_gaji_pokok*(master_tunjangan.jumlah_tunjangan/100) AS tot_tunjangan FROM `karyawan` INNER JOIN master_tunjangan ON karyawan.id_jabatan = master_tunjangan.id_jabatan JOIN master_gaji_pokok ON karyawan.id_status = master_gaji_pokok.id_status  WHERE master_tunjangan.status = '4' AND master_gaji_pokok.id_status = karyawan.id_status AND master_gaji_pokok.id_bagian = karyawan.id_bagian GROUP BY karyawan.id_karyawan";
	$sql3 = mysqli_query($link,$query3);

	$bulan = date('F Y');

	while ($data = mysqli_fetch_array($sql1)) {
		$query2 = "SELECT `gen_id` ('id_tunjangan') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);

		$id2 = $id['gen_id'];
		$id_karyawan = $data['id_karyawan'];
		$id_tunjangan = $data['id_tunjangan'];
		$jumlah = $data['tot_tunjangan'];
		$jml_anak = $data['jml_anak'];

		if($jml_anak == 1){
			$query = "INSERT INTO `tunjangan_pegawai`(`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_tunjangan','$jumlah','$bulan')";
				mysqli_query($link,$query);
		}
	}
	while ($data = mysqli_fetch_array($sql3)) {
		$query2 = "SELECT `gen_id` ('id_tunjangan') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);

		$id2 = $id['gen_id'];
		$id_karyawan = $data['id_karyawan'];
		$id_tunjangan = $data['id_tunjangan'];
		$jumlah = $data['tot_tunjangan'];
		$jml_anak = $data['jml_anak'];

		if($jml_anak >= 2){
			$query = "INSERT INTO `tunjangan_pegawai`(`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_tunjangan','$jumlah','$bulan')";
				mysqli_query($link,$query);
		}
	}
	return true;
}

function insert_tunjangan_tidaktetap(){
	global $link;
	$query1 = "SELECT * FROM `karyawan` INNER JOIN master_tunjangan ON karyawan.id_jabatan = master_tunjangan.id_jabatan WHERE master_tunjangan.status = '0' ";
	$sql1 = mysqli_query($link,$query1);

	

		while ($data = mysqli_fetch_array($sql1)) {

			$query2 = "SELECT * FROM `master_hariraya`";
			$sql2 = mysqli_query($link,$query2);
			$data_bulan = mysqli_fetch_assoc($sql2);
			$bulan = $data_bulan['bulan'];
			$tahun = $data_bulan['tahun'];
			$bulan2 = $bulan.''.$tahun;
			$bulan2 = (int)$bulan2;

			$bulan1 = date('mY');
			$bulan1 = (int)$bulan1;

			$bln = date('F Y');

		if($bulan1 == $bulan2){

			$query3 = "SELECT `gen_id` ('id_tunjangan') AS `gen_id`";
			$sql3 = mysqli_query($link,$query3);
			$id = mysqli_fetch_assoc($sql3);
			$id2 = $id['gen_id'];
			$id_karyawan = $data['id_karyawan'];
			$id_tunjangan = $data['id_tunjangan'];
			$jumlah = $data['jumlah_tunjangan'];

			$query = "INSERT INTO `tunjangan_pegawai`(`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_tunjangan','$jumlah','$bln')";
		mysqli_query($link,$query);
		}
	}



	
	return true;
}
function insert_tunjangan_tidaktetap2(){
	global $link;
	
	$query = "SELECT karyawan.id_karyawan, master_tunjangan.id_tunjangan,master_tunjangan.jumlah_tunjangan, datediff(perjalanan_dinas.tgl_pulang , perjalanan_dinas.tgl_berangkat) AS jml_hari, perjalanan_dinas.bulan FROM `karyawan` INNER JOIN master_tunjangan ON karyawan.id_jabatan = master_tunjangan.id_jabatan INNER JOIN perjalanan_dinas ON karyawan.id_karyawan = perjalanan_dinas.id_pegawai WHERE master_tunjangan.status = '2'AND perjalanan_dinas.status = '1' ";
		$sql = mysqli_query($link,$query);
		// die($query);
		
		while( $data = mysqli_fetch_array($sql)){
			$bulan = date('mY');
			$bulan1 = $data['bulan'];
			$bln = date('F Y');

			$query6 = "SELECT `gen_id` ('id_tunjangan') AS `gen_id`";
			$sql6 = mysqli_query($link,$query6);
			$id = mysqli_fetch_assoc($sql6);

			 if($bulan1 == $bulan){
				$id3 = $id['gen_id'];
				 $id_karyawan2 = $data['id_karyawan'];
				$id_tunjangan2 = $data['id_tunjangan'];
				$jumlah_hari = $data['jml_hari'];
				$jumlah = $data['jumlah_tunjangan'];
				 $jumlah2 = $jumlah_hari * $jumlah ;


			$query2 = "INSERT INTO `tunjangan_pegawai`(`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES ('$id3','$id_karyawan2','$id_tunjangan2','$jumlah2','$bln')";
			//die($query);
			mysqli_query($link,$query2);

		}
		
	}
	return true;
}
?>