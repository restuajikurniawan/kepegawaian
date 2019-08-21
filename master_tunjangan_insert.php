<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query1 = "SELECT `gen_id` ('ID_TNJNGN') AS `gen_id`";
  $sql1 = mysqli_query($link,$query1);

  $query2 = "SELECT * FROM jabatan_pegawai ";
  $sql2 = mysqli_query($link,$query2);

  if(isset($_POST['submit'])){
    $id_tunjangan = $_POST['id_tunjangan'];
    $nm_tunjangan = $_POST['nm_tunjangan'];
    $jumlah_tunjangan = str_replace('.','',$_POST['jumlah']);
    $id_jabatan = $_POST['id_jabatan'];
    $status = $_POST['status'];

    if(insert_master_tunjangan($id_tunjangan,$nm_tunjangan,$jumlah_tunjangan,$id_jabatan,$status)){
      header('Location:master_tunjangan.php');
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
          <a href="master_tunjangan.php">Master Tunjangan</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Tunjangan</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Tunjangan
     </div>
     <div class="card-body">
      <form action="master_tunjangan_insert.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Tunjangan </td>
           <td width="500">
<?php 
if(!$sql1){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql1)){


?>
            <input type="text" name="id_tunjangan" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
<?php } ?>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Tunjangan </td>
           <td width="500"><input type="text" name="nm_tunjangan" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Id Jabatan </td>
           <td width="500"><select class="form-control" name="id_jabatan">
             
<?php
if(!$sql2){
  die('SQL Error :'.mysql_eror($link));
  }
  while ($row = mysqli_fetch_array($sql2)) {
?>
            <option value="<?php echo $row['id_jabatan']?>"> <?php echo $row['nama_jabatan'] ?></option>
<?php } ?>
           </select>
</td>
         </tr>
         <tr>
          <td>Kategori Tunjangan </td>
          <td> <select class="form-control" name="status">
            <option value="1"> Tunjangan Jabatan </option>
            <option value="2"> Tunjangan Istri</option>
            <option value="3"> Tunjangan Anak 1 </option>
            <option value="4"> Tunjangan Anak 2 </option>
          </select>
          </td>
         </tr>
          <tr>
           <td width="200"> Jumlah  </td>
           <td width="500"><input type="text" name="jumlah" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
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
