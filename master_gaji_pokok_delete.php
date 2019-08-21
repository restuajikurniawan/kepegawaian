<?php
	require_once "core/init.php";
	global $link;
		$id_gaji = $_GET['id'];
		if(delete_master_gaji($id_gaji)){
			// die($query);
			header('Location: master_gaji_pokok.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}
?>