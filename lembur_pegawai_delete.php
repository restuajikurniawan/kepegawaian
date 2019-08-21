<?php
	require_once "core/init.php";
	global $link;
		$id_lembur = $_GET['id'];
		if(delete_lembur_pegawai($id_lembur)){
			// die($query);
			header('Location: lembur_pegawai.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}
?>