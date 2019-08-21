<?php
function insert_lembur_pegawai($id_lembur,$id_pegawai,$tgl_lembur,$jam_mulai,$jam_selesai,$keterangan){
	global $link;
	$bulan = date('mY');
	$query = "INSERT INTO `lembur_pegawai`(`id_lembur`, `tgl_lembur`, `id_pegawai`, `jam_mulai`, `jam_selesai`,`bulan`,`keterangan`) VALUES ('$id_lembur','$tgl_lembur','$id_pegawai','$jam_mulai','$jam_selesai','$bulan','$keterangan')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function delete_lembur_pegawai($id){
	global $link;

	$query = "DELETE FROM `lembur_pegawai` WHERE id_lembur = '$id'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function insert_gaji_lembur(){
	global $link;

	$query = "SELECT lembur_pegawai.id_pegawai, master_lembur.id_master_lembur,lembur_pegawai.bulan,lembur_pegawai.tgl_lembur, SUM(jam_selesai - jam_mulai)/10000* master_lembur.gaji_lembur AS tot_gaji_lbr FROM `lembur_pegawai` INNER JOIN `karyawan` ON lembur_pegawai.id_pegawai = karyawan.id_karyawan INNER JOIN master_lembur ON karyawan.id_status = master_lembur.id_status WHERE lembur_pegawai.acc = '1' GROUP BY lembur_pegawai.id_lembur";

	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$tanggal2 = date('Y-m-20');
		$tanggal3 = date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));
		$tanggal = $data['tgl_lembur'];
		$bln = date('F Y');

		$query2 = "SELECT `gen_id` ('id_gaji_lembur') AS `gen_id`";
		$sql2 = mysqli_query($link, $query2);
		$id = mysqli_fetch_assoc($sql2);

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
			$id2 = $id['gen_id'];
			$id_karyawan = $data['id_pegawai'];
			$id_lembur = $data['id_master_lembur'];
			$gaji_lembur = $data['tot_gaji_lbr'];

			$query3 = "INSERT INTO `gaji_lembur_pegawai`(`id_transaksi`, `id_pegawai`, `id_master_lembur`, `jumlah`, `bulan`) VALUES ('$id2','$id_karyawan','$id_lembur','$gaji_lembur','$bln')";
			mysqli_query($link,$query3);
		}
	}
		return true;
}
function cek_acc_lembur(){
	global $link;

	$query = "SELECT lembur_pegawai.id_lembur, lembur_pegawai.acc, karyawan.nama_karyawan , SUM(jam_selesai - jam_mulai) AS tot_jam, lembur_pegawai.tgl_lembur, lembur_pegawai.jam_mulai, lembur_pegawai.jam_selesai, lembur_pegawai.keterangan FROM `lembur_pegawai` INNER JOIN `karyawan` ON lembur_pegawai.id_pegawai = karyawan.id_karyawan GROUP BY lembur_pegawai.id_lembur";
  $sql = mysqli_query($link,$query);
  if(mysqli_num_rows($sql) > 0){
		while ($data = mysqli_fetch_array($sql)) {
			$acc_lembur[] = $data;
		}
		return $acc_lembur;
	}else{
		$acc_lembur[]= 0;
		return $acc_lembur;
	}
}
function acc_lembur($id_lembur){
	global $link;
	$query = "UPDATE `lembur_pegawai` SET `acc`='1' WHERE id_lembur = '$id_lembur'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
function tolak_lembur($id_lembur){
	global $link;
	$query = "UPDATE `lembur_pegawai` SET `acc`='2' WHERE id_lembur = '$id_lembur'";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}
}
?>