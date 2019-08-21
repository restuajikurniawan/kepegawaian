<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 

  if(isset($_POST['submit'])){
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if(register_user($id_user,$nama_user,$password,$level)){
      header('Location:user.php');
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
          <a href="user.php">User</a>
        </li>
        <li class="breadcrumb-item active">Form Insert User</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert User
     </div>
     <div class="card-body">
      <form action="user_insert.php" method="post">
       <table>
         <tr>
           <td width="200">Id Divisi</td>
           <td width="500">
          <select name="id_user" class="form-control">
<?php foreach (read_pegawai() as $row ){ ?>
            <option value="<?php echo $row['id_karyawan']?>"><?php echo $row['id_karyawan'] ?> - <?php echo $row['nama_karyawan'] ?></option>
<?php } ?>
          </select>
          </td>
         </tr>
          <tr>
           <td width="200">Nama User</td>
           <td width="500"><input type="text" name="nama_user" class="form-control"></td>
         </tr>
          <tr>
           <td width="200">Password</td>
           <td width="500"><input type="text" name="password" class="form-control"></td>
         </tr>
          <tr>
           <td width="200">Level</td>
           <td width="500">
             <select name="level" class="form-control">
               <option value="HRD">HRD</option>
               <option value="PERSONALIA">PERSONALIA</option>
               <option value="KEUANGAN">KEUANGAN</option>
               <option value="KEPALA DIVISI">KEPALA DIVISI</option>
             </select>
           </td>
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
