<!DOCTYPE html>
<html lang="en">
<?php  require_once "core/init.php"; 
    
   $id = $_GET['id'];
  if(isset($_POST['submit'])){
    $id_pegawai = $_POST['id_pegawai'];
    $id_status = $_POST['id_status'];
    $status = $_POST['nm_status'];
   

    if(update_pend_pegawai($id_pegawai,$id_status)){
      update_pend_jjk($id_pegawai,$status);
      header('Location:jenjang_karir.php');
    }else{
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
          <a href="jenjang_karir.php">Jenjang Karir</a>
        </li>
        <li class="breadcrumb-item active">Update pendidikan pegawai</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Update pendidikan Pegawai
     </div>
     <div class="card-body">
      <form action="jenjang_karir_update_pend.php" method="post">
       <table>
<?php 
foreach(read_peg_byid($id) as $row) {
?>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"><input type="text" name="nm_pegawai" class="form-control" value="<?php echo$row['nama_karyawan']; ?>" readonly></td>
         </tr>
         <tr>
           <td width="200"> pendidikan Pegawai </td>
           <td width="500"><input type="text" name="stts_lama" class="form-control" value="<?php echo$row['nama_pend']; ?>" readonly>
            <input type="text" name="id_status" value="<?php echo $row['id_pend']; ?>">
            <input type="text" name="nm_status">
            <input type="text" name="id_pegawai" value="<?php echo $row['id_karyawan']; ?>">
           </td>
         </tr>
<?php } ?>
          <tr>
           <td width="200">Ubah Pendidikan </td>
           <td width="500"> 
            <select class="form-control" name="status">
              <option>--SELECT--</option>
<?php foreach (pend_pegawai() as $key) { ?>
             <option value="<?php echo $key['id_pend'] ?>"> <?php echo $key['nama_pend'] ?></option>
<?php } ?>
           </select>
        <input type="hidden" name="pend" id="pend">
         </td>
         </tr>
          <tr>
           <td width="200"></td>
           <td width="500">
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
    <script type="text/javascript">
      $('[name="status"]').on('change', function(){
        var id_status = $('[name="status"]').val();
        var nm_status = $('[name="status"] option:selected').text();

        $('[name="id_status"]').val(id_status);
        $('[name="nm_status"]').val(nm_status);
      })
    </script>
  </div>
</body>

</html>
