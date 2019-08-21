<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $id = $_GET['id'];
  $query = "SELECT * FROM `master_tunjangan` WHERE id_tunjangan = '$id' ";
  $sql = mysqli_query($link,$query);

  if(isset($_POST['submit'])){
    $id_tunjangan = $_POST['id_tunjangan'];
    $nm_tunjangan = $_POST['nm_tunjangan'];
    $jumlah_tunjangan = str_replace('.','',$_POST['jumlah']);

    if(update_master_tunjangan($id_tunjangan,$nm_tunjangan,$jumlah_tunjangan)){
      header('Location:master_tunjangan.php');
    }
    else{
      ?>
      <script type="text/javascript"> alert('Update Gagal');</script>
      <?php
    }
  }

  if(isset($_POST['cancel'])){
    header('Location:master_tunjangan.php');
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
          <a href="master_tunjangan.php">Master Tunjangan</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Tunjangan</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Tunjangan
     </div>
     <div class="card-body">
      <form action="master_tunjangan_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Tunjangan </td>
           <td width="500">
<?php 
if(!$sql){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql)){


?>
            <input type="text" name="id_tunjangan" class="form-control" value="<?php echo$row['id_tunjangan']; ?>" readonly>
          </td>
         </tr>
         <tr>
          <td> Id Jabatan </td>
          <td> <input type="text" name="id_jabatan" value="<?php echo $row['id_jabatan'] ?>" class="form-control" readonly></td>
         </tr>
          <tr>
           <td width="200"> Nama Tunjangan </td>
           <td width="500"><input type="text" name="nm_tunjangan" class="form-control" value="<?php echo $row['nama_tunjangan']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah  </td>
           <td width="500"><input type="text" name="jumlah" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo number_format($row['jumlah_tunjangan'], 0, ".", ".");?>"></td>
         </tr>
<?php } ?>

          <tr>
           <td width="200"></td>
           <td width="500"> 
     </form>
            <button class="btn btn-default" name="cancel"> Cancel </button> 
            <button class="btn btn-primary" name="submit"> Update</button>
          </td>
         </tr>
       </table>
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
