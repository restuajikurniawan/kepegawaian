<?php
function insert_master_deposit($id_deposit,$nm_deposit,$jumlah_deposit){
	global $link;
	$query = "INSERT INTO `deposit_koperasi`(`id_deposit`, `nama_deposit`, `jumlah`) VALUES ('$id_deposit','$nm_deposit','$jumlah_deposit')";
	if(mysqli_query($link,$query)){
		return true;
	}else{
		return false;
	}

}
function update_master_deposit($id_deposit,$nm_deposit,$jumlah_deposit){
	global $link;
	$query = "UPDATE `deposit_koperasi` SET `nama_deposit`='$nm_deposit',`jumlah`='$jumlah_deposit' WHERE id_deposit = '$id_deposit' ";
	if (mysqli_query($link,$query)) {
		return true;
	}else{
		return false;
	}
}
?>