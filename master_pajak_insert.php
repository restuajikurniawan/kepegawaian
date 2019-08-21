<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query1 = "SELECT `gen_id` ('ID_PAJAK') AS `gen_id`";
  $sql1 = mysqli_query($link,$query1);

  if(isset($_POST['submit'])){
    $id_pajak = $_POST['id_pajak'];
    $nm_pajak = $_POST['nm_pajak'];
    $jumlah_penghasilan = str_replace('.', '', $_POST['jumlah_penghasilan']);
    $jumlah_pajak = $_POST['jumlah_pajak']/100;
     // die($id_pajak.' '.$nm_pajak.' '.$jumlah_pajak.' '.$jumlah_penghasilan);

    if(insert_master_pajak($id_pajak,$nm_pajak,$jumlah_pajak,$jumlah_penghasilan)){
      header('Location:master_pajak.php');
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
          <a href="master_pajak.php">Master Pajak</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Pajak</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Pajak
     </div>
     <div class="card-body">
      <form action="master_pajak_insert.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Pajak </td>
           <td width="500">
<?php 
if(!$sql1){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql1)){


?>
            <input type="text" name="id_pajak" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
<?php } ?>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Pajak </td>
           <td width="500"><input type="text" name="nm_pajak" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah Penghasilan </td>
           <td width="500"><input name="jumlah_penghasilan" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah Pajak (%) </td>
           <td width="500"><input name="jumlah_pajak" class="form-control" type="number" ></td>
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
