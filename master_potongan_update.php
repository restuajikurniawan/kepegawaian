<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $id = $_GET['id'];
  $query1 = "SELECT * FROM `master_potongan` WHERE id_potongan ='$id'";
  $sql1 = mysqli_query($link,$query1);

  if(isset($_POST['submit'])){
    $id_potongan = $_POST['id_potongan'];
    $nm_potongan = $_POST['nm_potongan'];
    $jumlah_potongan = str_replace('.','',$_POST['jumlah_potongan']);

    if(update_master_potongan($id_potongan,$nm_potongan,$jumlah_potongan)){
      header('Location:master_potongan.php');
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
          <a href="master_potongan.php">Master Potongan</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Potongan</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Potongan
     </div>
     <div class="card-body">
      <form action="master_potongan_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Potongan </td>
           <td width="500">
<?php 
if(!$sql1){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql1)){


?>
            <input type="text" name="id_potongan" class="form-control" value="<?php echo$row['id_potongan']; ?>">

          </td>
         </tr>
          <tr>
           <td width="200"> Nama Potongan </td>
           <td width="500"><input type="text" name="nm_potongan" class="form-control" value="<?php echo $row['nama_potongan'];?>"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah  </td>
           <td width="500"><input type="text" name="jumlah_potongan" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo number_format($row['jumlah_potongan'],0,".",".");?>"></td>
         </tr>
          <tr>
           <td width="200"></td>
<?php } ?>
           <td width="500"> 
            <button class="btn btn-default"> Cancel </button> 
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
