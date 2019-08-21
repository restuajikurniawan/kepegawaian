<!DOCTYPE html>
<html lang="en">
<?php  require_once "core/init.php" ;
    global $link;
    if(isset($_POST['submit'])){
      $id_user = $_SESSION['username'];
      $id_gaji = $_POST['id_gaji'];
      $status = $_POST['status'];
      $bagian = $_POST['bagian'];
      $nama_gaji = $_POST['nama_gaji'];
      $pendidikan = $_POST['pendidikan'];
      $jumlah_gaji = str_replace('.','',$_POST['jumlah_gaji']);
      // die($jumlah_gaji);
      if(insert_master_gaji($id_user,$id_gaji,$status,$bagian,$nama_gaji,$jumlah_gaji,$pendidikan)){

            ?> <script type="text/javascript">
        alert('Insert berhasil');
              </script>
      <?php
      header('Location:master_gaji_pokok.php');
    }else{

      ?> <script type="text/javascript">
        alert('Insert Gagal');
      </script>
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
          <a href="master_gaji_pokok.php">Master Gaji Pokok</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Gaji Pokok</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Gaji Pokok
     </div>
     <div class="card-body">
      <form action="master_gaji_pokok_insert.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Gaji </td>
           <td width="500">
              <?php
               foreach (get_id_gp() as $key ) {  ?>
            <input type="text" name="id_gaji" class="form-control" value="<?php echo$key['gen_id'] ;?>" readonly></td>
          <?php } ?>
         </tr>
                  </tr>
          <tr>
           <td width="200"> Status Pegawai </td>
           <td width="500">
            <select class="form-control" id="status" name="status">
             <option value="">--Pilih Status Pegawai--</option>
                <?php foreach (select_status_pegawai() as $key) { ?>
                <option value="<?php echo $key['id_status']; ?>"> <?php echo $key['nama_status']; ?> </option>
              <?php }?>
           </select>
         </td>
         </tr>
         <tr>
           <td width="200"> Pendidikan Pegawai </td>
           <td width="500">
            <select class="form-control" id="pendidikan" name="pendidikan">
             <option value="">--Pilih Pendidikan--</option>
                <?php foreach (select_pendidikan() as $key) { ?>
                <option value="<?php echo $key['id_pend']; ?>"> <?php echo $key['nama_pend']; ?> </option>
              <?php }?>
           </select>
         </td>
         </tr>
          <tr>
           <td width="200"> Bagian  </td>
           <td width="500">
            <select class="form-control" id="bagian" name="bagian">
             <option value="">--Pilih Bagian--</option>
                <?php foreach (select_bagian() as $key2) { ?>
                <option value="<?php echo $key2['id_bagian']; ?>"> <?php echo $key2['nama_bagian']; ?> </option>
              <?php }?>
           </select>
         </td>
         </tr>
          <tr>
           <td width="200"> Nama Gaji </td>
           <td width="500"><input type="text" name="nama_gaji" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah</td>
           <td width="500"><input type="text" name="jumlah_gaji" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
         </tr>
          <tr>
           <td width="200"></td>
           <td width="500"> 
            <a href="master_gaji_pokok.php"><input type="button" name="cancel" value="cancel" class="btn btn-default"></a>
            <button class="btn btn-primary" name="submit"> Create </button>
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
      // $('#jabatan').on('change',function(){
      //     var nm_jabatan = $('#jabatan option:selected').text();
      //     $('#nm_jabatan').val(nm_jabatan);
      // })
    </script>

    
  </div>
</body>

</html>
