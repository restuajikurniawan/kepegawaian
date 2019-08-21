<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $id = $_GET['id'];
  $query1 = " SELECT * FROM master_hariraya WHERE id_bulan = '$id'";
  $sql1 = mysqli_query($link,$query1);

  if(isset($_POST['submit'])){
    $id_bulan = $_POST['id_bulan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    if(update_master_hariraya($id_bulan,$bulan,$tahun)){
      header('Location:master_hariraya.php');
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
          <a href="master_potongan.php">Master HariRaya</a>
        </li>
        <li class="breadcrumb-item active">Form Update HariRaya</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert HariRaya
     </div>
     <div class="card-body">
      <form action="master_hariraya_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Bulan </td>
           <td width="500">
<?php 
if(!$sql1){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql1)){


?>
            <input type="text" name="id_bulan" class="form-control" value="<?php echo$row['id_bulan']; ?>" readonly>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Bulan </td>
           <td width="500"> <select name="bulan" class="form-control">
             <option value="1"> Januari </option>
             <option value="2"> Februari </option>
             <option value="3"> Maret </option>
             <option value="4"> April </option>
             <option value="5"> Mei </option>
             <option value="6"> Juni </option>
             <option value="7"> Juli </option>
             <option value="8"> Agustus </option>
             <option value="9"> September </option>
             <option value="10"> Oktober </option>
             <option value="11"> November </option>
             <option value="12"> Desember </option>
           </select></td>
         </tr>
          <tr>
           <td width="200"> Tahun  </td>
           <td width="500"><input type="text" name="tahun" class="form-control" value="<?php echo $row['tahun']; ?>"></td>
<?php } ?>
         </tr>
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
