<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php" ;
  if( !isset($_SESSION['username']) ){
  header('Location:login.php');
}

  global $link;

  $query = "SELECT perjalanan_dinas.id_dinas, perjalanan_dinas.id_pegawai, karyawan.nama_karyawan, perjalanan_dinas.keterangan,perjalanan_dinas.jumlah_pengeluaran,perjalanan_dinas.tgl_berangkat, perjalanan_dinas.tgl_pulang,perjalanan_dinas.status, datediff(perjalanan_dinas.tgl_pulang, perjalanan_dinas.tgl_berangkat) AS jml_hari,perjalanan_dinas_berkas.nama_berkas FROM `perjalanan_dinas` INNER JOIN karyawan ON karyawan.id_karyawan = perjalanan_dinas.id_pegawai JOIN perjalanan_dinas_berkas ON perjalanan_dinas.id_dinas = perjalanan_dinas_berkas.id_dinas ORDER BY `id_dinas` ASC"; 
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
          <a href="perjalanan_dinas.php">Perjalanan Dinas Pegawai</a>
        </li>
      </ol>
         <a href="perjalanan_dinas_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Dinas Pegawai </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>id Pegawai</th>
                  <th>keterangan</th>
                  <th>tgl berangkat</th>
                  <th>tgl pulang </th>
                  <th>J hari</th>
                  <th>J pengeluaran</th>
                  <th> Status</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                  if(!$sql){
                    die('SQL Error : '.mysqli_eror($link));
                  }
                  while($row = mysqli_fetch_array($sql)){


                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo$row['nama_karyawan']; ?></td>
                  <td><?php echo $row['keterangan']; ?></td>
                  <td><?php echo tgl_indo($row['tgl_berangkat']); ?></td>
                  <td><?php echo tgl_indo($row['tgl_pulang']); ?></td>
                  <td><?php echo $row['jml_hari']; ?></td>
                  <td><?php echo number_format($row['jumlah_pengeluaran'],0,".","."); ?></td>
                  <td><?php 
                  if( $row['status'] == 0){
                    echo "<a href="."image/surat_dinas/".$row['nama_berkas']." target="."_blank"."><font color ="."red".">Waiting</font></a>";}
                    elseif($row['status'] == 1){
                      echo"<a href="."image/surat_dinas/".$row['nama_berkas']." target="."_blank"."><font color="."green".">Approved</font></a>";}
                      else{
                        echo"<a href="."image/surat_dinas/".$row['nama_berkas']." target="."_blank"."><font color="."red".">Rejected</font></a>";
                      } ?></td>
                  <td align="center"> 
                          <!-- <a href="perjalanan_dinas_update.php?id=<?php echo $row['id_dinas']; ?>"><button class="btn btn-primary"> <i class="fa fa-edit"></i></button></a> -->

                           <a href="perjalanan_dinas_delete.php?id=<?php echo $row['id_dinas']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?');">
                           <button class="btn btn-danger" name="hapus"> <i class="fa fa-trash"></i></button></a></td>
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
