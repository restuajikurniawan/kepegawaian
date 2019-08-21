<?php
	require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	if(delete_master_tunjangan($id)){
		header('Location: master_tunjangan.php');
	}else{
		?>
		<script type="text/javascript"> alert('Delete Gagal ')</script>
		<?php
	}
?>