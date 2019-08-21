<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
 $id = $_GET['id'];

  if(isset($_POST['submit'])){
    $id_jadwal = $_POST['id_jadwal'];
    $jam_datang = $_POST['jam_datang'];
    $jam_istirahat = $_POST['jam_istirahat'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];
    $jam_terlambat = $_POST['jam_terlambat'];

// die($jam_mulai.' '.$jam_selesai);
    if(update_jadwal($id_jadwal,$jam_datang,$jam_istirahat,$jam_masuk,$jam_pulang,$jam_terlambat)){
      header('Location:jadwal.php');
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
          <a href="jadwal.php">Jadwal</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Jadwal</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Lembur
     </div>
     <div class="card-body">
      <form action="jadwal_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Asuransi </td>
           <td width="500">
<?php 
foreach (read_jadwal_byid($id) as $row) {
  # code...

?>
            <input type="text" name="id_jadwal" class="form-control" value="<?php echo$row['id_jadwal']; ?>" readonly>
          </td>
         </tr>
          <tr>
           <td width="200"> Jam Datang  </td>
           <td width="500"><input type="time" name="jam_datang" class="form-control" value="<?php echo$row['jam_datang']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Jam Istirahat  </td>
           <td width="500"><input type="time" name="jam_istirahat" class="form-control" value="<?php echo$row['jam_keluar']; ?>"></td>
         </tr>
         <tr>
           <td width="200"> Jam Masuk  </td>
           <td width="500"><input type="time" name="jam_masuk" class="form-control" value="<?php echo$row['jam_masuk']; ?>"></td>
         </tr>
         <tr>
           <td width="200"> Jam Pulang </td>
           <td width="500"><input type="time" name="jam_pulang" class="form-control" value="<?php echo$row['jam_pulang']; ?>"></td>
         </tr>
         <tr>
           <td width="200"> Batas Terlambat </td>
           <td width="500"><input type="time" name="jam_terlambat" class="form-control" value="<?php echo$row['batas_terlambat']; ?>"></td>
         </tr>
<?php } ?>
          <tr>
           <td width="200"></td>
           <td width="500"> 
            <a href="master_asuransi.php"><button class="btn btn-default"> Cancel </button> </a>
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
