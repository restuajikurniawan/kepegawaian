<?php 
require_once "../functions/db.php";
global $link;
	$id = $_POST['id_pegawai'];

	$query = "SELECT SUM(absensi) AS absen FROM `absensi` WHERE id_pegawai = '$id'";
	$sql = mysqli_query($link,$query);
	$cek = mysqli_num_rows($sql);
	if($cek > 0 ){
		 
    while($row=mysqli_fetch_array($sql)){
        $html = $row['absen'];
    }
    echo $html;
	}else{
		return false;
	}
?>