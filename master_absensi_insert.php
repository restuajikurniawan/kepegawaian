<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 

  if(isset($_POST['submit'])){
    $id_absensi = $_POST['id_absensi'];
    $id_pegawai = $_POST['id_pegawai'];
    $tgl_absensi = $_POST['tgl_absensi'];
    $jam_m1 = $_POST['jam_m1'];
    $jam_m2 = $_POST['jam_m2'];
    $jam_k1 = $_POST['jam_k1'];
    $jam_k2 = $_POST['jam_k2'];

    if(insert_master_absensi($id_absensi,$id_pegawai,$tgl_absensi,$jam_m1,$jam_m2,$jam_k1,$jam_k2)){
      header('Location:master_absensi.php');
    }
    else{
      ?>
       <script type="text/javascript"> alert('Insert Gagal');</script> 
      <?php
    }
  }

?>
<?php  require_once "view/head.php"; ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php require_once "view/navigation.php" ; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="master_absensi.php">Master Absensi</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Master Absensi</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Absensi
     </div>
     <div class="card-body">
      <form action="master_absensi_insert.php" method="post">
       <table>
         <tr>
           <td width="200">Id Absensi</td>
           <td width="500">
<?php 
foreach (get_id_absensi() as $row ){ ?>
            <input type="text" name="id_absensi" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
          </td>
         </tr>
<?php } ?>
          <tr>
           <td width="200"> Pegawai </td>
           <td width="500"> <select class="form-control" name="id_pegawai">
             <option value="">--Select Pegawai--</option>
<?php foreach(get_pegawai() as $key){ ?>
             <option value="<?php echo $key['id_karyawan'] ?>"><?php echo $key['nama_karyawan']; ?></option>
<?php } ?>
           </select></td>
         </tr>
         <tr>
           <td width="200"> Tanggal </td>
           <td width="500"><input type="date" name="tgl_absensi" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Jam Masuk ke 1 </td>
           <td width="500"><input type="time" name="jam_m1" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Jam Keluar 1 </td>
           <td width="500"><input type="time" name="jam_k1" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Jam Masuk ke 2 </td>
           <td width="500"><input type="time" name="jam_m2" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Jam Keluar 2 </td>
           <td width="500"><input type="time" name="jam_k2" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"></td>
           <td width="500"> 
            <button class="btn btn-default"> Cancel </button> 
            <button class="btn btn-primary" name="submit"> Create</button>
          </td>
         </tr>
       </table>
     </form>
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
    <script src="js/number-format.js"></script>

  </div>
</body>

</html>
