<?php 
require_once "../functions/db.php";
global $link;
	$id = $_POST['id_jabatan'];

	$query = "SELECT * FROM `master_gaji_pokok` WHERE id_jabatan = '$id'";
	$sql = mysqli_query($link,$query);
	$cek = mysqli_num_rows($sql);
	if($cek > 0 ){
		 
    while($row=mysqli_fetch_array($sql)){
        $html = $row['jml_gaji_pokok'];
    }
    echo $html;
	}else{
		return false;
	}
?>