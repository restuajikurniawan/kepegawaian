<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	$query = "DELETE FROM `asuransi` WHERE id_asuransi = '$id'";
	if(mysqli_query($link,$query)){
			header('Location: master_asuransi.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>