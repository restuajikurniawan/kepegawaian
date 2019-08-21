<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php" ;
  if( !isset($_SESSION['username']) ){
  header('Location:login.php');
}

  global $link;

  $query = "SELECT karyawan.nama_karyawan, piutang_pegawai.id_piutang, piutang_pegawai.tanggal, piutang_pegawai.acc, piutang_pegawai.j_cicilan, piutang_pegawai.id_pegawai, IF(SUM(potongan_piutang.jumlah) > 0 , SUM(potongan_piutang.jumlah), '0')  AS total , piutang_pegawai.j_pinjaman,piutang_pegawai.j_pinjaman - IF(SUM(potongan_piutang.jumlah) > 0 , SUM(potongan_piutang.jumlah), '0') AS sisa FROM `potongan_piutang` RIGHT JOIN piutang_pegawai ON potongan_piutang.id_pegawai = piutang_pegawai.id_pegawai INNER JOIN karyawan ON karyawan.id_karyawan = piutang_pegawai.id_pegawai  GROUP BY piutang_pegawai.id_piutang"; 
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
          <a href="piutang_pegawai.php">Utang Pegawai</a>
        </li>
      </ol>
      <?php if($_SESSION['level'] == 'PERSONALIA'){ ?>
         <a href="piutang_pegawai_insert.php"><input type="button" value="Create"class="btn btn-primary"></a>
        <?php } ?>
          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Utang Pegawai </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                 <th>No</th>
                  <th>tanggal</th>
                  <th>id Pegawai</th>
                  <th>Jumlah Pinjam</th>
                  <th>J pinjam </th>
                  <th>J potongan</th>
                  <th>Sisa</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                  while($row = mysqli_fetch_array($sql)){
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo$row['tanggal']; ?></td>
                  <td><?php echo $row['nama_karyawan']; ?></td>
                  <td><?php echo number_format($row['j_pinjaman'],0,".","."); ?></td>
                  <td><?php echo $row['j_cicilan']; ?></td>
                  <td><?php echo  number_format($row['j_pinjaman']/$row['j_cicilan'],0,".","."); ?></td>
                  <td><?php
                    if($row['sisa'] == 0){
                        echo 'LUNAS';
                    }else{
                      echo number_format($row['sisa'],0,".",".");
                    }
                   ?></td>
                   <td><?php 
                  if( $row['acc'] == 0){
                    echo "<font color ="."red".">Waiting</font>";}
                    elseif($row['acc'] == 1){
                      echo"<font color="."green".">Approved</font>";}
                      else{
                        echo"<font color="."red".">Rejected</font>";
                      } ?></td>
                   <td>  <a href="piutang_pegawai_delete.php?id=<?php echo $row['id_piutang']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?');">
                           <button class="btn btn-danger" name="hapus"> <i class="fa fa-trash"></i></button></a>
                  </td>
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
