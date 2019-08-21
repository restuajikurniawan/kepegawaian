<?php 
require_once "core/init.php";
global $link;

	$id = $_POST['id_pegawai'];
	$query = "SELECT * FROM karyawan WHERE id_rfid = '$id'";
if($result = mysqli_query($link,$query)){
				if(mysqli_num_rows($result) !=0){
					date_default_timezone_set("Asia/Jakarta");
					$id = mysqli_fetch_assoc($result);
					$id_pegawai = $id['id_karyawan'];
					$jam = date('H:i:s');
					$tgl =  date('Y-m-d');

					$query2 = "SELECT * FROM `absensi_pegawai` WHERE id_karyawan = '$id_pegawai' AND tgl_absen = '$tgl' ";
					$sql = mysqli_query($link,$query2);
					$data = mysqli_fetch_assoc($sql);
					$id_absensi = $data['id_absensi'];
					$jam_keluar = $data['jam_keluar_1'];

					if($id_absensi == ''){
						if(absen_masuk($id_pegawai,$jam,$tgl)){
							header('Location:cek_absen.php');
						}
					}else if($jam_keluar == '') {
						die($id_absensi);
						if(absen_keluar($id_absensi,$jam)){
							header('Location:cek_absen.php');
						}
					}

					
				}else{
				echo "<script> alert('Anda Belum Terdaftar'); </script>";
				 echo "<meta http-equiv='refresh' content='0; url=cek_absen.php'>";
					
				}
}
	// $cek = mysqli_num_rows($sql);
	// if($cek > 0 ){
		 
 //    while($row=mysqli_fetch_array($sql)){
 //        $html = $row['nama_karyawan'];
 //    }
 //    echo $html;
	// }else{
	// 	return false;
	// }
?>