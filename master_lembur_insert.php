<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query1 = "SELECT `gen_id` ('lembur_master') AS `gen_id`";
  $sql1 = mysqli_query($link,$query1);

  if(isset($_POST['submit'])){
    $id_lembur = $_POST['id_lembur'];
    $nm_lembur = $_POST['nm_lembur'];
    $jumlah_lembur = str_replace('.','',$_POST['jumlah_lembur']);
    $status = $_POST['status'];

    if(insert_master_lembur($id_lembur,$nm_lembur,$jumlah_lembur,$status)){
      header('Location:master_lembur.php');
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
          <a href="master_lembur.php">Master Lembur</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Lembur</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Asuransi
     </div>
     <div class="card-body">
      <form action="master_lembur_insert.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Lembur </td>
           <td width="500">
<?php 
if(!$sql1){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql1)){


?>
            <input type="text" name="id_lembur" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
<?php } ?>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Lembur </td>
           <td width="500"><input type="text" name="nm_lembur" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah  </td>
           <td width="500"><input type="text" name="jumlah_lembur" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
         </tr>
          <tr>
           <td width="200"> Status </td>
           <td width="500"><select name="status" class="form-control">
<?php foreach (get_status() as $row) {?>
             <option value="<?php echo $row['id_status']; ?>"> <?php echo $row['nama_status']; ?></option>
<?php } ?>
           </select></td>
         </tr>
          <tr>
           <td width="200"></td>
           <td width="500"> 
            <a href="master_lembur.php"><button class="btn btn-default"> Cancel </button> </a>
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
