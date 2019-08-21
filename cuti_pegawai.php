<!DOCTYPE html>
<html lang="en">
<?php  require_once "core/init.php"; 

  if(isset($_POST['submit'])){
    $id_absensi = $_POST['id_absensi'];
    $id_pegawai = $_POST['id_pegawai'];
    $tgl_absensi = $_POST['tgl_absensi'];
    $keterangan = $_POST['keterangan'];

        if($keterangan == 'SAKIT' or $keterangan == 'CUTI'){

              $extendsi = explode(".", $_FILES['surat']['name']);
              $gbr_surat = $id_pegawai."_".$tgl_absensi.".".end($extendsi);
              $sumber = $_FILES['surat']['tmp_name'];
              $upload = move_uploaded_file($sumber, "image/surat_izin/".$gbr_surat);

            if($upload){
                  if(insert_cuti_absensi($id_absensi,$id_pegawai,$tgl_absensi,$keterangan)&&upload_surat($id_absensi,$gbr_surat)){
                      header('Location:master_absensi.php');
                  }else{
                      ?>
                        <script type="text/javascript"> alert('Insert Gagal');</script> 
                      <?php
                  }
            }else{
              ?>
                <script type="text/javascript"> alert('Upload Gagal');</script> 
              <?php
            }
        }elseif ($keterangan =='ALPHA') {
            insert_cuti_absensi($id_absensi,$id_pegawai,$tgl_absensi,$keterangan);
            header('Location:master_absensi.php');
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
          <a href="master_absensi.php">Master Absensi</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Master Absensi</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Absensi
     </div>
     <div class="card-body">
      <form action="cuti_pegawai.php" method="post" enctype="multipart/form-data">
       <table>
         <tr>
           <td width="200">Id Absensi</td>
           <td width="500">
<?php 
foreach (get_id_absensi() as $row ){ ?>
            <input type="text" name="id_absensi" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
          </td>
         </tr>
<?php } ?>
          <tr>
           <td width="200"> Pegawai </td>
           <td width="500"> <select class="form-control" name="id_pegawai">
             <option value="">--Select Pegawai--</option>
<?php foreach(get_pegawai() as $key){ ?>
             <option value="<?php echo $key['id_karyawan'] ?>"><?php echo $key['nama_karyawan']; ?></option>
<?php } ?>
           </select></td>
         </tr>
         <tr>
           <td width="200"> Tanggal </td>
           <td width="500"><input type="date" name="tgl_absensi" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Keterangan </td>
           <td width="500"><select name="keterangan" class="form-control"> 
            <option value="">--Select Keterangan--</option>
            <option>CUTI</option>
            <option>SAKIT</option>
            <option>ALPHA</option>
           </select></td>
         </tr>
         <tr>
           <td width="200">Lampiran Surat </td>
           <td width="500"><input type="file" name="surat" class="form-control"></td>
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
