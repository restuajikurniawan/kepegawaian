<?php
require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	
	$query = "DELETE FROM `deposit_koperasi` WHERE id_deposit = '$id'";
	if(mysqli_query($link,$query)){
			header('Location: master_koperasi.php');
		}else{
			?>
			<script type="text/javascript">
				alert('delete gagal ');
			</script>
			<?php
		}

?>