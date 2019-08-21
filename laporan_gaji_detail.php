<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php" ;
  if( !isset($_SESSION['username']) ){
  header('Location:login.php');
}

  global $link;
  $id = $_GET['id'];
  $bln = $_GET['bln'];
  select_pegawai($id);
  select_gaji($id,$bln);
  select_lembur($id,$bln);
  select_tunjangan($id,$bln);
?>

<?php  include('view/head.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php require_once "view/navigation.php" ; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="laporan_gaji.php">Laporan Gaji </a>
        </li>
      </ol>
         <a href="laporan_gaji_detail_pdf.php?id=<?php echo $_GET['id']; ?>&bln=<?php echo $_GET['bln'] ; ?>" target="_blank"><input type="button" value="Pdf"class="btn btn-primary"></a>

          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data  Gaji Pegawai </div>
          <div class="card-body">
          <div class="table-responsive">
<table>
<?php foreach (select_pegawai($id) as $key ) { ?>
  <tr> 
<td width="200"> Nama Karyawan : </td> <td width="300"> <?php echo $key['nama_karyawan']; ?> </td>
</tr>
<tr>
<td> NIP: </td> <td> <?php echo $key['nip']; ?> </td>
  </tr>
<?php } ?>
</table>
            <table class="table table-bordered" id="dataTable">
<?php $jumlah = 0; ?>
<?php foreach (select_gaji($id,$bln) as $key) { ?>
                <?php if($key['jumlah']>0){ echo '<tr><td width="100">'. $key['nama_gaji'].'</td>'?> 
                 <?php echo '<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr>'; 

                 $jumlah = $jumlah + $key['jumlah'];} } ?>

<?php foreach (select_lembur($id,$bln) as $key) { ?>
                <?php if($key['jumlah']>0){ echo '<tr><td width="100">'.$key['nama_lembur'].'</td>'?> 
                 <?php echo '<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr>';
                 $jumlah = $jumlah + $key['jumlah']; }} ?>

<?php foreach (select_tunjangan($id,$bln) as $key) { ?>
                <?php if($key['jumlah']>0){ echo '<tr><td width="100">'.$key['nama_tunjangan'].'</td>'?> 
                 <?php echo '<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr>';
                 $jumlah = $jumlah + $key['jumlah']; }} ?>

<?php foreach (select_piutang($id,$bln) as $key) { ?>
                  <?php if($key['jumlah']>0){ echo '<tr> <td width="100">Potongan Piutang </td>';?> 
                 <?php echo'<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr> '; 
                  $jumlah = $jumlah - $key['jumlah'];}} ?>

<?php foreach (select_terlambat($id,$bln) as $key) { ?>
                <?php if($key['jumlah']>0){ echo '<tr><td width="100">'.$key['nama_potongan'].'</td>'?> 
                 <?php echo '<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr>';
                 $jumlah = $jumlah - $key['jumlah']; }} ?>

<?php foreach (select_koperasi($id,$bln) as $key) { ?>
                <?php if($key['jumlah']>0){ echo '<tr><td width="100">'.$key['nama_deposit'].'</td>'?> 
                 <?php echo '<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr>';
                 $jumlah = $jumlah - $key['jumlah']; }} ?>

<?php foreach (select_bpjs($id,$bln) as $key) { ?>
                <?php if($key['jumlah']>0){ echo '<tr><td width="100">'.$key['nama_asuransi'].'</td>'?> 
                 <?php echo '<td width="100">'. number_format($key['jumlah'],0,".",".").'</td></tr>';
                 $jumlah = $jumlah - $key['jumlah']; }} ?>

              <tr> 
                  <td> Total Gaji </td>
                  <td> <p id="total">Rp.<?php echo number_format($jumlah,0,".","."); ?> </p></td>
              </tr>
            </table>
          </div>
          </div>
                <div class="card-footer small text-muted"></div>
        
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php require_once "view/footer.php"; ?>
    <!-- Scroll to Top Button-->
    
    <!-- Logout Modal-->
    <?php require_once "view/logout.php" ; ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
<!--     <script type="text/javascript">
      $(document).ready(function(){
        var tunjangan = $('#tj').val();
        var gaji_pokok = $('#gj').val();

        console.log(tunjangan);
        var jumlah = parseInt(tunjangan)+parseInt(gaji_pokok);
       var tot =  document.getElementById("total").innerHTML;
       var jml =  tot.replace('total', jumlah);
      document.getElementById("total").innerHTML = jml;
       console.log(jml);
      })
    </script> -->
  </div>
</body>

</html>
