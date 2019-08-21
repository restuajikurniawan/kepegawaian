<!DOCTYPE html>
<html lang="en">
<?php require_once "core/init.php"; ?>
<?php  include('view/head.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php require_once "view/navigation.php" ; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="master_absensi.php">Absensi Pegawai</a> </li>
      </ol>
         <a href="master_absensi_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
         <!-- <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a> -->

          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Absensi Pegawai</div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pegawai</th>
                  <th>Tanggal</th>
                  <th>Jam Masuk 1</th>
                  <th>Jam keluar 1</th>
                  <th>Jam masuk 2</th>
                  <th>Jam keluar 2</th>
                  <th>Keterangan </th>
                  <th> Action </th>
                </tr>
              </thead>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Pegawai</th>
                  <th>Tanggal</th>
                  <th>Jam Masuk 1</th>
                  <th>Jam keluar 1</th>
                  <th>Jam masuk 2</th>
                  <th>Jam keluar 2</th>
                  <th>Keterangan </th>
                  <th> Action </th>
                </tr>
              </tfoot>
              <tbody>

<?php 
$no = 1;
foreach (read_absensi() as $row) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['nama_karyawan']; ?></td>
                  <td><?php echo tgl_indo($row['tgl_absen']); ?></td>
                  <td><?php echo $row['jam_masuk_1']; ?></td>
                  <td><?php echo $row['jam_keluar_1']; ?></td>
                  <td><?php echo $row['jam_masuk_2']; ?></td>
                  <td><?php echo $row['jam_keluar_2']; ?></td>
                  <td><?php if($row['keterangan'] == 'HADIR'){
                    echo "<font color ="."green".">".$row['keterangan']."</font>"; 
                  }elseif($row['keterangan']=='ALPHA'){
                    echo "<font color ="."red".">".$row['keterangan']."</font>";
                  }else{
                    echo "<a href="."image/surat_izin/".$row['nama_surat']." target="."_blank"."><font color ="."red".">".$row['keterangan']."</font></a>";
                    }
                      ?></td>
                  
                  <td><a href="master_absensi_update.php?id=<?php echo $row['id_absensi'];?>"><button class="btn btn-primary"> <i class="fa fa-edit"></i></button></a></td>
                </tr>
<?php } ?>
              </tbody>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  } );
  </script>
  </div>
</body>

</html>
