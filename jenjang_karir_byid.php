<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php" ;
  if( !isset($_SESSION['username']) ){
  header('Location:login.php');
}

  $id = $_GET['id'];
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
          <a href="jenjang_karir.php">Jenjang Karir</a>
        </li>
      </ol>
         <!-- <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a> -->

          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Jenjang Karir Detail </div>
          <div class="card-body">
          <div class="table-responsive">
<table class="table table-bordered" id="dataTable">
    <tr><th> Nama Pegawai </th>
      <th> Tanggal </th>
      <th> Jenjang Karir </th></tr>
  <?php foreach(read_jenjang_karir_byid($id) as $key){ ?>
    <tr><td><?php echo $key['nama_karyawan'];  ?> </td>
      <td><?php echo tgl_indo($key['tanggal']);  ?> </td>
      <td><?php echo $key['Keterangan'];  ?> </td></tr>
  <?php } ?>
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
