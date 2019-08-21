<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	$query = "DELETE FROM `master_pajak` WHERE id_pajak = '$id'";
	if(mysqli_query($link,$query)){
			header('Location: master_pajak.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>