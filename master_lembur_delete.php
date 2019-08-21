<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	if(delete_master_lembur($id)){
			?>
			<script type="text/javascript">
				alert('delete berhasil ');

			</script>
			<?php
			header('Location: master_lembur.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>