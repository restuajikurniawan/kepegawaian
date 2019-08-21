<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query = "SELECT `gen_id` ('ID_DINAS') AS `gen_id`";
  $sql = mysqli_query($link,$query);

  $query2 = "SELECT * FROM karyawan";
  $sql2 = mysqli_query($link,$query2);
  if(isset($_POST['submit'])){
    $id_dinas = $_POST['id_dinas'];
    $id_karyawan = $_POST['pegawai'];
    $tujuan_dinas = $_POST['tujuan_dinas'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $tgl_pulang = $_POST['tgl_pulang'];
    $j_pengeluaran = str_replace('.', '',$_POST['jumlah']);

    $extendsi = explode(".", $_FILES['surat_dinas']['name']);
    $gbr_surat = $id_karyawan."_".$tgl_berangkat.".".end($extendsi);
    $sumber = $_FILES['surat_dinas']['tmp_name'];
    $upload = move_uploaded_file($sumber, "image/surat_dinas/".$gbr_surat);

    if($upload){
            insert_dinas($id_dinas,$id_karyawan,$tgl_berangkat,$tgl_pulang,$j_pengeluaran,$tujuan_dinas);
            upload_surat_dinas($id_dinas,$gbr_surat);
                header('Location:perjalanan_dinas.php');
          
    }else{
        ?>
        <script type="text/javascript"> alert('Upload Gagal');</script><?php
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
          <a href="perjalanan_dinas.php">Perjalanan Dinas</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Perjalanan Dinas</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Perjalanan Dinas
     </div>
     <div class="card-body">
      <form action="perjalanan_dinas_insert.php" method="post" enctype="multipart/form-data">
       <table>
         <tr>
           <td width="200"> Id Perjalanan dinas </td>
           <td width="500">
<?php while($row = mysqli_fetch_array($sql)){ ?>
            <input type="text" name="id_dinas" class="form-control" value="<?php echo $row['gen_id']?>" readonly>
<?php } ?>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"><select class="form-control" name="pegawai">
             <option>--SELECT--</option>
<?php while($row = mysqli_fetch_array($sql2)){ ?>

             <option value="<?php echo $row['id_karyawan']?>"> <?php echo $row['id_karyawan'].' - '.$row['nama_karyawan']; ?> </option>
<?php } ?>
           </select> 
           <input type="hidden" name="jabatan" id="jabatan">
         </td>
         </tr>
         <tr>
           <td width="200">Tujuan Dinas</td>
           <td width="500"><input type="text" name="tujuan_dinas" id="gaji_pokok" class="form-control"></td>
         </tr>
         <tr>
           <td width="200">Tgl Berangkat</td>
           <td width="500"><input type="date" name="tgl_berangkat" id="pengeluaran" class="form-control"></td>
         </tr>
         <tr>
           <td width="200">Tgl Pulang</td>
           <td width="500"><input type="date" name="tgl_pulang" id="pengeluaran" class="form-control"></td>
         </tr>
         <tr>
          <td> Jumlah Pengeluaran</td>
            <td width="500"><input type="text" name="jumlah" class="form-control"></td>
         </tr>
                  <tr>
           <td width="200">Lampiran Surat Dinas </td>
           <td width="500"><input type="file" name="surat_dinas" class="form-control"></td>
         </tr>
       </table>
          <button class="btn btn-default">Cancel</button>
          <button class="btn btn-primary" name="submit">Create</button>

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
