<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $id = $_GET['id'];
  $query1 = "SELECT * FROM `asuransi` WHERE `id_asuransi` = '$id'";
  $sql = mysqli_query($link,$query1);

  if(isset($_POST['submit'])){
    $id_asuransi = $_POST['id_asuransi'];
    $nm_asuransi = $_POST['nm_asuransi'];
    $jumlah_asuransi = str_replace('.','',$_POST['jumlah_asuransi']);
    if(update_master_asuransi($id_asuransi,$nm_asuransi,$jumlah_asuransi)){
      header('Location:master_asuransi.php');
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
          <a href="master_asuransi.php">Master Asuransi</a>
        </li>
        <li class="breadcrumb-item active">Form Update Asuransi</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Update Asuransi
     </div>
     <div class="card-body">
      <form action="master_asuransi_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Asuransi </td>
           <td width="500">
<?php 
if(!$sql){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql)){


?>
            <input type="text" name="id_asuransi" class="form-control" value="<?php echo$row['id_asuransi']; ?>" readonly>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Asuransi </td>
           <td width="500"><input type="text" name="nm_asuransi" class="form-control" value="<?php echo $row['nama_asuransi'];?>"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah  </td>
           <td width="500"><input  name="jumlah_asuransi" class="form-control"  value="<?php echo $row['jumlah_asuransi'] ; ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
         </tr>
<?php } ?>
          <tr>
           <td width="200"></td>
           <td width="500"> 
            <a href="master_asuransi.php"><button class="btn btn-default"> Cancel </button> </a>
            <button class="btn btn-primary" name="submit"> Update</button>
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
