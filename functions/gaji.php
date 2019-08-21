<?php
function insert_gaji_pokok(){
	global $link;
	$query1 = "SELECT karyawan.id_karyawan, master_gaji_pokok.id_master_gaji, master_gaji_pokok.jml_gaji_pokok FROM `karyawan` INNER JOIN master_gaji_pokok ON karyawan.id_bagian = master_gaji_pokok.id_bagian WHERE master_gaji_pokok.id_status = karyawan.id_status AND master_gaji_pokok.id_bagian = karyawan.id_bagian AND karyawan.pend_terakhir = master_gaji_pokok.pend_terakhir GROUP BY karyawan.id_karyawan";
	$sql1 = mysqli_query($link,$query1);

	
	// die($id2);
	$bulan = date('F Y');
	while ($data = mysqli_fetch_array($sql1)) {
		$query2 = "SELECT `gen_id` ('ID_GAJI') AS `gen_id`";
		$sql2 = mysqli_query($link,$query2);
		$id = mysqli_fetch_assoc($sql2);
		
		$id2 = $id['gen_id'];
		$id_karyawan = $data['id_karyawan'];
		$id_gaji_pokok = $data['id_master_gaji'];
		$jumlah = $data['jml_gaji_pokok'];

		$query = "INSERT INTO `gaji_pegawai`(`id_transaksi`, `id_pegawai`, `bulan`,`id_master_gaji`,`jumlah`) VALUES ('$id2','$id_karyawan','$bulan','$id_gaji_pokok','$jumlah')";
		
		mysqli_query($link,$query);
		
	}
	return true;
}

?>