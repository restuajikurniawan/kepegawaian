<?php
require('functions/fpdf/fpdf.php');
require('core/init.php');
global $link;
	$bln = $_SESSION['bulan'];
	$date = date('Y-m-d');



$pdf = new FPDF('P','mm','A4');
$pdf->SetMargins(30, 15, 10);
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->Cell(150,7,'PT. Ar Rosyid Global Sukses Mulia',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(150,5,'Laporan Piutang Pegawai',0,1,'C');
$pdf->Cell(150,5,tgl_indo($date),0,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(10,8,'No',1, 0, 'L');
$pdf->Cell(40,8,'Nama Pegawai',1, 0, 'L');
$pdf->Cell(40,8,'Tanggal Pinjam',1, 0, 'L');
$pdf->Cell(35,8,'Jumlah Pinjaman',1, 0, 'L');
$pdf->Cell(35,8,'Jumlah Potongan',1, 1, 'L');

$no = 1;
$total = 0;
foreach(laporan_piutang_pegawai($bln) as $row){
	$total = $total + ($row['j_pinjaman']/$row['j_cicilan']);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,8, $no++, 1, 0, 'L');
$pdf->Cell(40,8, $row['nama_karyawan'], 1, 0, 'L');
$pdf->Cell(40,8, tgl_indo($row['tanggal']), 1, 0, 'L');
$pdf->Cell(35,8,'Rp ' .number_format($row['j_pinjaman'],0,".","."), 1, 0, 'L');
$pdf->Cell(35,8,'Rp '.number_format($row['j_pinjaman']/$row['j_cicilan'],0,".",".") , 1, 1, 'L');
}
$pdf->Cell(125,8,'Jumlah ', 1, 0, 'C');
$pdf->Cell(35,8,'Rp '.number_format($total,0,".",".") , 1, 1, 'L');


$pdf->Output();
?>