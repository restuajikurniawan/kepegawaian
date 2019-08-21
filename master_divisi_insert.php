<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 

  if(isset($_POST['submit'])){
    $id_divisi = $_POST['id_divisi'];
    $nm_divisi = $_POST['nm_divisi'];

    if(insert_master_divisi($id_divisi,$nm_divisi)){
      header('Location:master_divisi.php');
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
          <a href="master_status.php">Master Divisi Pegawai</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Master Divisi </li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Divisi Pegawai
     </div>
     <div class="card-body">
      <form action="master_divisi_insert.php" method="post">
       <table>
         <tr>
           <td width="200">Id Divisi</td>
           <td width="500">
<?php 
foreach (get_id_div() as $row ){ ?>
            <input type="text" name="id_divisi" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
          </td>
         </tr>
<?php } ?>
          <tr>
           <td width="200"> Divisi </td>
           <td width="500"><input type="text" name="nm_divisi" class="form-control"></td>
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
