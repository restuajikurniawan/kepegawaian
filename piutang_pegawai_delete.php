<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	if(delete_utang($id)){
			header('Location: piutang_pegawai.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>