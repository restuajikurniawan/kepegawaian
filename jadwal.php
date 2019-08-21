<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/core/init.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/head.php"); ?>
<?php
  if( !isset($_SESSION['username']) ){
  
  header('Location:login.php');
}
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/navigation.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $siteurl; ?>/jadwal.php">Jadwal</a>
        </li>
      </ol>
       <?php if($_SESSION['level'] == 'HRD'){ ?>
         <a href="<?php echo $siteurl; ?>/jadwal_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
      <?php } ?>
         <!-- <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a> -->

          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Jadwal</div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jam Datang </th>
                  <th>Jam Istirahat </th>
                  <th>Jam Masuk </th>
                  <th>Jam Pulang </th>
                  <th>Batas Terlambat </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
$no = 1;
foreach (read_jadwal() as $row) {
?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['jam_datang']; ?></td>
                  <td><?php echo $row['jam_keluar']; ?></td>
                  <td><?php echo $row['jam_masuk']; ?></td>
                  <td><?php echo $row['jam_pulang']; ?></td>
                  <td><?php echo $row['batas_terlambat']; ?></td>
                                    <td align="center">
                          <a href="jadwal_update.php?id=<?php echo $row['id_jadwal'];?>"><button class="btn btn-primary"> <i class="fa fa-edit"></i></button></a>

                          <a href="jadwal_delete.php?id=<?php echo $row['id_jadwal'];?>" onclick="javascript: return confirm('Anda yakin ?');"><button class="btn btn-danger"> <i class="fa fa-edit"></i></button></a>
                         </td>
                </tr>
              </tbody>
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
 <?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/footer.php"); ?>

    <!-- Scroll to Top Button-->
    
    <!-- Logout Modal-->
    <?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/logout.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo $siteurl; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $siteurl; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo $siteurl; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo $siteurl; ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo $siteurl; ?>/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo $siteurl; ?>/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo $siteurl; ?>/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo $siteurl; ?>/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo $siteurl; ?>/js/sb-admin-charts.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
    $('#dataTable').DataTable();
} );
    </script>
  </div>
</body>

</html>
