<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php";
    global $link;
      $bln = '';
    $query = "SELECT DISTINCT bulan FROM `rekap_kerja` ";
    $sql = mysqli_query($link,$query);

    if(isset($_POST['cari'])){
      $bln = $_POST['bulan'];
      $_SESSION['bln'] = $_POST['bulan'];
        read_rekap_kerja($bln);
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
          <a href="rekap_absen.php">Laporan Absensi Pegawai</a>
        </li>
      </ol>
         

          <div class="card mb-3">
            <form action="rekap_absen.php" method="post">
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
                  <a href="rekap_absen_pdf.php?id=<?php echo $_SESSION['bln']; ?>" target="_blank"><input type="button" value="Pdf" class="btn btn-primary" id="pdf"></a>
                </td>
              </tr>
            </table>
            </form>
          <div class="card-header">
          <i class="fa fa-table"></i> Data Rekap Absensi Pegawai </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <!-- <th>Bulan</th> -->
                  <th>Nama Pegawai</th>
                  <th>Jml Hadir</th>
                  <th>Jml Terlambat</th>
                  <th>Jml Cuti</th>
                  <th>Jml Sakit</th>
                  <th>Jml Alpha</th>
                </tr>
              </thead>
              <tbody>
<?php 
  if($bln != ''){
  foreach(read_rekap_kerja($bln) as $row){
?>
                <tr>
                  <!-- <td><?php echo $row['bulan']; ?></td> -->
                  <td><?php echo $row['nama_karyawan']; ?></td>
                  <td><?php echo $row['jml_hadir'];?></td>
                  <td><?php echo $row['jml_terlambat'];?></td>
                  <td><?php echo $row['jml_cuti'];?></td>
                  <td><?php echo $row['jml_sakit'];?></td>
                  <td><?php echo $row['jml_alpha'];?></td>

<?php } ?>
<?php  } ?>
                </tr>
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
