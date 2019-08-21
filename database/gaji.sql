-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2019 pada 02.32
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `gen_id` (`i_param` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET latin1 BEGIN
	declare v_temp1 varchar(20);
	declare v_temp2 bigint;
	select header, auto_inc into v_temp1, v_temp2 from generator where param=i_param;
	if v_temp1 is null then
		set v_temp1 = '';
	end if;
	update generator set auto_inc=auto_inc+1 where param=i_param;
	RETURN concat(v_temp1,repeat('0',5-length(v_temp2)),v_temp2);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_berkas`
--

CREATE TABLE `absensi_berkas` (
  `id_surat` int(11) NOT NULL,
  `id_absensi` varchar(20) NOT NULL,
  `nama_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_berkas`
--

INSERT INTO `absensi_berkas` (`id_surat`, `id_absensi`, `nama_surat`) VALUES
(1, 'AB00038', 'Surat-Keterangan-Dokter.jpg'),
(2, 'AB00106', '_.png'),
(3, 'AB00109', 'KR00045_2019-07-08.png'),
(4, 'AB00111', 'KR00029_2019-07-05.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_pegawai`
--

CREATE TABLE `absensi_pegawai` (
  `id_absensi` varchar(20) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam_masuk_1` time NOT NULL,
  `jam_keluar_1` time NOT NULL,
  `jam_masuk_2` time NOT NULL,
  `jam_keluar_2` time NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_pegawai`
--

INSERT INTO `absensi_pegawai` (`id_absensi`, `id_karyawan`, `tgl_absen`, `jam_masuk_1`, `jam_keluar_1`, `jam_masuk_2`, `jam_keluar_2`, `keterangan`) VALUES
('AB00016', 'KR00001', '2019-02-13', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'CUTI'),
('AB00021', 'KR00014', '2019-02-18', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'SAKIT'),
('AB00030', 'KR00003', '2019-02-22', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'ALPHA'),
('AB00038', 'KR00002', '2019-02-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'SAKIT'),
('AB00042', 'KR00014', '2019-01-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'ALPHA'),
('AB00092', 'KR00045', '2019-06-26', '08:10:00', '00:00:00', '00:00:00', '00:00:00', 'HADIR'),
('AB00097', 'KR00045', '2019-06-29', '07:56:00', '12:02:00', '13:02:00', '16:02:00', 'HADIR'),
('AB00098', 'KR00045', '2019-07-01', '13:02:00', '00:00:00', '00:00:00', '20:57:46', 'HADIR'),
('AB00101', 'KR00092', '2019-07-01', '08:02:00', '12:02:00', '15:02:00', '20:58:02', 'HADIR'),
('AB00102', 'KR00092', '2019-07-02', '08:00:31', '10:27:00', '00:00:00', '00:00:00', 'HADIR'),
('AB00103', 'KR00045', '2019-07-03', '10:55:57', '12:02:00', '13:02:00', '16:02:00', 'HADIR'),
('AB00106', 'KR00045', '2019-07-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'CUTI'),
('AB00109', 'KR00045', '2019-07-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'CUTI'),
('AB00111', 'KR00029', '2019-07-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'SAKIT'),
('AB00113', 'KR00029', '2019-07-09', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'ALPHA'),
('AB00115', 'KR00092', '2019-07-10', '08:02:00', '12:00:00', '13:00:00', '20:19:08', 'HADIR'),
('AB00116', 'KR00045', '2019-07-10', '08:02:00', '12:00:00', '13:00:00', '20:19:12', 'HADIR'),
('AB00117', 'KR00029', '2019-07-11', '09:32:21', '12:00:00', '13:00:00', '18:02:38', 'HADIR'),
('AB00118', 'KR00014', '2019-07-11', '09:32:23', '12:00:00', '13:00:00', '18:02:41', 'HADIR'),
('AB00119', 'KR00003', '2019-07-11', '09:32:25', '12:00:00', '13:00:00', '18:02:43', 'HADIR'),
('AB00120', 'KR00002', '2019-07-11', '09:32:27', '12:00:00', '13:00:00', '18:02:45', 'HADIR'),
('AB00121', 'KR00001', '2019-07-11', '09:32:29', '12:00:00', '13:00:00', '18:02:48', 'HADIR'),
('AB00122', 'KR00096', '2019-07-11', '09:32:31', '12:00:00', '13:00:00', '18:02:50', 'HADIR'),
('AB00123', 'KR00045', '2019-07-11', '09:32:33', '12:00:00', '13:00:00', '18:02:51', 'HADIR'),
('AB00141', 'KR00096', '2019-07-12', '08:30:00', '00:00:00', '00:00:00', '16:39:52', 'HADIR'),
('AB00142', 'KR00014', '2019-07-12', '08:30:00', '00:00:00', '00:00:00', '16:40:36', 'HADIR'),
('AB00143', 'KR00001', '2019-07-14', '10:52:42', '00:00:00', '00:00:00', '00:00:00', 'HADIR'),
('AB00144', 'KR00096', '2019-07-15', '07:32:00', '00:00:00', '00:00:00', '00:00:00', 'HADIR'),
('AB00145', 'KR00014', '2019-07-15', '07:32:03', '00:00:00', '00:00:00', '00:00:00', 'HADIR'),
('AB00146', 'KR00045', '2019-07-15', '07:32:08', '00:00:00', '00:00:00', '00:00:00', 'HADIR'),
('AB00147', 'KR00001', '2019-07-16', '08:02:16', '00:00:00', '00:00:00', '00:00:00', 'HADIR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asuransi`
--

CREATE TABLE `asuransi` (
  `id_asuransi` varchar(20) NOT NULL,
  `nama_asuransi` varchar(50) NOT NULL,
  `jumlah_asuransi` varchar(50) NOT NULL,
  `id_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asuransi`
--

INSERT INTO `asuransi` (`id_asuransi`, `nama_asuransi`, `jumlah_asuransi`, `id_status`) VALUES
('A00034', 'BPJS', '400000', 'S00001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit_koperasi`
--

CREATE TABLE `deposit_koperasi` (
  `id_deposit` varchar(20) NOT NULL,
  `nama_deposit` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deposit_koperasi`
--

INSERT INTO `deposit_koperasi` (`id_deposit`, `nama_deposit`, `jumlah`) VALUES
('DP00005', 'Deposit Anggota Koperasi', '25000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_lembur_pegawai`
--

CREATE TABLE `gaji_lembur_pegawai` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_master_lembur` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji_lembur_pegawai`
--

INSERT INTO `gaji_lembur_pegawai` (`id_transaksi`, `id_pegawai`, `id_master_lembur`, `jumlah`, `bulan`) VALUES
('GL00041', 'KR00001', 'LB00025', '8000', 'February 2019'),
('GL00044', 'KR00001', 'LB00025', '8000', 'February 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_master_gaji` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji_pegawai`
--

INSERT INTO `gaji_pegawai` (`id_transaksi`, `id_pegawai`, `id_master_gaji`, `jumlah`, `bulan`) VALUES
('G00326', 'KR00001', 'GP00176', '2500000', 'February 2019'),
('G00327', 'KR00002', 'GP00178', '2500000', 'February 2019'),
('G00328', 'KR00003', 'GP00180', '1000000', 'February 2019'),
('G00334', 'KR00001', 'GP00176', '2500000', 'April 2019'),
('G00335', 'KR00002', 'GP00178', '2500000', 'April 2019'),
('G00336', 'KR00003', 'GP00180', '500000', 'April 2019'),
('G00337', 'KR00014', 'GP00182', '3000000', 'April 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `generator`
--

CREATE TABLE `generator` (
  `param` varchar(50) NOT NULL,
  `header` varchar(5) NOT NULL,
  `auto_inc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `generator`
--

INSERT INTO `generator` (`param`, `header`, `auto_inc`) VALUES
('id_absensi', 'AB', 148),
('ID_ASURANSI', 'A', 39),
('id_bagian', 'B', 12),
('id_bulan', 'BL', 14),
('id_deposit', 'DP', 7),
('ID_DINAS', 'D', 168),
('ID_GAJI', 'G', 378),
('id_gaji_lembur', 'GL', 73),
('ID_G_POKOK', 'GP', 204),
('id_jabatan', 'J', 9),
('ID_JADWAL', 'JD', 8),
('id_jjk', 'JJK', 17),
('id_kerja', 'RB', 225),
('ID_LEMBUR', 'L', 56),
('ID_PAJAK', 'PJ', 31),
('id_pegawai', 'KR', 100),
('id_pend', 'PD', 20),
('ID_POTONGAN', 'P', 36),
('id_potongan_pg', 'PT', 377),
('id_soal', 'BS', 26),
('id_status', 'S', 65),
('ID_TNJNGN', 'TJ', 151),
('id_tunjangan', 'T', 454),
('id_user', 'US', 20),
('ID_UTANG_PG', 'PU', 114),
('lembur_master', 'LB', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_pegawai`
--

CREATE TABLE `jabatan_pegawai` (
  `id_jabatan` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan_pegawai`
--

INSERT INTO `jabatan_pegawai` (`id_jabatan`, `nama_jabatan`) VALUES
('J001', 'Direktur Utama'),
('J002', 'Kepala Bagian'),
('J003', 'Staff bagian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `batas_terlambat` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam_datang`, `jam_keluar`, `jam_masuk`, `jam_pulang`, `batas_terlambat`) VALUES
('JD00001', '07:00:00', '12:00:00', '13:00:00', '16:00:00', '08:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_karir`
--

CREATE TABLE `jenjang_karir` (
  `id_jjk` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang_karir`
--

INSERT INTO `jenjang_karir` (`id_jjk`, `id_pegawai`, `tanggal`, `Keterangan`) VALUES
('JJK00005', 'KR00092', '2019-06-24', 'Status Pegawai diubah ke :  Pegawai Kontrak '),
('JJK00006', 'KR00092', '2019-06-24', 'Status Pegawai diubah ke :  Pegawai Tetap'),
('JJK00007', 'KR00092', '2019-06-24', 'Status Pegawai diubah ke :  Pegawai Kontrak '),
('JJK00008', 'KR00092', '2019-06-24', 'Status Pegawai diubah ke :  SMP/SD'),
('JJK00009', 'KR00092', '2019-06-24', 'Pendidikan Terakhir Pegawai diubah ke :  D1/D2/D3'),
('JJK00010', 'KR00092', '2019-06-24', 'Divisi Pegawai diubah ke :  Keuangan'),
('JJK00011', 'KR00092', '2019-06-24', 'Jabatan Pegawai diubah ke :  Kepala Bagian'),
('JJK00012', 'KR00092', '2019-06-24', 'Jabatan Pegawai diubah ke :  Staff bagian'),
('JJK00013', 'KR00092', '2019-06-24', 'Jabatan Pegawai diubah ke :  Kepala Bagian'),
('JJK00014', 'KR00092', '2019-06-24', 'Telah Mengundurkan Diri '),
('JJK00015', 'KR00092', '2019-07-10', 'Telah Mengundurkan Diri '),
('JJK00016', 'KR00096', '2019-07-10', 'Status Pegawai adalah :  Pegawai Trainee Pendidikan terakhir adalah :  S1/D4 Jabatan adalah :  Staff bagian Divisi adalah :  Keuangan'),
('KR00093', 'KR00092', '2019-06-23', 'Status Pegawai adalah :  Pegawai Trainee Pendidikan terakhir adalah :  S1/D4 Jabatan adalah :  Staff bagian Divisi adalah :  HRD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nip` varchar(200) DEFAULT NULL,
  `nama_karyawan` varchar(200) DEFAULT NULL,
  `jk_karyawan` varchar(200) DEFAULT NULL,
  `tmpt_lahir` varchar(200) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(200) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telpn` varchar(200) DEFAULT NULL,
  `pend_terakhir` varchar(200) DEFAULT NULL,
  `id_jabatan` varchar(20) DEFAULT NULL,
  `id_bagian` varchar(20) DEFAULT NULL,
  `id_status` varchar(20) NOT NULL,
  `no_npwp` varchar(20) NOT NULL,
  `anggota_koperasi` char(1) NOT NULL COMMENT '1 = anggota, 0 = bukan',
  `status_pernikahan` char(1) NOT NULL,
  `jml_anak` char(1) NOT NULL,
  `foto_pegawai` varchar(50) NOT NULL,
  `id_rfid` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nip`, `nama_karyawan`, `jk_karyawan`, `tmpt_lahir`, `tgl_lahir`, `agama`, `tgl_masuk`, `alamat`, `no_telpn`, `pend_terakhir`, `id_jabatan`, `id_bagian`, `id_status`, `no_npwp`, `anggota_koperasi`, `status_pernikahan`, `jml_anak`, `foto_pegawai`, `id_rfid`, `status`) VALUES
('KR00001', '914111034', 'Restu Aji Kurniawan', 'L', 'Banyuwangi', '1998-01-01', 'Islam', '2019-01-23', 'Jl Ikan Nus 1 Kota Malang', '082337445687', 'PD00003', 'J002', 'B00001', 'S00001', '000.000.000.00', '1', '1', '2', 'KR00001_2019-07-08.png', '0011599490', '1'),
('KR00002', '143140', 'Ihsa ', 'L', 'kediri', '2019-02-04', '-', '2019-02-02', 'malang', '081', 'PD00002', 'J003', 'B00002', 'S00001', '0', '1', '1', '0', 'KR00002.png', '0007046399', '1'),
('KR00003', '192168', 'Hening', 'L', '-', '2019-02-02', '-', '2019-02-02', '-', '-', 'PD00004', 'J003', 'B00002', 'S00002', '0', '0', '1', '0', 'KR00003.png', '0007455275', '1'),
('KR00014', '140914111000', 'Dita', 'L', 'batu', '1996-02-05', 'Islam', '2019-01-01', 'Batu', '081', 'PD00002', 'J003', 'B00005', 'S00001', '0', '1', '1', '0', 'KR00014.png', '0007236934', '1'),
('KR00029', '00088000', 'kevin', 'L', 'Banyuwangi', '1991-01-01', 'Islam', '2019-06-22', 'Banyuwangi', '0852', 'PD00002', 'J003', 'B00002', 'S00002', '00090909099', '0', '0', '0', 'KR00029_2019-07-08.png', '0007420136', '1'),
('KR00045', '12345678', 'Dila', 'L', 'Blitar', '2019-06-01', 'Islam', '2019-06-01', 'Sidoarjo', '08529090', 'PD00002', 'J003', 'B00005', 'S00002', '000000000', '0', '1', '0', 'KR00045.png', '0011586700', '1'),
('KR00092', '12345678', 'kevin R', 'L', 'Blitar', '2019-06-23', 'Islam', '2019-06-26', 'Sidoarjo', '08529090', 'PD00003', 'J002', 'B00001', 'S00002', '000000000', '0', '1', '0', 'KR00092.jpg', '', '0'),
('KR00096', '1111111111', 'Restu', 'L', 'Banyuwangi', '1998-01-22', 'Islam', '2019-07-01', 'Jl Sumbersari Kota Malang Jawa Timur', '082337445687', 'PD00002', 'J003', 'B00001', 'S00002', '000000000', '1', '1', '0', 'KR00096.png', '0011600011', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur_pegawai`
--

CREATE TABLE `lembur_pegawai` (
  `id_lembur` varchar(20) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `acc` char(1) NOT NULL DEFAULT '0' COMMENT '1 = setuju , 0 = belum setuju',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lembur_pegawai`
--

INSERT INTO `lembur_pegawai` (`id_lembur`, `tgl_lembur`, `bulan`, `id_pegawai`, `jam_mulai`, `jam_selesai`, `acc`, `keterangan`) VALUES
('L00031', '2019-01-25', '022019', 'KR00001', '17:00:00', '18:00:00', '1', ''),
('L00035', '2019-01-24', '022019', 'KR00001', '17:00:00', '18:00:00', '1', ''),
('L00046', '2019-02-20', '022019', 'KR00002', '17:01:00', '22:00:00', '1', 'Lembur Laporan pendapatan Jamaah'),
('L00050', '2019-07-01', '072019', 'KR00092', '17:00:00', '20:00:00', '1', 'lembur jamaah'),
('L00052', '2019-07-09', '072019', 'KR00096', '17:00:00', '20:00:00', '1', 'lembur data jamaah periode 2'),
('L00054', '2019-07-14', '072019', 'KR00002', '00:00:00', '00:00:00', '0', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_login`
--

CREATE TABLE `log_login` (
  `tanggal_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(20) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `user_server` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_login`
--

INSERT INTO `log_login` (`tanggal_in`, `user`, `ip`, `user_server`, `keterangan`) VALUES
('2019-01-14 05:52:23', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-14 05:52:27', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-18 05:47:34', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-18 05:47:43', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-18 05:52:18', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-18 07:39:56', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-19 04:32:55', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-23 03:44:10', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-23 04:37:36', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-24 15:47:17', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-26 04:03:42', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-26 04:04:19', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-26 04:06:23', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-26 04:15:57', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-26 04:29:38', '1', '::1', 'user', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00101,Uang Makan,300000,S003)'),
('2019-01-27 03:53:24', '1', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00103,Uang Makan,3000000,S001)'),
('2019-01-27 03:54:19', '1', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00106,Gaji Lembubr,300000,S001)'),
('2019-01-28 06:58:48', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-01-28 06:59:20', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-28 10:33:16', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-28 12:12:26', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-29 08:39:48', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-01-30 14:15:32', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-03 14:31:03', '1', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-03 14:32:31', '1', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-03 14:34:49', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-06 03:45:36', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-06 03:45:44', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-06 03:48:07', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00108,Gaji Trainee,300000,S002)'),
('2019-02-07 11:16:14', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-07 11:16:34', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-08 04:59:41', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-08 05:02:19', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00110,Gaji magang,100000,S004)'),
('2019-02-12 02:34:51', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00133,Gaji Pokok,2500000,S001)'),
('2019-02-12 02:38:55', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00135,Gaji Pokok,3000000,S001)'),
('2019-02-12 03:12:26', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00138,Gaji Pokok,4000000,S001)'),
('2019-02-12 03:18:08', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00141,Gaji Pokok,1000000,S002)'),
('2019-02-12 03:37:47', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00144,Gaji Pembimbing manasik,300000,S003)'),
('2019-02-12 03:39:10', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00146,Gaji Pokok,2000000,S001)'),
('2019-02-12 03:39:46', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00148,Gaji Pokok,3000000,S001)'),
('2019-02-12 03:40:36', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00150,Gaji Pokok,1500000,S001)'),
('2019-02-12 03:41:26', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00152,Gaji Pokok,2000000,S001)'),
('2019-02-12 03:46:02', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00156,Gaji Pokok,1000000,S002)'),
('2019-02-12 03:46:44', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00158,Gaji Pokok,1000000,S002)'),
('2019-02-12 03:47:25', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00160,Gaji Pokok,1000000,S002)'),
('2019-02-12 03:48:14', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00162,Gaji Pokok,700000,S002)'),
('2019-02-12 03:50:32', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00164,Gaji Pokok,100000,S004)'),
('2019-02-13 01:12:25', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-14 13:59:41', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-15 04:13:59', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00170,,3000000,PD00002)'),
('2019-02-15 04:15:18', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00172,,3000000,S001)'),
('2019-02-15 04:17:02', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00174,Gaji Pokok,3000000,S001)'),
('2019-02-15 04:17:33', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00176,Gaji Pokok,2500000,S001)'),
('2019-02-15 04:21:05', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00178,Gaji Pokok,2500000,S001)'),
('2019-02-15 04:21:38', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00180,Gaji Pokok,1000000,S002)'),
('2019-02-19 13:19:17', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-19 13:46:50', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-19 13:54:04', '', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 08:58:11', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 11:14:00', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 12:20:32', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:06:04', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:06:28', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:06:35', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:07:28', 'KR00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:08:09', 'KR00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:08:19', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:18:34', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:18:41', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:19:15', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:19:24', 'KR00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:23:13', 'KR00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:23:23', 'KR00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:31:32', 'KR00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:31:39', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:32:19', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:32:26', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:32:35', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:32:42', 'KR00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:33:47', 'KR00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:33:55', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:37:21', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:37:28', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 13:52:00', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 13:52:07', 'KR00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 14:11:45', 'KR00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 14:11:54', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 14:13:59', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 14:14:09', 'KR002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 14:17:46', 'KR002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 14:17:54', 'KR002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-20 14:22:12', 'KR002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-20 14:22:19', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-23 04:12:00', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-23 04:12:06', 'KR00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-23 04:12:26', 'KR00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-02-23 04:12:42', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-02-24 04:10:33', 'KR001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00182,Gaji Pokok,3000000,S001)'),
('2019-03-06 09:26:27', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-03-07 05:18:14', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-03-07 05:18:40', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-03-07 05:36:45', 'KR001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-03-07 05:36:54', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-03-10 11:21:12', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-03-11 02:32:40', 'KR001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-04-29 12:00:33', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-04-30 03:44:24', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-04-30 03:49:25', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-04-30 04:10:45', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-02 13:29:30', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-02 13:37:09', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-02 13:37:51', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-02 13:38:10', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-02 13:38:17', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-02 13:38:27', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-02 13:38:34', 'kr002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-02 13:39:04', 'kr002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-02 13:39:10', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-25 05:52:53', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-30 00:55:07', 'Restu', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-30 00:56:20', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-30 01:58:31', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-30 01:58:41', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-05-30 03:20:33', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-05-30 03:20:49', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-14 09:54:17', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-16 13:26:50', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-17 04:20:56', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-20 01:53:43', 'kr001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-20 02:22:55', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00189,0011599490,,)'),
('2019-06-20 02:23:04', 'kr001', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00191,0011599490,,)'),
('2019-06-21 13:08:12', 'kr001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-21 13:08:20', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-21 13:40:17', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-21 13:40:24', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-22 08:50:47', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-22 14:50:07', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-22 14:50:15', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-23 03:54:35', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-23 03:54:44', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-23 09:09:52', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-24 09:03:28', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-24 11:27:12', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-24 11:27:46', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-24 12:32:28', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-24 12:32:42', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-24 13:46:44', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-24 13:46:51', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-24 13:52:33', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-24 13:52:44', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-25 01:09:03', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-25 01:13:02', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-25 01:13:08', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-25 01:15:18', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-25 01:15:25', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-25 02:05:37', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-25 02:05:44', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-26 00:50:48', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-26 00:50:56', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-26 01:53:53', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-26 01:54:00', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-26 01:54:00', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-26 02:02:41', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-26 02:02:48', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-26 02:02:52', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-06-26 02:02:59', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-06-26 03:17:42', '', '', '', '0'),
('2019-06-26 03:17:42', '', '', '', '00'),
('2019-06-26 03:17:42', '', '', '', '001'),
('2019-06-26 03:17:42', '', '', '', '00115'),
('2019-06-26 03:17:42', '', '', '', '001158'),
('2019-06-26 03:17:42', '', '', '', '0011'),
('2019-06-26 03:17:42', '', '', '', '0011586'),
('2019-06-26 03:17:42', '', '', '', '00115867'),
('2019-06-26 03:17:43', '', '', '', '001158670'),
('2019-06-26 03:17:43', '', '', '', '0011586700'),
('2019-06-26 03:17:43', '', '', '', '0011586700'),
('2019-07-01 13:41:59', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-01 14:06:29', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-01 14:06:37', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-01 14:12:01', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-01 14:12:08', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-02 03:07:31', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-02 12:20:49', '', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-02 12:20:59', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-03 03:54:30', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-03 03:54:52', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-03 03:59:24', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-03 03:59:32', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-03 04:01:32', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-03 04:01:40', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-03 04:02:19', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 02:48:38', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-08 05:17:12', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 05:59:22', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-08 08:40:15', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 08:40:23', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-08 09:08:34', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 09:08:49', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-08 09:35:07', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 12:06:28', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-08 12:08:36', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 12:08:43', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-08 12:11:53', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-08 12:12:00', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-10 12:31:40', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-10 13:02:26', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-10 13:02:37', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-10 13:15:15', 'kr00014', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00194,Gaji Trainee,100000,S00002)'),
('2019-07-11 02:05:19', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-11 02:05:30', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-11 02:34:21', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-11 02:34:30', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-11 11:06:48', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 01:01:13', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 01:07:49', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 01:08:02', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 01:09:42', 'kr00014', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00196,Gaji Trainee,100000,S00002)'),
('2019-07-12 01:10:11', 'kr00014', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00198,Gaji Trainee,100000,S00002)'),
('2019-07-12 01:11:16', 'kr00014', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00200,Gaji Pokok,500000,S00003)'),
('2019-07-12 01:14:46', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 01:14:53', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 01:17:13', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 01:17:49', 'kr00014', '::1', 'root@localhost', 'INSERT INTO master_gaji_pokok(id_master_gaji, nama_gaji, jml_gaji_pokok,id_status) VALUES (GP00202,Gaji Trainee,100000,S00002)'),
('2019-07-20 03:12:16', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-20 03:12:23', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 03:50:07', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 06:27:39', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 06:31:20', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 06:31:28', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 06:32:40', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 06:32:48', 'kr00002', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 06:38:57', 'kr00002', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 06:39:43', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-12 10:06:36', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-12 10:06:44', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-14 01:54:36', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-14 06:19:48', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-14 06:19:53', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-14 06:20:02', 'kr00014', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-14 06:20:07', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-14 06:20:32', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-14 06:20:37', 'kr00014', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-15 00:31:31', 'kr00001', '::1', 'root@localhost', 'Melakukan Login'),
('2019-07-15 00:32:32', 'kr00001', '::1', 'root@localhost', 'Melakukan Logout'),
('2019-07-15 00:32:38', 'kr00014', '::1', 'root@localhost', 'Melakukan Login');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bagian`
--

CREATE TABLE `master_bagian` (
  `id_bagian` varchar(20) NOT NULL,
  `nama_bagian` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_bagian`
--

INSERT INTO `master_bagian` (`id_bagian`, `nama_bagian`) VALUES
('B00001', 'Keuangan'),
('B00002', 'Front Office'),
('B00003', 'Direktur'),
('B00004', 'Perlengkapan'),
('B00005', 'HRD'),
('B00006', 'OB'),
('B00007', 'Pendamping Umroh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_gaji_pokok`
--

CREATE TABLE `master_gaji_pokok` (
  `id_master_gaji` varchar(20) NOT NULL,
  `nama_gaji` varchar(50) NOT NULL,
  `jml_gaji_pokok` varchar(50) NOT NULL,
  `id_status` varchar(20) NOT NULL,
  `id_bagian` varchar(20) NOT NULL,
  `pend_terakhir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_gaji_pokok`
--

INSERT INTO `master_gaji_pokok` (`id_master_gaji`, `nama_gaji`, `jml_gaji_pokok`, `id_status`, `id_bagian`, `pend_terakhir`) VALUES
('GP00174', 'Gaji Pokok', '3000000', 'S00001', 'B00001', 'PD00002'),
('GP00176', 'Gaji Pokok', '2500000', 'S00001', 'B00001', 'PD00003'),
('GP00178', 'Gaji Pokok', '2500000', 'S00001', 'B00002', 'PD00002'),
('GP00180', 'Gaji Trainee', '50000', 'S00002', 'B00002', 'PD00004'),
('GP00182', 'Gaji Pokok', '3000000', 'S00001', 'B00005', 'PD00002'),
('GP00194', 'Gaji Trainee', '100000', 'S00002', 'B00001', 'PD00002'),
('GP00196', 'Gaji Trainee', '100000', 'S00002', 'B00001', 'PD00002'),
('GP00198', 'Gaji Trainee', '100000', 'S00002', 'B00005', 'PD00002'),
('GP00200', 'Gaji Pokok', '500000', 'S00003', 'B00002', 'PD00004'),
('GP00202', 'Gaji Trainee', '100000', 'S00002', 'B00002', 'PD00002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_lembur`
--

CREATE TABLE `master_lembur` (
  `id_master_lembur` varchar(20) NOT NULL,
  `nama_lembur` varchar(50) NOT NULL,
  `gaji_lembur` varchar(20) NOT NULL,
  `id_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_lembur`
--

INSERT INTO `master_lembur` (`id_master_lembur`, `nama_lembur`, `gaji_lembur`, `id_status`) VALUES
('LB00025', 'gaji lembur', '8000', 'S00001'),
('LB00027', 'Gaji lbr', '1000', 'S00003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pendidikan`
--

CREATE TABLE `master_pendidikan` (
  `id_pend` varchar(20) NOT NULL,
  `nama_pend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pendidikan`
--

INSERT INTO `master_pendidikan` (`id_pend`, `nama_pend`) VALUES
('PD00001', 'S2/S3'),
('PD00002', 'S1/D4'),
('PD00003', 'D1/D2/D3'),
('PD00004', 'SMA/SMK'),
('PD00005', 'SMP/SD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_potongan`
--

CREATE TABLE `master_potongan` (
  `id_potongan` varchar(50) NOT NULL,
  `nama_potongan` varchar(50) NOT NULL,
  `jumlah_potongan` varchar(50) NOT NULL,
  `id_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_potongan`
--

INSERT INTO `master_potongan` (`id_potongan`, `nama_potongan`, `jumlah_potongan`, `id_status`) VALUES
('P00022', 'Terlambat ', '5000', '1'),
('P00034', 'Izin Tanpa Keterangan', '100000', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_status`
--

CREATE TABLE `master_status` (
  `id_status` varchar(20) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_status`
--

INSERT INTO `master_status` (`id_status`, `nama_status`) VALUES
('S00001', 'Pegawai Tetap'),
('S00002', 'Pegawai Trainee'),
('S00003', 'Pegawai Kontrak '),
('S00004', 'Pegawai Magang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tunjangan`
--

CREATE TABLE `master_tunjangan` (
  `id_tunjangan` varchar(20) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `jumlah_tunjangan` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0' COMMENT '0  = tnjngn fleksibel, 1 = tnjngn tetap',
  `id_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_tunjangan`
--

INSERT INTO `master_tunjangan` (`id_tunjangan`, `nama_tunjangan`, `jumlah_tunjangan`, `status`, `id_jabatan`) VALUES
('TJ00124', 'Tunjangan Jabatan Kepala Bagian', '10', '1', 'J002'),
('TJ00129', 'Tunjangan Jabatan Direktur utama', '10', '1', 'J001'),
('TJ00131', 'Tunjangan Istri Direktur Utama', '5', '2', 'J001'),
('TJ00133', 'Tunjangan Istri Kepala Bagian', '5', '2', 'J002'),
('TJ00135', 'Tunjangan Istri Staff ', '5', '2', 'J003'),
('TJ00137', 'Tunjangan anak 1 ', '3', '3', 'J001'),
('TJ00139', 'Tunjangan anak 2', '5', '4', 'J001'),
('TJ00141', 'Tunjangan anak 1', '3', '3', 'J002'),
('TJ00143', 'Tunjangan anak 2', '5', '4', 'J002'),
('TJ00146', 'Tunjangan anak 1', '3', '3', 'J003'),
('TJ00148', 'Tunjangan anak 2', '5', '4', 'J003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan_dinas`
--

CREATE TABLE `perjalanan_dinas` (
  `id_dinas` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `jumlah_pengeluaran` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `status` char(1) NOT NULL COMMENT '1 = sudah , 0 = belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id_dinas`, `id_pegawai`, `keterangan`, `tgl_berangkat`, `tgl_pulang`, `jumlah_pengeluaran`, `bulan`, `status`) VALUES
('D00164', 'KR00092', 'umroh', '2019-07-02', '2019-07-02', '100000', 'July 2019', '1'),
('D00166', 'KR00045', 'mengurus manasik', '2019-07-02', '2019-07-03', '300000', 'July 2019', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan_dinas_berkas`
--

CREATE TABLE `perjalanan_dinas_berkas` (
  `id_dinas` varchar(20) NOT NULL,
  `nama_berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perjalanan_dinas_berkas`
--

INSERT INTO `perjalanan_dinas_berkas` (`id_dinas`, `nama_berkas`) VALUES
('D00144', 'Surat-Keterangan-Dokter.jpg'),
('D00146', 'Surat Tugas Dinas Yang Benar.png'),
('D00148', 'arrosyid.jpg'),
('D00151', '8c64c4b9-4e1c-4c26-9b5e-78d85e3130a9.png'),
('D00154', 'KR00092_2019-07-01.png'),
('D00164', 'KR00092_2019-07-02.png'),
('D00166', 'KR00045_2019-07-02.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang_pegawai`
--

CREATE TABLE `piutang_pegawai` (
  `id_piutang` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `j_pinjaman` varchar(50) NOT NULL,
  `j_cicilan` varchar(50) NOT NULL,
  `keterangan` varchar(65) NOT NULL,
  `acc` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `piutang_pegawai`
--

INSERT INTO `piutang_pegawai` (`id_piutang`, `id_pegawai`, `tanggal`, `j_pinjaman`, `j_cicilan`, `keterangan`, `acc`) VALUES
('PU00092', 'KR00001', '2019-02-01', '2000000', '20', 'kebutuhan darurat', '1'),
('PU00096', 'KR00002', '2019-02-11', '5000000', '10', 'kebutuhan darurat', '1'),
('PU00110', 'KR00092', '2019-07-04', '500000', '5', 'pinjam untuk beli beli', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_bpjs`
--

CREATE TABLE `potongan_bpjs` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_potongan` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan_bpjs`
--

INSERT INTO `potongan_bpjs` (`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES
('PT00067', 'KR00001', 'A00034', '80000', 'February 2019'),
('PT00068', 'KR00002', 'A00034', '80000', 'February 2019'),
('PT00083', 'KR00001', 'A00034', '80000', 'April 2019'),
('PT00084', 'KR00002', 'A00034', '80000', 'April 2019'),
('PT00085', 'KR00014', 'A00034', '80000', 'April 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_koperasi`
--

CREATE TABLE `potongan_koperasi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_potongan` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan_koperasi`
--

INSERT INTO `potongan_koperasi` (`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES
('PT00069', 'KR00001', 'DP00005', '25000', 'February 2019'),
('PT00070', 'KR00002', 'DP00005', '25000', 'February 2019'),
('PT00086', 'KR00001', 'DP00005', '25000', 'April 2019'),
('PT00087', 'KR00002', 'DP00005', '25000', 'April 2019'),
('PT00088', 'KR00014', 'DP00005', '25000', 'April 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_pegawai`
--

CREATE TABLE `potongan_pegawai` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_potongan` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan_pegawai`
--

INSERT INTO `potongan_pegawai` (`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES
('PT00066', 'KR00001', 'P00022', '1000', 'February 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_piutang`
--

CREATE TABLE `potongan_piutang` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_potongan` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan_piutang`
--

INSERT INTO `potongan_piutang` (`id_transaksi`, `id_pegawai`, `id_potongan`, `jumlah`, `bulan`) VALUES
('PT00071', 'KR00001', 'PU00092', '100000', 'February 2019'),
('PT00072', 'KR00002', 'PU00096', '500000', 'February 2019'),
('PT00089', 'KR00001', 'PU00092', '100000', 'April 2019'),
('PT00090', 'KR00002', 'PU00096', '500000', 'April 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_alpha`
--

CREATE TABLE `rekap_alpha` (
  `id_rekap` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `jml_alpha` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_alpha`
--

INSERT INTO `rekap_alpha` (`id_rekap`, `id_pegawai`, `jml_alpha`, `bulan`) VALUES
('RB00224', 'KR00029', 1, 'July 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_cuti`
--

CREATE TABLE `rekap_cuti` (
  `id_rekap` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `jml_cuti` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_cuti`
--

INSERT INTO `rekap_cuti` (`id_rekap`, `id_pegawai`, `jml_cuti`, `bulan`) VALUES
('RB00021', 'KR00001', 1, 'February 2019'),
('RB00221', 'KR00045', 2, 'July 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_kerja`
--

CREATE TABLE `rekap_kerja` (
  `id_rekap` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `jml_hadir` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_kerja`
--

INSERT INTO `rekap_kerja` (`id_rekap`, `id_pegawai`, `bulan`, `jml_hadir`) VALUES
('RB00000', 'KR00001', 'February 2019', '1'),
('RB00001', 'KR00001', 'February 2019', '1'),
('RB00003', 'KR00002', 'February 2019', '1'),
('RB00004', 'KR00002', 'February 2019', '1'),
('RB00005', 'KR00003', 'February 2019', '1'),
('RB00187', 'KR00001', 'July 2019', '1'),
('RB00188', 'KR00002', 'July 2019', '1'),
('RB00189', 'KR00003', 'July 2019', '1'),
('RB00190', 'KR00014', 'July 2019', '1'),
('RB00191', 'KR00029', 'July 2019', '1'),
('RB00192', 'KR00045', 'July 2019', '1'),
('RB00193', 'KR00045', 'July 2019', '1'),
('RB00194', 'KR00045', 'July 2019', '1'),
('RB00195', 'KR00045', 'July 2019', '1'),
('RB00196', 'KR00045', 'July 2019', '1'),
('RB00197', 'KR00045', 'July 2019', '1'),
('RB00198', 'KR00092', 'July 2019', '1'),
('RB00199', 'KR00092', 'July 2019', '1'),
('RB00200', 'KR00092', 'July 2019', '1'),
('RB00201', 'KR00096', 'July 2019', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_sakit`
--

CREATE TABLE `rekap_sakit` (
  `id_rekap` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `jml_sakit` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_sakit`
--

INSERT INTO `rekap_sakit` (`id_rekap`, `id_pegawai`, `jml_sakit`, `bulan`) VALUES
('RB00018', 'KR00014', 1, 'February 2019'),
('RB00219', 'KR00029', 1, 'July 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_terlambat`
--

CREATE TABLE `rekap_terlambat` (
  `id_rekap` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `jml_terlambat` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_terlambat`
--

INSERT INTO `rekap_terlambat` (`id_rekap`, `id_pegawai`, `jml_terlambat`, `bulan`) VALUES
('RB00012', 'KR00001', 1, 'February 2019'),
('RB00015', 'KR00002', 1, 'February 2019'),
('RB00143', 'KR00045', 1, 'July 2019'),
('RB00166', 'KR00045', 1, 'July 2019'),
('RB00167', 'KR00092', 1, 'July 2019'),
('RB00169', 'KR00045', 1, 'July 2019'),
('RB00172', 'KR00029', 1, 'July 2019'),
('RB00173', 'KR00014', 1, 'July 2019'),
('RB00174', 'KR00003', 1, 'July 2019'),
('RB00175', 'KR00002', 1, 'July 2019'),
('RB00176', 'KR00001', 1, 'July 2019'),
('RB00177', 'KR00096', 1, 'July 2019'),
('RB00178', 'KR00045', 1, 'July 2019'),
('RB00204', 'KR00045', 1, 'July 2019'),
('RB00205', 'KR00092', 1, 'July 2019'),
('RB00207', 'KR00045', 1, 'July 2019'),
('RB00210', 'KR00029', 1, 'July 2019'),
('RB00211', 'KR00014', 1, 'July 2019'),
('RB00212', 'KR00003', 1, 'July 2019'),
('RB00213', 'KR00002', 1, 'July 2019'),
('RB00214', 'KR00001', 1, 'July 2019'),
('RB00215', 'KR00096', 1, 'July 2019'),
('RB00216', 'KR00045', 1, 'July 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangan_pegawai`
--

CREATE TABLE `tunjangan_pegawai` (
  `id_tansaksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_tunjangan` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunjangan_pegawai`
--

INSERT INTO `tunjangan_pegawai` (`id_tansaksi`, `id_pegawai`, `id_tunjangan`, `jumlah`, `bulan`) VALUES
('T00314', 'KR00001', 'TJ00143', '150000', 'February 2019'),
('T00317', 'KR00001', 'TJ00133', '150000', 'February 2019'),
('T00319', 'KR00001', 'TJ00124', '300000', 'February 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `level`) VALUES
('KR00001', 'Restu', '$2y$10$iNQ9YhwO3Xt.0k1YybdQTuQxDlQOKPtT3GZOsdcOi5cILFihIQ8Iy', 'PERSONALIA'),
('KR00002', 'Keuangan', '$2y$10$iNQ9YhwO3Xt.0k1YybdQTuQxDlQOKPtT3GZOsdcOi5cILFihIQ8Iy', 'KEUANGAN'),
('KR00014', 'Dhita Ayu', '$2y$10$A3L.lij4T.pMc5/q67nrb.FS18Ux39Rx3pbZtmajUv3tK3ptF.dK6', 'HRD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_berkas`
--
ALTER TABLE `absensi_berkas`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_absensi` (`id_absensi`);

--
-- Indexes for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id_asuransi`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `deposit_koperasi`
--
ALTER TABLE `deposit_koperasi`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `gaji_lembur_pegawai`
--
ALTER TABLE `gaji_lembur_pegawai`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_master_lembur` (`id_master_lembur`);

--
-- Indexes for table `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_master_gaji` (`id_master_gaji`);

--
-- Indexes for table `generator`
--
ALTER TABLE `generator`
  ADD PRIMARY KEY (`param`);

--
-- Indexes for table `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenjang_karir`
--
ALTER TABLE `jenjang_karir`
  ADD PRIMARY KEY (`id_jjk`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `FK_karyawan_jabatan` (`id_jabatan`),
  ADD KEY `FK_karyawan_bagian` (`id_bagian`),
  ADD KEY `pend_terakhir` (`pend_terakhir`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `lembur_pegawai`
--
ALTER TABLE `lembur_pegawai`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `master_bagian`
--
ALTER TABLE `master_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `master_gaji_pokok`
--
ALTER TABLE `master_gaji_pokok`
  ADD PRIMARY KEY (`id_master_gaji`),
  ADD KEY `id_status` (`id_status`,`id_bagian`,`pend_terakhir`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `pend_terakhir` (`pend_terakhir`);

--
-- Indexes for table `master_lembur`
--
ALTER TABLE `master_lembur`
  ADD PRIMARY KEY (`id_master_lembur`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `master_potongan`
--
ALTER TABLE `master_potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indexes for table `master_status`
--
ALTER TABLE `master_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `master_tunjangan`
--
ALTER TABLE `master_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD PRIMARY KEY (`id_dinas`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `perjalanan_dinas_berkas`
--
ALTER TABLE `perjalanan_dinas_berkas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `piutang_pegawai`
--
ALTER TABLE `piutang_pegawai`
  ADD PRIMARY KEY (`id_piutang`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `potongan_bpjs`
--
ALTER TABLE `potongan_bpjs`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `potongan_koperasi`
--
ALTER TABLE `potongan_koperasi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_potongan`);

--
-- Indexes for table `potongan_pegawai`
--
ALTER TABLE `potongan_pegawai`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_potongan`),
  ADD KEY `id_potongan` (`id_potongan`);

--
-- Indexes for table `potongan_piutang`
--
ALTER TABLE `potongan_piutang`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_potongan`),
  ADD KEY `id_potongan` (`id_potongan`);

--
-- Indexes for table `rekap_alpha`
--
ALTER TABLE `rekap_alpha`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `rekap_cuti`
--
ALTER TABLE `rekap_cuti`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `rekap_kerja`
--
ALTER TABLE `rekap_kerja`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `rekap_sakit`
--
ALTER TABLE `rekap_sakit`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `rekap_terlambat`
--
ALTER TABLE `rekap_terlambat`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tunjangan_pegawai`
--
ALTER TABLE `tunjangan_pegawai`
  ADD PRIMARY KEY (`id_tansaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_tunjangan`),
  ADD KEY `id_tunjangan` (`id_tunjangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_berkas`
--
ALTER TABLE `absensi_berkas`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_berkas`
--
ALTER TABLE `absensi_berkas`
  ADD CONSTRAINT `absensi_berkas_ibfk_1` FOREIGN KEY (`id_absensi`) REFERENCES `absensi_pegawai` (`id_absensi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD CONSTRAINT `absensi_pegawai_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `asuransi`
--
ALTER TABLE `asuransi`
  ADD CONSTRAINT `asuransi_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `master_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `gaji_lembur_pegawai`
--
ALTER TABLE `gaji_lembur_pegawai`
  ADD CONSTRAINT `gaji_lembur_pegawai_ibfk_1` FOREIGN KEY (`id_master_lembur`) REFERENCES `master_lembur` (`id_master_lembur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gaji_lembur_pegawai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD CONSTRAINT `gaji_pegawai_ibfk_1` FOREIGN KEY (`id_master_gaji`) REFERENCES `master_gaji_pokok` (`id_master_gaji`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gaji_pegawai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jenjang_karir`
--
ALTER TABLE `jenjang_karir`
  ADD CONSTRAINT `jenjang_karir_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `master_bagian` (`id_bagian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan_pegawai` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `karyawan_ibfk_3` FOREIGN KEY (`pend_terakhir`) REFERENCES `master_pendidikan` (`id_pend`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `karyawan_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `master_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lembur_pegawai`
--
ALTER TABLE `lembur_pegawai`
  ADD CONSTRAINT `lembur_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `master_gaji_pokok`
--
ALTER TABLE `master_gaji_pokok`
  ADD CONSTRAINT `master_gaji_pokok_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `master_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `master_gaji_pokok_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `master_bagian` (`id_bagian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `master_gaji_pokok_ibfk_3` FOREIGN KEY (`pend_terakhir`) REFERENCES `master_pendidikan` (`id_pend`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `master_lembur`
--
ALTER TABLE `master_lembur`
  ADD CONSTRAINT `master_lembur_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `master_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `master_tunjangan`
--
ALTER TABLE `master_tunjangan`
  ADD CONSTRAINT `master_tunjangan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan_pegawai` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD CONSTRAINT `perjalanan_dinas_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `piutang_pegawai`
--
ALTER TABLE `piutang_pegawai`
  ADD CONSTRAINT `piutang_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `potongan_bpjs`
--
ALTER TABLE `potongan_bpjs`
  ADD CONSTRAINT `potongan_bpjs_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `potongan_koperasi`
--
ALTER TABLE `potongan_koperasi`
  ADD CONSTRAINT `potongan_koperasi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `potongan_pegawai`
--
ALTER TABLE `potongan_pegawai`
  ADD CONSTRAINT `potongan_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `potongan_pegawai_ibfk_2` FOREIGN KEY (`id_potongan`) REFERENCES `master_potongan` (`id_potongan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `potongan_piutang`
--
ALTER TABLE `potongan_piutang`
  ADD CONSTRAINT `potongan_piutang_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `potongan_piutang_ibfk_2` FOREIGN KEY (`id_potongan`) REFERENCES `piutang_pegawai` (`id_piutang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rekap_alpha`
--
ALTER TABLE `rekap_alpha`
  ADD CONSTRAINT `rekap_alpha_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rekap_cuti`
--
ALTER TABLE `rekap_cuti`
  ADD CONSTRAINT `rekap_cuti_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rekap_kerja`
--
ALTER TABLE `rekap_kerja`
  ADD CONSTRAINT `rekap_kerja_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rekap_sakit`
--
ALTER TABLE `rekap_sakit`
  ADD CONSTRAINT `rekap_sakit_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rekap_terlambat`
--
ALTER TABLE `rekap_terlambat`
  ADD CONSTRAINT `rekap_terlambat_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tunjangan_pegawai`
--
ALTER TABLE `tunjangan_pegawai`
  ADD CONSTRAINT `tunjangan_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tunjangan_pegawai_ibfk_2` FOREIGN KEY (`id_tunjangan`) REFERENCES `master_tunjangan` (`id_tunjangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
