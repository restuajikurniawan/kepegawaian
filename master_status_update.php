<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  
  $id = $_GET['id'];
  if(isset($_POST['submit'])){
    $id_status = $_POST['id_status'];
    $nm_status = $_POST['nm_status'];

    if(update_master_status($id_status,$nm_status)){
      header('Location:master_status.php');
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
          <a href="master_status.php">Master Status Pegawai</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Master Status </li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Status Pegawai
     </div>
     <div class="card-body">
      <form action="master_status_update.php" method="post">
       <table>
         <tr>
           <td width="200">Id Status</td>
           <td width="500">
<?php 
foreach (get_stts_byid($id) as $row ){ ?>
            <input type="text" name="id_status" class="form-control" value="<?php echo$row['id_status']; ?>" readonly>
          </td>
         </tr>
          <tr>
           <td width="200"> Status Pegawai </td>
           <td width="500"><input type="text" name="nm_status" class="form-control" value="<?php echo $row['nama_status']?>"></td>
         </tr>
<?php } ?>
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
