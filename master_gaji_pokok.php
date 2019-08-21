<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php" ;
  if( !isset($_SESSION['username']) ){
  // $_SESSION['msg'] = 'login dulu  !';
  header('Location:login.php');
}

  global $link;

  $query = "SELECT * FROM `master_gaji_pokok` INNER JOIN master_status ON master_gaji_pokok.id_status = master_status.id_status INNER JOIN master_bagian ON master_gaji_pokok.id_bagian = master_bagian.id_bagian JOIN master_pendidikan ON master_gaji_pokok.pend_terakhir = master_pendidikan.id_pend "; 
  $sql = mysqli_query($link,$query);

  $query2 = "SELECT last_update FROM `master_gaji_pokok` ORDER BY last_update DESC LIMIT 1";
  $sql2 = mysqli_query($link,$query2);

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
          <a href="master_gaji_pokok.php">Master Gaji Pokok</a>
        </li>
      </ol>
      <?php if($_SESSION['level']== 'HRD'){ ?>
         <a href="master_gaji_pokok_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
         <!-- <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a> -->
      <?php } ?>
          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Master Gaji Pokok </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Status</th>
                  <th>Pendidikan</th>
                  <th>Bagian</th>
                  <th>Nama Gaji</th>
                  <th>Jumlah Gaji</th>
            <?php if($_SESSION['level']=='HRD'){ ?>
                  <th>Action</th>
            <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(!$sql){
                    die('SQL Error : '.mysqli_eror($link));
                  }
                  while($row = mysqli_fetch_array($sql)){


                ?>
                <tr>
                  <td><?php echo$row['id_master_gaji']; ?></td>
                  <td><?php echo $row['nama_status']; ?></td>
                  <td><?php echo $row['nama_pend']; ?></td>
                  <td><?php echo $row['nama_bagian']; ?></td>
                  <td><?php echo $row['nama_gaji']; ?></td>
                  <td><?php echo number_format($row['jml_gaji_pokok'],0,".","."); ?></td>
            <?php if($_SESSION['level']=='HRD'){ ?>
                  <td> 
                      <a href="master_gaji_pokok_update.php?id=<?php echo $row['id_master_gaji']; ?>"><button class="btn btn-primary"> <i class="fa fa-edit"></i></button></a>

                           <a href="master_gaji_pokok_delete.php?id=<?php echo $row['id_master_gaji']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?');">
                           <button class="btn btn-danger" name="hapus"> <i class="fa fa-trash"></i></button></a></td>
            <?php } ?>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          </div>
                <div class="card-footer small text-muted">Updated </div>
        
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
