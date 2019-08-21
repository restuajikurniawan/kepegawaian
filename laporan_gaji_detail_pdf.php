<?php 
  require_once "core/init.php" ;
  require('functions/fpdf/fpdf.php');
  if( !isset($_SESSION['username']) ){
  header('Location:login.php');}
	global $link;
  $id = $_GET['id'];
  $bln = $_GET['bln'];
  $date = date('Y-m-d');




$pdf = new FPDF('P','mm','A4');
$pdf->SetMargins(20, 15, 10);
$pdf->AddPage();
$pdf->SetFont('Times','B',15);
$pdf->Cell(170,7,'PT. Ar Rosyid Global Sukses Mulia',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(170,5,'Laporan Gaji Pegawai',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(170,5,tgl_indo($date),0,1,'C');

$pdf->SetFont('Times','',12);
foreach (select_pegawai($id) as $key ){
$pdf->Cell(30,8,'Nama Pegawai',0, 0,'L');
			$pdf->Cell(30,8,$key['nama_karyawan'],0,1,'L'); }
$pdf->Cell(30,8,'NIP ',0, 0, 'L');
foreach (select_pegawai($id) as $key ){
			$pdf->Cell(30,8,$key['nip'],0,1,'L'); }

$jumlah = 0;
foreach (select_gaji($id,$bln) as $key) {
$jumlah = $jumlah + $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,$key['nama_gaji'],1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
}}

foreach (select_lembur($id,$bln) as $key) {
$jumlah = $jumlah + $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,$key['nama_lembur'],1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
}}

foreach (select_tunjangan($id,$bln) as $key) {
$jumlah = $jumlah + $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,$key['nama_tunjangan'],1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
}}

foreach (select_piutang($id,$bln) as $key) {
	$jumlah = $jumlah - $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,'Potongan Piutang',1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
}}

foreach (select_terlambat($id,$bln) as $key) {
	$jumlah = $jumlah - $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,$key['nama_potongan'],1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
}}

foreach (select_koperasi($id,$bln) as $key) {
	$jumlah = $jumlah - $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,$key['nama_deposit'],1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
}}

foreach (select_bpjs($id,$bln) as $key) {
	$jumlah = $jumlah - $key['jumlah'];
	if($key['jumlah']>0){
$pdf->Cell(80,8,$key['nama_asuransi'],1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($key['jumlah'],0,".","."),1, 1, 'R'); 
$jumlah12 = $key['jumlah'];}}

$pdf->Cell(80,8,'Total Gaji',1, 0, 'C'); 
$pdf->Cell(70,8,'Rp. '.number_format($jumlah,0,".","."),1, 0, 'C'); 
$pdf->Output();
?>
?>