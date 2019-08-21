<?php
require_once "core/init.php";
	global $link;
	$id_dinas = $_GET['id'];
	
	if(delete_dinas($id_dinas)){
			header('Location: perjalanan_dinas.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>