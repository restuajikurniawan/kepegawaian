<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	$query = "DELETE FROM `master_hariraya` WHERE id_bulan = '$id'";
	if(mysqli_query($link,$query)){
			header('Location: master_hariraya.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>