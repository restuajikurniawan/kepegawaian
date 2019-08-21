<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php";
    global $link;
      $bln = '';
    $query = "SELECT DISTINCT bulan FROM `potongan_piutang` ";
    $sql = mysqli_query($link,$query);

    if(isset($_POST['cari'])){
      $bln = $_POST['bulan'];
       $_SESSION['bulan'] = $_POST['bulan'];

        laporan_piutang_pegawai($bln);
    }
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
          <a href="laporan_gaji.php">Laporan Piutang Pegawai</a>
        </li>
      </ol>
         

          <div class="card mb-3">
            <form action="laporan_piutang.php" method="post">
            <table class="form-control">
              <tr> 
                <td align="right" width="400"> Pilih Bulan : </td>
                <td align="center" width="200"><select name="bulan" id="bulan" class="form-control">
                  <option value="">--SELECT--</option>
      }
<?php 
  while($row = mysqli_fetch_array($sql)){

?>
                  <option value="<?php echo $row['bulan']; ?>"><?php echo $row['bulan']; ?></option>
<?php } ?>
                </select></td>
                <td width="100" align="center"> <button class="btn btn-primary" name="cari"> Cari</button></td>
                <td>
                  <a href="laporan_piutang_pegawai_pdf.php?id=<?php echo $_SESSION['bulan']; ?>" target="_blank"><input type="button" value="Pdf" class="btn btn-primary" id="pdf"></a>
                </td>
              </tr>
            </table>
            </form>
          <div class="card-header">
          <i class="fa fa-table"></i> Data Gaji Pegawai </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Bulan</th>
                  <th>Nama Pegawai</th>
                  <th>Potongan</th>
                </tr>
              </thead>
              <tbody>
<?php 
  $total = 0;
  if($bln != ''){
  foreach(laporan_piutang_pegawai($bln) as $row){
    $total = $total + ($row['j_pinjaman']/$row['j_cicilan']);
?>
                <tr>
                  <td><?php echo $row['bulan']; ?></td>
                  <td><?php echo $row['nama_karyawan']; ?></td>
                  <td>Rp <?php echo number_format($row['j_pinjaman']/$row['j_cicilan'],0,".","."); ?></td>
                </tr>
  <?php } }  ?>
    <tr><td colspan="2">Jumlah</td> <td> Rp <?php echo number_format($total,0,".","."); ?></td></tr>
              </tbody>
            </table>
          </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
    <script type="text/javascript">
      $(document).ready(function(){
        
      })
    </script>
  </div>
</body>

</html>
