<!DOCTYPE html>
<html lang="en">
<?php  require_once "core/init.php" ;
    global $link;
    $id = $_GET['id'];

    $query = "SELECT * FROM `master_gaji_pokok` JOIN `master_status` ON master_status.id_status = master_gaji_pokok.id_status WHERE id_master_gaji = '$id' ";
    $sql = mysqli_query($link,$query);

    if(isset($_POST['submit'])){
      $id_gaji = $_POST['id_gaji'];
      // $status = $_POST['status'];
      $nama_gaji = $_POST['nama_gaji'];
      $jumlah_gaji = str_replace('.', '',$_POST['jumlah_gaji']);

      if(update_master_gaji_pokok($id_gaji,$nama_gaji,$jumlah_gaji)){
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
      <form action="master_gaji_pokok_update.php" method="post">
       <table>
         <tr>
           <td width="200"> Id Gaji </td>
           <td width="500">
              <?php
                if(!$sql){
                  die('SQL Error :'.mysqli_eror($link));
                }
                while ($row = mysqli_fetch_array($sql)) {
                  # code...
                
                ?>
            <input type="text" name="id_gaji" class="form-control" value="<?php echo$row['id_master_gaji'] ;?>" readonly></td>
         
         </tr>
                  </tr>
          <tr>
           <td width="200"> Status </td>
           <td width="500"><select class="form-control" id="status" name="status" disabled="true">
                <option value="<?php echo $row['id_status']; ?>"> <?php echo $row['nama_status'];?> </option>
                         </select>
         </td>
         </tr>
          <tr>
           <td width="200"> Nama Gaji </td>
           <td width="500"><input type="text" name="nama_gaji" class="form-control"  value="<?php echo $row['nama_gaji']?>"></td>
         </tr>
          <tr>
           <td width="200"> Jumlah Gaji </td>
           <td width="500"><input type="text" name="jumlah_gaji" class="form-control"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo $row['jml_gaji_pokok']?>"></td>
         </tr>
         <?php }?>

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
      $('document').ready(function(){
        var jbtn = $('#status').val();
          console.log(jbtn);
          $('#id_status').val(jbtn);
      })
    </script>
  </div>
</body>

</html>
