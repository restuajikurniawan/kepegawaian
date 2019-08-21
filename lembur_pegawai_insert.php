<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query1 = "SELECT `gen_id` ('ID_LEMBUR') AS `gen_id`";
  $sql1 = mysqli_query($link,$query1);

  $query2 = "SELECT * FROM karyawan";
  $sql2 = mysqli_query($link,$query2);

  if(isset($_POST['submit'])){
    $id_lembur = $_POST['id_lembur'];
    $id_pegawai= $_POST['id_pegawai'];
    $tgl_lembur = $_POST['tgl_lembur'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $keterangan = $_POST['keterangan'];

// die($jam_mulai.' '.$jam_selesai);
    if(insert_lembur_pegawai($id_lembur,$id_pegawai,$tgl_lembur,$jam_mulai,$jam_selesai,$keterangan)){
      header('Location:lembur_pegawai.php');
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
          <a href="lembur_pegawai.php">Lembur Pegawai</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Lembur</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Lembur
     </div>
     <div class="card-body">
      <form action="lembur_pegawai_insert.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Asuransi </td>
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
           <td width="200"> Nama Pegawai </td>
           <td width="500">
             <select class="form-control" name="id_pegawai">
<?php 
    if(!$sql2){
      die('SQL Error :'.mysqli_eror($link));
    }
while($row = mysqli_fetch_array($sql2)){

              ?>
               <option value="<?php echo $row['id_karyawan'] ?>"> <?php echo $row['nama_karyawan'] ?></option>
<?php } ?>
             </select>
           </td>
         </tr>
          <tr>
           <td width="200"> Tanggal  </td>
           <td width="500"><input type="date" name="tgl_lembur" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Jam Mulai  </td>
           <td width="500"><input type="time" name="jam_mulai" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Jam Selesai  </td>
           <td width="500"><input type="time" name="jam_selesai" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Keterangan </td>
           <td width="500"><input type="text" name="keterangan" class="form-control"></td>
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
