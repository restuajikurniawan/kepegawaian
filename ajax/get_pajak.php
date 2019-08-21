<?php
require_once "../functions/db.php";
global $link;
	$query = "SELECT * FROM `pajak`";
	$sql = mysqli_query($link,$query);
	$cek = mysqli_num_rows($sql);
	if($cek > 0 ){
		 
    while($row=mysqli_fetch_array($sql)){
        $html = $row['jumlah_pajak'];
    }
    echo $html;
	}else{
		return false;
	}
?>