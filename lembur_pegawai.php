<!DOCTYPE html>
<html lang="en">
<?php require_once "core/init.php"; 
  global $link;
  $query = "SELECT lembur_pegawai.id_lembur, lembur_pegawai.acc, karyawan.nama_karyawan , SUM(jam_selesai - jam_mulai) AS tot_jam, lembur_pegawai.tgl_lembur, lembur_pegawai.jam_mulai, lembur_pegawai.jam_selesai FROM `lembur_pegawai` INNER JOIN `karyawan` ON lembur_pegawai.id_pegawai = karyawan.id_karyawan GROUP BY lembur_pegawai.id_lembur";
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
          <a href="lembur_pegawai.php">Lembur Pegawai</a>
        </li>
      </ol>
      <?php if($_SESSION['level']=='PERSONALIA'){ ?>
         <a href="lembur_pegawai_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
         <!-- <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a> -->
      <?php } ?>
          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Lembur Pegawai </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pegawai</th>
                  <th>Tanggal_lembur</th>
                  <th>Jam Mulai </th>
                  <th>Jam Selesai </th>
                  <th>Total Jam </th>
                  <th>Acc HRD </th>
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>

<?php 
  while($row = mysqli_fetch_array($sql)){

  
?>
                <tr>
                  <td><?php echo $row['id_lembur']; ?></td>
                  <td><?php echo $row['nama_karyawan']; ?></td>
                  <td><?php echo $row['tgl_lembur']; ?></td>
                  <td><?php echo $row['jam_mulai']; ?></td>
                  <td><?php echo $row['jam_selesai']; ?></td>
                  <td><?php echo $row['tot_jam']/10000; ?></td>
                  <td align="center"><?php $acc = $row['acc'];
                        if($acc == 1){
                          echo "<font color ="."green".">Approved</font>";
                        }elseif($acc == 2){
                          echo "<font color ="."red".">Rejected</font>";
                        }else{
                          echo "<font color ="."red".">waiting</font>";
                        }
                   ?></td>
                  <td align="center">
                           <a href="lembur_pegawai_delete.php?id=<?php echo $row['id_lembur']?>" onclick="javascript: return confirm('Anda yakin hapus ?');">
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
