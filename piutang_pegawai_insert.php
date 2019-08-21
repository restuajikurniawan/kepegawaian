<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query = "SELECT `gen_id` ('ID_UTANG_PG') AS `gen_id`";
  $sql = mysqli_query($link,$query);
  
  $query2 = "SELECT * FROM `karyawan`";
  $sql2 = mysqli_query($link,$query2);

  if(isset($_POST['submit'])){
    $id_piutang = $_POST['id_piutang'];
    $id_pegawai = $_POST['pegawai'];
    $j_pinjam = str_replace('.','',$_POST['pinjaman']);
    $cicilan = $_POST['cicilan'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    if($cicilan <= '20'){
            if($j_pinjam <= '10000001'){
      if(insert_piutang_pegawai($id_piutang,$id_pegawai,$j_pinjam,$cicilan,$tanggal,$keterangan)){
       header('Location:piutang_pegawai.php');
    }else{
      echo'gagal ada kesalahan';
    }
  }else{
    ?>
    <script type="text/javascript">
        alert('Jumlah Pinjaman Tidak Boleh lebih dari 10 Juta');
              </script> <?php
  }
    }else{
        ?>
    <script type="text/javascript">
        alert('Jumlah cicilan Tidak Boleh lebih dari 20x');
              </script> <?php
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
          <a href="piutang_pegawai.php">Utang Pegawai</a>
        </li>
        <li class="breadcrumb-item active"><a href="piutang_pegawai.php">Form Insert Utang Pegawai</a></li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Utang Pegawai
     </div>
     <div class="card-body">
      <form action="piutang_pegawai_insert.php" method="post">
       <table>
        
         <tr>
           <td width="200"> Id Utang </td>
           <td width="500">
<?php while($row = mysqli_fetch_array($sql)){
 ?>
            <input type="text" name="id_piutang" class="form-control" value="<?php echo $row['gen_id']?>" readonly>
<?php } ?>
          </td>
         </tr>
         <tr> 
          <td>tanggal </td>
          <td> <input type="date"  class="form-control" name="tanggal"></td>
        </tr>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"><select class="form-control" id="pegawai" name="pegawai">
             <option>--SELECT--</option>
<?php while($row = mysqli_fetch_array($sql2)){
?>
             <option value="<?php echo $row['id_karyawan']; ?>"><?php echo $row['id_karyawan'];?> - <?php echo $row['nama_karyawan'];?></option>
<?php } ?>
           </select> 
         </td>
         </tr>
         <tr>
           <td width="200">Jumlah Pinjaman</td>
           <td width="500"><input type="text" name="pinjaman" id="pinjaman" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
         </tr>
         <tr>
          <td> Jumlah cicilan </td>
            <td width="500"><input type="text" name="cicilan" id="cicilan" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
         </tr>
         <tr>
          <td> Keterangan </td>
            <td width="500"><input type="text" name="keterangan" id="keterangan" class="form-control"></td>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
          $('#bunga').keyup(function(){
            var bunga = $('#bunga').val();
            var pinjaman = $('#pinjaman').val();
            var pinjaman2 = myParse(pinjaman);
            var t_bunga = (bunga/100)*pinjaman2;
            var t_pjm = pinjaman2 + t_bunga;
              $('#t_pinjaman').val(t_pjm);
          })
          $('#cicilan').keyup(function(){
            var t_pjm = $('#t_pinjaman').val();
            var ccl = $('#cicilan').val();
            var t_ccl = t_pjm/ccl;
            var t_ccl = Math.ceil(t_ccl);
            console.log(t_pjm,ccl, t_ccl);
            $('#total_cicil').val(t_ccl);


          })
    </script>
    <script type="text/javascript">
      function myParse(num) {
  var n2 = num.split(".")
  out = 0
  for(var i = 0; i < n2.length; i++) {
    out *= 1000;
    out += parseFloat(n2[i])
  }
  return out
}
    </script>

  </div>
</body>

</html>
