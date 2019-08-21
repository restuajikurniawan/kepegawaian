<?php
	require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	$query = "DELETE FROM `master_potongan` WHERE `id_potongan`= '$id'";
	if(mysqli_query($link,$query)){
		header('Location: master_potongan.php');
	}else{
		?>
		<script type="text/javascript"> alert('Delete Gagal ')</script>
		<?php
	}
?>