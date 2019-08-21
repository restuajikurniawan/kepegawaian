<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/core/init.php"); ?>
<?php
  if( !isset($_SESSION['username']) ){
  // $_SESSION['msg'] = 'login dulu  !';
  header('Location:login.php');
}
?>
<?php if( $_SESSION['level'] != 'HRD'){ 
 header('Location:index.php');
  } ?>
<?php  
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
    $id_rfid = $_POST['id_rfid'];

    $status = $_POST['status'];
    $pend = $_POST['pend'];
    $nm_divisi = $_POST['nm_divisi'];
    $nm_jabatan = $_POST['nm_jabatan'];

    $extendsi = explode(".", $_FILES['foto_pegawai']['name']);
    $gbr_pgw = $id_pegawai.".".end($extendsi);
    $sumber = $_FILES['foto_pegawai']['tmp_name'];
    $upload = move_uploaded_file($sumber, "image/foto_pegawai/".$gbr_pgw);

    if($upload){
      insert_master_pegawai($id_pegawai,$nip,$nm_pegawai,$jk,$tmp_lahir,$tgl_lahir,$agama,$alamat,$no_tlp,$stts_pernikahan,$jml_anak,$tgl_masuk,$no_npwp,$pend_pegawai,$divisi,$jabatan,$id_status,$a_koperasi,$id_rfid,$gbr_pgw);
      insert_jenjang_karir($id_pegawai,$status,$pend,$nm_jabatan,$nm_divisi);
      header('Location:master_pegawai.php');
    }
    else{
      ?>
       <script type="text/javascript"> alert('Insert Gagal');</script> 
      <?php
    }
  }

?>
<?php  require_once $_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/head.php"; ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/navigation.php" ; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="master_pegawai.php">Master Pegawai</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Pegawai</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Pegawai
     </div>
     <div class="card-body">
      <form action="master_pegawai_insert.php" method="post" enctype="multipart/form-data">
       <table>
         <tr>
           <td width="200"> Id Pegawai </td>
           <td width="500">
<?php 
foreach(get_id_kr() as $row) {
?>
            <input type="text" name="id_pegawai" class="form-control" value="<?php echo$row['gen_id']; ?>" readonly>
<?php } ?>
          </td>
         </tr>
          <tr>
           <td width="200"> NIP </td>
           <td width="500"><input type="text" name="nip" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"><input type="text" name="nm_pegawai" class="form-control"></td>
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
           <td width="500"><input type="text" name="tmp_lahir" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Tanggal Lahir</td>
           <td width="500"><input type="date" name="tgl_lahir" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Agama</td>
           <td width="500"><input type="text" name="agama" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Alamat</td>
           <td width="500"><input type="text" name="alamat" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> No Telpon </td>
           <td width="500"><input type="text" name="no_tlp" class="form-control"></td>
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
           <td width="500"><input type="text" name="jml_anak" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Tanggal Masuk </td>
           <td width="500"><input type="date" name="tgl_masuk" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> No NPWP </td>
           <td width="500"><input type="text" name="no_npwp" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Pendidikan Terakhir </td>
           <td width="500"> 
            <select class="form-control" name="pend_pegawai">
              <option>--SELECT--</option>
<?php foreach (pend_pegawai() as $key) { ?>
             <option value="<?php echo $key['id_pend'] ?>"> <?php echo $key['nama_pend'] ?></option>
<?php } ?>
           </select>
        <input type="hidden" name="pend" id="pend">
         </td>
         </tr>
         <tr>
           <td width="200"> Status Pegawai </td>
           <td width="500"> <select name="id_status" class="form-control">
            <option>--SELECT--</option>
<?php foreach (select_status() as $key) { ?>
             <option value="<?php echo $key['id_status'] ?>"> <?php echo $key['nama_status'] ?></option>
<?php } ?>
           </select>
           <input type="hidden" name="status" id="status">
         </td>
         </tr>
          <tr>
           <td width="200"> Divisi  </td>
           <td width="500"> <select class="form-control" name="divisi">
            <option>--SELECT--</option>
<?php foreach (divisi_pegawai() as $key) { ?>
             <option value="<?php echo $key['id_bagian'] ?>"> <?php echo $key['nama_bagian'] ?></option>
<?php } ?>
           </select>
             <input type="hidden" name="nm_divisi" id="nm_divisi">
           </td>
         </tr>
          <tr>
           <td width="200"> Jabatan </td>
           <td width="500"> <select class="form-control" name="jabatan">
            <option>--SELECT--</option>
<?php foreach (jabatan() as $key) { ?>
             <option value="<?php echo $key['id_jabatan'] ?>"> <?php echo $key['nama_jabatan'] ?></option>
<?php } ?>
           </select>
           <input type="hidden" name="nm_jabatan" id="nm_jabatan">
           </td>
         </tr>
         <tr>
           <td width="200"> Anggota Koperasi </td>
           <td width="500"><select class="form-control" name="a_koperasi">
             <option value="1"> Anggota </option>
             <option value="0"> Tidak Anggota </option>
           </select></td>
         </tr>
          <tr>
           <td width="200"> Foto Pegawai </td>
           <td width="500"> <input type="file" name="foto_pegawai" class="form-control"></td>
         </tr>
         <tr>
           <td width="200"> Id Rfid </td>
           <td width="500"> <input type="text" name="id_rfid" class="form-control"></td>
         </tr>
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
   <?php require_once $_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/footer.php"; ?>
    <!-- Scroll to Top Button-->
    
    <!-- Logout Modal-->
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/logout.php" ; ?>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo $siteurl; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $siteurl; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo $siteurl; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo $siteurl; ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo $siteurl; ?>/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo $siteurl; ?>/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo $siteurl; ?>/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo $siteurl; ?>/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo $siteurl; ?>/js/sb-admin-charts.min.js"></script>
    <script src="<?php echo $siteurl; ?>/js/number-format.js"></script>
    <script type="text/javascript">
      $('[name="id_status"]').on('change', function(){
        var status = $('[name="id_status"] option:selected').text();
        $('#status').val(status);
              })
            
      $('[name="pend_pegawai"]').on('change', function(){
        var pend = $('[name="pend_pegawai"] option:selected').text();
        $('#pend').val(pend);
              })

      $('[name="divisi"]').on('change', function(){
        var divisi = $('[name="divisi"] option:selected').text();
        $('#nm_divisi').val(divisi);
              })

      $('[name="jabatan"]').on('change', function(){
        var jabatan = $('[name="jabatan"] option:selected').text();
        $('#nm_jabatan').val(jabatan);
              })
    </script>

  </div>
</body>

</html>
