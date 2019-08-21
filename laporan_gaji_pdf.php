<?php
require('functions/fpdf/fpdf.php');
require('core/init.php');
global $link;
	$bln = $_GET['id'];
	$date = date('Y-m-d');



$pdf = new FPDF('L','mm','A4');
$pdf->SetMargins(15, 15, 10);
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->Cell(250,7,'PT. Ar Rosyid Global Sukses Mulia',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(250,5,'Laporan Gaji Pegawai',0,1,'C');
$pdf->Cell(250,5,tgl_indo($date),0,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(10,8,'No',1, 0, 'L');
$pdf->Cell(30,8,'Nama Pegawai',1, 0, 'L');
$pdf->Cell(30,8,'Gaji Pokok',1, 0, 'L');
$pdf->Cell(30,8,'Gaji Lembur',1, 0, 'L');
$pdf->Cell(25,8,'Tunjangan',1, 0, 'L');
$pdf->Cell(30,8,'Potongan Absensi',1, 0, 'L');
$pdf->Cell(30,8,'Potongan Koperasi',1, 0, 'L');
$pdf->Cell(30,8,'Potongan BPJS',1, 0, 'L');
$pdf->Cell(30,8,'Potongan piutang',1, 0, 'L');
$pdf->Cell(30,8,'Gaji Bersih',1, 1, 'L');

$no = 1;
$jml = 0;
foreach(laporan_gaji($bln) as $row){
	$jml = $row['gaji_pokok'];
$pdf->SetFont('Times','',12);
$pdf->Cell(10,8, $no++, 1, 0, 'L');
$pdf->Cell(30,8, $row['nama_karyawan'], 1, 0, 'L');
$pdf->Cell(30,8,'Rp ' .number_format($row['gaji_pokok'],0,".","."), 1, 0, 'L');
$pdf->Cell(30,8,'Rp '.number_format($row['gaji_lembur'],0,".",".") , 1, 0, 'L');
$pdf->Cell(25,8,'Rp '.number_format($row['tot_tunjangan'],0,".",".") , 1, 0, 'L');
$pdf->Cell(30,8,'Rp '.number_format($row['pot_absensi'],0,".",".") , 1, 0, 'L');
$pdf->Cell(30,8,'Rp '. number_format($row['pot_koperasi'],0,".","."), 1, 0, 'L');
$pdf->Cell(30,8,'Rp '. number_format($row['pot_bpjs'],0,".","."), 1, 0, 'L');
$pdf->Cell(30,8,'Rp '. number_format($row['pot_piutang'],0,".","."), 1, 0, 'L');
$pdf->Cell(30,8,'Rp '. number_format($row['gaji_pokok']+$row['gaji_lembur']+$row['tot_tunjangan']-$row['pot_absensi']-$row['pot_koperasi']-$row['pot_bpjs']-$row['pot_piutang'],0,".","."), 1, 1, 'L');
}

$pdf->Output();
?>