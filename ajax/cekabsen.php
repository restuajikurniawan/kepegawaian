<?php 
require_once "../functions/db.php";
global $link;
	$id = $_POST['id_pegawai'];
	
$query = "SELECT * FROM karyawan WHERE id_rfid = '$id'";
if($result = mysqli_query($link,$query)){
				if(mysqli_num_rows($result) !=0){
					echo "terdaftar";
				}else{
					$pesan = 'Anda Belum Terdaftar';
					header('location:cek_absen.php?pesan=$pesan');
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