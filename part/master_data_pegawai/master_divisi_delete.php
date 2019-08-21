<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	if(delete_master_divisi($id)){
			header('Location: master_divisi.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>