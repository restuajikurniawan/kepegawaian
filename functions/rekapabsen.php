<?php
function rekap_hadir(){
	global $link;
	$query ="SELECT id_karyawan, COUNT(tgl_absen) AS jml_kerja, tgl_absen FROM `absensi_pegawai` WHERE keterangan = 'HADIR' GROUP BY id_karyawan, tgl_absen";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 =date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));
		$bulan = date('F Y');
		
		$query2 = "SELECT `gen_id` ('id_kerja') AS `gen_id`";
		$sql2 = mysqli_query($link, $query2);
		$id = mysqli_fetch_assoc($sql2);

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
			$id_kerja = $id['gen_id'];
			$id_pegawai = $data['id_karyawan'];
			$jml_kerja = $data['jml_kerja'];

			$query3 = "INSERT INTO `rekap_kerja`(`id_rekap`, `id_pegawai`, `bulan`, `jml_hadir`) VALUES ('$id_kerja','$id_pegawai','$bulan','$jml_kerja')";
			mysqli_query($link,$query3);
		}
	}
	return true;
}
function rekap_terlambat(){
	global $link;
	$query = "SELECT id_karyawan, tgl_absen, if(jam_masuk_1 - '083500'> 0,COUNT(tgl_absen),0 ) + if(jam_masuk_2 - '130500' >0,COUNT(tgl_absen),0 ) AS telat FROM `absensi_pegawai` WHERE keterangan = 'Hadir' GROUP BY id_absensi";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 =date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));
		$bulan = date('F Y');
		$query2 = "SELECT `gen_id` ('id_kerja') AS `gen_id`";
		$sql2 = mysqli_query($link, $query2);
		$id = mysqli_fetch_assoc($sql2);

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
			$id_kerja = $id['gen_id'];
			$id_pegawai = $data['id_karyawan'];
			$jml_terlambat = $data['telat'];

			if($jml_terlambat >0){
				$query3 = "INSERT INTO `rekap_terlambat`(`id_rekap`, `id_pegawai`, `jml_terlambat`, `bulan`) VALUES ('$id_kerja','$id_pegawai','$jml_terlambat','$bulan')";
			mysqli_query($link,$query3);
			}
		}
	}
	return true;
}
function rekap_sakit(){
	global $link;
	$query = "SELECT id_karyawan, COUNT(tgl_absen) AS jml_kerja, tgl_absen FROM `absensi_pegawai` WHERE keterangan = 'SAKIT' GROUP BY id_karyawan, tgl_absen";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 =date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));
		$bulan = date('F Y');
		$query2 = "SELECT `gen_id` ('id_kerja') AS `gen_id`";
		$sql2 = mysqli_query($link, $query2);
		$id = mysqli_fetch_assoc($sql2);

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
			$id_kerja = $id['gen_id'];
			$id_pegawai = $data['id_karyawan'];
			$jml_kerja = $data['jml_kerja'];

			$query3 = "INSERT INTO `rekap_sakit`(`id_rekap`, `id_pegawai`, `jml_sakit`, `bulan`) VALUES ('$id_kerja','$id_pegawai','$jml_kerja','$bulan')";
			mysqli_query($link,$query3);
		}
	}
	return true;
}
function rekap_cuti(){
	global $link;
	$query = "SELECT id_karyawan, COUNT(tgl_absen) AS jml_cuti, tgl_absen FROM `absensi_pegawai` WHERE keterangan = 'CUTI' GROUP BY id_karyawan, tgl_absen";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 =date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));
		$bulan = date('F Y');
		$query2 = "SELECT `gen_id` ('id_kerja') AS `gen_id`";
		$sql2 = mysqli_query($link, $query2);
		$id = mysqli_fetch_assoc($sql2);

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
			$id_kerja = $id['gen_id'];
			$id_pegawai = $data['id_karyawan'];
			$jml_cuti = $data['jml_cuti'];

			$query3 = "INSERT INTO `rekap_cuti`(`id_rekap`, `id_pegawai`, `bulan`, `jml_cuti`) VALUES ('$id_kerja','$id_pegawai','$bulan','$jml_cuti')";
			mysqli_query($link,$query3);
		}
	}
	return true;
}
function rekap_alpha(){
	global $link;
	$query = "SELECT id_karyawan, COUNT(tgl_absen) AS jml_kerja, tgl_absen FROM `absensi_pegawai` WHERE keterangan = 'ALPHA' GROUP BY id_karyawan, tgl_absen";
	$sql = mysqli_query($link,$query);

	while($data = mysqli_fetch_array($sql)){
		$tanggal = $data['tgl_absen'];
		$tanggal2 = date('Y-m-20');
		$tanggal3 =date('Y-m-d',strtotime("-1 month",strtotime($tanggal2)));
		$bulan = date('F Y');
		$query2 = "SELECT `gen_id` ('id_kerja') AS `gen_id`";
		$sql2 = mysqli_query($link, $query2);
		$id = mysqli_fetch_assoc($sql2);

		if( (strtotime($tanggal) >= strtotime($tanggal3)) && (strtotime($tanggal) <= strtotime($tanggal2))){
			$id_kerja = $id['gen_id'];
			$id_pegawai = $data['id_karyawan'];
			$jml_kerja = $data['jml_kerja'];

			$query3 = "INSERT INTO `rekap_alpha`(`id_rekap`, `id_pegawai`, `jml_alpha`, `bulan`) VALUES ('$id_kerja','$id_pegawai','$jml_kerja','$bulan')";
			mysqli_query($link,$query3);
		}
	}
	return true;
}
function read_rekap_kerja($bln){
	global $link;
	$query = "SELECT
	karyawan.nama_karyawan, 
	IF(SUM(rekap_kerja.jml_hadir)>0,SUM(rekap_kerja.jml_hadir),0) AS jml_hadir,
    (SELECT IF(SUM(rekap_terlambat.jml_terlambat)>0,SUM(rekap_terlambat.jml_terlambat),0)  FROM rekap_terlambat WHERE rekap_terlambat.id_pegawai =  karyawan.id_karyawan )AS jml_terlambat,
    (SELECT IF(SUM(rekap_cuti.jml_cuti)>0,SUM(rekap_cuti.jml_cuti),0) FROM rekap_cuti WHERE rekap_cuti.id_pegawai =  karyawan.id_karyawan) AS jml_cuti,
    (SELECT IF(SUM(rekap_sakit.jml_sakit)>0,SUM(rekap_sakit.jml_sakit),0) FROM rekap_sakit WHERE rekap_sakit.id_pegawai =  karyawan.id_karyawan) AS jml_sakit,
    (SELECT IF( SUM(rekap_alpha.jml_alpha)>0, SUM(rekap_alpha.jml_alpha),0) FROM rekap_alpha WHERE rekap_alpha.id_pegawai =  karyawan.id_karyawan) AS jml_alpha
    FROM `karyawan`
    LEFT JOIN rekap_kerja
    ON karyawan.id_karyawan = rekap_kerja.id_pegawai
 	WHERE rekap_kerja.bulan = '$bln'
    GROUP BY karyawan.id_karyawan, rekap_kerja.bulan";

    $sql = mysqli_query($link,$query);
    if(mysqli_num_rows($sql)){
    	while ($data = mysqli_fetch_array($sql)) {
    		$jml_hadir[] = $data;
    	}
    	return $jml_hadir;
    }else{
    	$jml_hadir[] = 0;
    	return $jml_hadir;
    }
}
function read_rekap_terlambat($bln){
	global $link;
	$query = "SELECT
	karyawan.nama_karyawan, 
	IF(SUM(rekap_terlambat.jml_terlambat)>0,SUM(rekap_terlambat.jml_terlambat),0) AS jml_terlambat
    FROM `karyawan`
    LEFT JOIN rekap_terlambat
    ON karyawan.id_karyawan = rekap_terlambat.id_pegawai
	WHERE rekap_terlambat.bulan ='$bln'
    GROUP BY karyawan.id_karyawan";
     $sql = mysqli_query($link,$query);
    if(mysqli_num_rows($sql)){
    	while ($data = mysqli_fetch_array($sql)) {
    		$jml_terlambat[] = $data;
    	}
    	return $jml_terlambat;
    }else{
    	$jml_terlambat[] = 0;
    	return $jml_terlambat;
    }

}
?>