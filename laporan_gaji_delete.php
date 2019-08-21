<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];

	$query = "DELETE FROM `gaji` WHERE id_gaji = '$id'";
	if(mysqli_query($link,$query)){
			?>
			<script type="text/javascript">
				alert('delete berhasil ');
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>