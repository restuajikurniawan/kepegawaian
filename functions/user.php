<?php 
	function read_user(){
		global $link;
		$query = "SELECT * FROM `user`";
		$sql = mysqli_query($link,$query);
		if(mysqli_num_rows($sql)>0){
			while ($data = mysqli_fetch_array($sql)) {
				$user[] = $data;
			}
			return $user;
		}
	}
	function register_user($id_user,$nama_user,$password,$level){
		global $link;

		$id_user = mysqli_real_escape_string($link,$id_user);
		$nama_user = mysqli_real_escape_string($link,$nama_user);
		$password = mysqli_real_escape_string($link,$password);
		$level = mysqli_real_escape_string($link,$level);
		$password = password_hash($password, PASSWORD_DEFAULT);

		$query= "INSERT INTO `user`(`id_user`, `nama_user`, `password`, `level`) VALUES ('$id_user','$nama_user','$password','$level')";

		if(mysqli_query($link,$query)){
			return true;
		}else{
			return false;

		}
	}
	function cek_level($id_pegawai){
			global $link;
			$email = mysqli_real_escape_string($link,$email);

			$query = "SELECT level FROM `user` WHERE id_user = '$id_pegawai' ";
			$sql = mysqli_query($link,$query);
			if(mysqli_num_rows($sql)>0){
				while($data = mysqli_fetch_array($sql)){
					$level[] = $data;
				}
				return $level;
			}

				}
	function login_cek_id($id_pegawai){
			global $link;
			$id_pegawai = mysqli_real_escape_string($link,$id_pegawai);
			$query = "SELECT * FROM `user` WHERE id_user = '$id_pegawai' ";
			if($result = mysqli_query($link,$query)){
				if(mysqli_num_rows($result) !=0) return true;
				else return false;
			}
	}
	function login_cek_data($id_pegawai,$password){
			global $link;
			$id_pegawai = mysqli_real_escape_string($link,$id_pegawai);
			$password = mysqli_real_escape_string($link,$password);
			$query = "SELECT password FROM user WHERE id_user = '$id_pegawai' ";

			$result = mysqli_query($link,$query);
			$hash = mysqli_fetch_assoc($result);

			if(password_verify($password,$hash['password'])){
				return true;
			}else{
				return false;
			}
	}
	function log_login($id_pegawai){
		global $link;
		$id_pegawai = mysqli_real_escape_string($link,$id_pegawai);

		$query = "INSERT INTO `log_login`(`user`, `keterangan`) VALUES ('$id_pegawai','Melakukan Login')";
		$sql = mysqli_query($link,$query);
	}

	

?>