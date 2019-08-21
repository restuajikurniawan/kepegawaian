<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php";
    global $link;
    $query = "SELECT * FROM `master_pajak` ";
    $sql = mysqli_query($link,$query);
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
          <a href="master_pajak.php">Master Pajak</a>
        </li>
      </ol>
         <a href="master_pajak_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
         <!-- <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a> -->

          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Master Pajak </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pajak</th>
                  <th>Jumlah Penghasilan</th>
                  <th>Jumlah Pajak (%)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php 
  while($row = mysqli_fetch_array($sql)){

?>
                <tr>
                  <td><?php echo $row['id_pajak']; ?></td>
                  <td><?php echo $row['nm_pajak']; ?></td>
                  <td><?php echo $row['jumlah_penghasilan']; ?></td>
                  <td><?php echo $row['jumlah_pajak']*100; ?>%</td>
                  <td>
                          <a href="master_pajak_update.php?id=<?php echo $row['id_pajak'];?>"><button class="btn btn-primary"> <i class="fa fa-edit"></i></button></a>

                           <a href="master_pajak_delete.php?id=<?php echo $row['id_pajak']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?');">
                           <button class="btn btn-danger"> <i class="fa fa-trash"></i></button></a></td>
                </tr>
              </tbody>
<?php } ?>
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
  </div>
</body>

</html>
