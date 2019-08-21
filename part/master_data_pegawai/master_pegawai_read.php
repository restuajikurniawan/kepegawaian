<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "core/init.php" ;
  if( !isset($_SESSION['username']) ){
  header('Location:login.php');
}
 global $link;
  $id = $_GET['id_karyawan'];
  read_peg_byid($id);
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
          <a href="master_pegawai.php">Master Pegawai</a>
        </li>
      </ol>
         <a href=""><input type="button" value="Pdf"class="btn btn-primary"></a>

          <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-table"></i> Data Pegawai Detail </div>
          <div class="card-body">
          <div class="table-responsive">
<table class="table table-bordered" id="dataTable">
  <?php foreach(read_peg_byid($id) as $key){ ?>
    <tr><td> Id Pegawai </td><td><?php echo $key['id_karyawan'];  ?> </td></tr>
    <tr><td> NIP </td><td><?php echo $key['nip'];  ?> </td></tr>
    <tr><td> Nama Pegawai </td><td><?php echo $key['nama_karyawan'];  ?> </td></tr>
    <tr><td> JK Pegawai </td><td><?php 
    if($key['jk_karyawan'] == 'P'){ echo 'Perempuan';}
     else{ echo 'Laki - Laki'; }  ?> </td></tr>
    <tr><td> Tempat, Tanggal Lahir </td><td><?php echo $key['tmpt_lahir'].', '.tgl_indo($key['tgl_lahir']);  ?> </td></tr>
    <tr><td> Agama </td><td><?php echo $key['agama'];  ?> </td></tr>
    <tr><td> Status Pernikahan </td><td><?php
    if($key['status_pernikahan'] == '1'){echo 'Menikah' ;}
    else{ echo 'Belum Menikah';} ?> </td></tr>
    <tr><td> Jumlah Anak </td><td><?php echo $key['jml_anak'];  ?> </td></tr>
    <tr><td> Alamat </td><td><?php echo $key['alamat'];  ?> </td></tr>
    <tr><td> No Telpon </td><td><?php echo $key['no_telpn'];  ?> </td></tr>
    <tr><td> No NPWP </td><td><?php echo $key['no_npwp'];  ?> </td></tr>
    <tr><td> Tanggal Mulai Kerja </td><td><?php echo tgl_indo($key['tgl_masuk']);  ?> </td></tr>
    <tr><td> Pendidikan Terakhir </td><td><?php echo $key['nama_pend'];  ?> </td></tr>
    <tr><td> Status Pegawai </td><td><?php echo $key['nama_status'];  ?> </td></tr>
    <tr><td> Divisi Pegawai </td><td><?php echo $key['nama_bagian'];  ?> </td></tr>
    <tr><td> Jabatan Pegawai </td><td><?php echo $key['nama_jabatan'];  ?> </td></tr>
    <tr><td> Anggota Koperasi </td><td><?php 
    if($key['anggota_koperasi'] == '1'){echo 'Anggota Koperasi';}
    else{ echo 'Tidak Anggota Koperasi'; }   ?> </td></tr>
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
