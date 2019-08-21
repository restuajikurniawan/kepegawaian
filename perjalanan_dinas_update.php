<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $id = $_GET['id'];
  // $tgl_now = date('Y-m-d');
  // $tgl = date('Y-m-d', strtotime('+6 month', strtotime( $tgl_now ))); //tambah tanggal sebanyak 6 bulan
  // die($tgl_now.' '.$tgl);
  $query = "SELECT * FROM `perjalanan_dinas` INNER JOIN karyawan ON perjalanan_dinas.id_pegawai = karyawan.id_karyawan WHERE id_dinas = '$id' ";
  $sql = mysqli_query($link,$query);

  if(isset($_POST['submit'])){
    $id_dinas = $_POST['id_dinas'];
    $status = $_POST['status'];

    if(update_dinas($id_dinas,$status)){
       header('Location:perjalanan_dinas.php');
    }else{
      ?>
       <script type="text/javascript"> alert('Update Gagal');</script> 
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
          <a href="gaji_pegawai.php">Perjalanan Dinas</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Perjalanan Dinas</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Perjalanan Dinas
     </div>
     <div class="card-body">
      <form action="perjalanan_dinas_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Perjalanan dinas </td>
           <td width="500">
<?php while($row = mysqli_fetch_array($sql)){ ?>
            <input type="text" name="id_dinas" class="form-control" value="<?php echo $row['id_dinas']?>" readonly>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"> <input type="text" name="id_karyawan" value="<?php echo $row['nama_karyawan'] ?>" class="form-control" readonly>
         </td>
         </tr>
         <tr>
           <td width="200">Tujuan Dinas</td>
           <td width="500"><input type="text" name="tujuan_dinas" value="<?php echo $row['keterangan'] ?>" class="form-control" readonly></td>
         </tr>
         <tr>
           <td width="200"> Status</td>
           <td width="500"><select class="form-control" name="status">
             <option value="1"> Sudah</option>
             <option value="0"> Belum</option>
           </select> </td>
         </tr>
<?php } ?>
       </table>
          <button class="btn btn-default">Cancel</button>
          <button class="btn btn-primary" name="submit">Update</button>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  </div>
</body>

</html>
