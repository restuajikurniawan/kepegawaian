<!DOCTYPE html>
<html lang="en">
<?php  require_once "core/init.php"; 
  $id = $_GET['id'];

  read_peg_byid($id);

  if(isset($_POST['submit'])){
    $id_pegawai = $_POST['id_pegawai'];
    $nip = $_POST['nip'];
    $nm_pegawai = $_POST['nm_pegawai'];
    $jk = $_POST['jk'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $stts_pernikahan = $_POST['stts_pernikahan'];
    $jml_anak = $_POST['jml_anak'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $no_npwp = $_POST['no_npwp'];
    $pend_pegawai = $_POST['pend_pegawai'];
    $divisi = $_POST['divisi'];
    $jabatan = $_POST['jabatan'];
    $id_status = $_POST['id_status'];
    $a_koperasi = $_POST['a_koperasi'];

    if(update_master_pegawai($id_pegawai,$nip,$nm_pegawai,$jk,$tmp_lahir,$tgl_lahir,$agama,$alamat,$no_tlp,$stts_pernikahan,$jml_anak,$tgl_masuk,$no_npwp,$pend_pegawai,$divisi,$jabatan,$id_status,$a_koperasi)){
      header('Location:master_pegawai.php');
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
          <a href="master_potongan.php">Master Pegawai</a>
        </li>
        <li class="breadcrumb-item active">Update Insert Pegawai</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Update Insert Pegawai
     </div>
     <div class="card-body">
      <form action="master_pegawai_insert.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Pegawai </td>
           <td width="500">
<?php 
foreach(read_peg_byid($id) as $row) {
?>
            <input type="text" name="id_pegawai" class="form-control" value="<?php echo$row['id_karyawan']; ?>" readonly>

          </td>
         </tr>
          <tr>
           <td width="200"> NIP </td>
           <td width="500"><input type="text" name="nip" class="form-control" value="<?php echo$row['nip']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"><input type="text" name="nm_pegawai" class="form-control" value="<?php echo$row['nama_karyawan']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Jenis Kelamin </td>
           <td width="500">
             <select class="form-control" name="jk">
               <option value="L"> Laki - Laki </option>
               <option value="P"> Perempuan </option>
             </select>
           </td>
         </tr>
          <tr>
           <td width="200"> Tempat Lahir</td>
           <td width="500"><input type="text" name="tmp_lahir" class="form-control" value="<?php echo$row['tmpt_lahir']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Tanggal Lahir</td>
           <td width="500"><input type="date" name="tgl_lahir" class="form-control" value="<?php echo$row['tgl_lahir']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Agama</td>
           <td width="500"><input type="text" name="agama" class="form-control" value="<?php echo$row['agama']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Alamat</td>
           <td width="500"><input type="text" name="alamat" class="form-control" value="<?php echo$row['alamat']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> No Telpon </td>
           <td width="500"><input type="text" name="no_tlp" class="form-control" value="<?php echo$row['no_telpn']; ?>"></td>
         </tr>
         <tr>
           <td width="200"> Status Pernikahan </td>
           <td width="500">
            <select class="form-control" name="stts_pernikahan">
              <option value="1"> Menikah </option>
              <option value="0"> Belum Menikah </option>
            </select>
            </td>
         </tr>
          <tr>
           <td width="200"> Jumlah Anak </td>
           <td width="500"><input type="text" name="jml_anak" class="form-control" value="<?php echo$row['jml_anak']; ?>"></td>
         </tr>
          <tr>
           <td width="200"> Tanggal Masuk </td>
           <td width="500"><input type="date" name="tgl_masuk" class="form-control" value="<?php echo$row['tgl_masuk']; ?>"></td>
         </tr>
         <tr>
           <td width="200"> No NPWP </td>
           <td width="500"><input type="text" name="no_npwp" class="form-control" value="<?php echo$row['no_npwp']; ?>"></td>
         </tr>
         <tr>
           <td width="200"> Pendidikan Terakhir </td>
           <td width="500"> 
            <select class="form-control" name="pend_pegawai">
<?php foreach (pend_pegawai() as $key) { ?>
             <option value="<?php echo $key['id_pend'] ?>"> <?php echo $key['nama_pend'] ?></option>
<?php } ?>
           </select></td>
         </tr>
         <tr>
           <td width="200"> Status Pegawai </td>
           <td width="500"> <select name="id_status" class="form-control">
<?php foreach (select_status() as $key) { ?>
             <option value="<?php echo $key['id_status'] ?>"> <?php echo $key['nama_status'] ?></option>
<?php } ?>
           </select></td>
         </tr>
          <tr>
           <td width="200"> Divisi  </td>
           <td width="500"> <select class="form-control" name="divisi">
<?php foreach (divisi_pegawai() as $key) { ?>
             <option value="<?php echo $key['id_bagian'] ?>"> <?php echo $key['nama_bagian'] ?></option>
<?php } ?>
           </select>
             
           </td>
         </tr>
          <tr>
           <td width="200"> Jabatan </td>
           <td width="500"> <select class="form-control" name="jabatan">
<?php foreach (jabatan() as $key) { ?>
             <option value="<?php echo $key['id_jabatan'] ?>"> <?php echo $key['nama_jabatan'] ?></option>
<?php } ?>
           </select>
           </td>
         </tr>
         <tr>
           <td width="200"> Anggota Koperasi </td>
           <td width="500"><select class="form-control" name="a_koperasi">
             <option value="1"> Anggota </option>
             <option value="0"> Tidak Anggota </option>
           </select></td>
         </tr>
<?php } ?>
          <tr>
           <td width="200"></td>
           <td width="500"> 
            <a href="master_pegawai.php"><button class="btn btn-default"> Cancel </button> </a>
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
