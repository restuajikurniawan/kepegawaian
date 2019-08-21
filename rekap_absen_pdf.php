<?php
require('functions/fpdf/fpdf.php');
require('core/init.php');
global $link;
	$bln = $_GET['id'];
	$date = date('Y-m-d');



$pdf = new FPDF('L','mm','A4');
$pdf->SetMargins(20, 15, 10);
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->Cell(250,7,'PT. Ar Rosyid Global Sukses Mulia',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(250,5,'Laporan Absensi Pegawai',0,1,'C');
$pdf->Cell(250,5,$bln,0,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(10,8,'No',1, 0, 'L');
$pdf->Cell(40,8,'Nama Pegawai',1, 0, 'L');
$pdf->Cell(40,8,'Jumlah Hadir',1, 0, 'L');
$pdf->Cell(40,8,'Jumlah Terlambat',1, 0, 'L');
$pdf->Cell(40,8,'Jumlah Cuti',1, 0, 'L');
$pdf->Cell(40,8,'Jumlah Sakit ',1, 0, 'L');
$pdf->Cell(40,8,'Jumlah Alpha',1, 1, 'L');

$no = 1;
foreach(read_rekap_kerja($bln) as $row){
$pdf->SetFont('Times','',12);
$pdf->Cell(10,8, $no++, 1, 0, 'L');
$pdf->Cell(40,8, $row['nama_karyawan'], 1, 0, 'L');
$pdf->Cell(40,8, $row['jml_hadir'], 1, 0, 'L');
$pdf->Cell(40,8, $row['jml_terlambat'], 1, 0, 'L');
$pdf->Cell(40,8, $row['jml_cuti'], 1, 0, 'L');
$pdf->Cell(40,8, $row['jml_sakit'], 1, 0, 'L');
$pdf->Cell(40,8, $row['jml_alpha'], 1, 1, 'L');
}
$pdf->Output();
?>