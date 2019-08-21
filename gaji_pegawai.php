<!DOCTYPE html>
<html lang="en">
  
<?php  require_once "core/init.php"; 
  global $link;
  $query = "SELECT `gen_id` ('ID_GAJI') AS `gen_id`";
  $sql = mysqli_query($link,$query);

  $query2 = "SELECT * FROM `pegawai`";
  $sql2 = mysqli_query($link,$query2);

  $query3 = "SELECT * FROM `master_tunjangan`";
  $sql3 = mysqli_query($link,$query3);

  $query4 = "SELECT * FROM `master_potongan`";
  $sql4 = mysqli_query($link,$query4);

  if(isset($_POST['submit'])){
    $id_gaji = $_POST['id_gaji'];
    $bulan = $_POST['bulan'];
    $id_pegawai = $_POST['pegawai'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $absen = $_POST['absen'];
    $jml_g_pokok = $_POST['g_pokok'];
    $pajak = $_POST['jumlah_pajak'];
    $total_gaji = $_POST['total_gaji'];
    $piutang = $_POST['piutang'];

    // die($id_gaji.'<br>'.$bulan.'<br>'.$id_pegawai.'<br>'.$gaji_pokok.'<br>'.$absen.'<br>'.$jml_g_pokok.'<br>'.$pajak.'<br>'.$total_gaji);
    if(insert_gaji_pegawai($id_gaji,$bulan,$id_pegawai,$gaji_pokok,$absen,$jml_g_pokok,$pajak,$total_gaji,$piutang)){
      ?>
      <script type="text/javascript">
        alert('insert berhasil');
      </script>
      <?php 
    }else{
      ?>
      <script type="text/javascript">
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
          <a href="gaji_pegawai.php">Gaji Pegawai</a>
        </li>
        <li class="breadcrumb-item active">Form Insert Gaji Pegawai</li>
      </ol>
     <div class="card mb3">
        <div class="card-header">
          Form Insert Gaji Pegawai
     </div>
     <div class="card-body">
      <form action="gaji_pegawai.php" method="post">
       <table>
        <tr> 
          <td>Bulan </td>
          <td> <input type="text"  class="form-control" name="bulan" value="<?php echo date("F Y");?>" readonly></td>
        </tr>
         <tr>
          <?php 
          if(!$sql){
  die('SQL Error :'.mysqli_eror($link));
}
while($row = mysqli_fetch_array($sql)){
          ?>
           <td width="200"> Id Gaji </td>
           <td width="500">

            <input type="text" name="id_gaji" class="form-control" value="<?php echo $row['gen_id']; ?>" readonly>
<?php } ?>
          </td>
         </tr>
          <tr>
           <td width="200"> Nama Pegawai </td>
           <td width="500"><select class="form-control" id="pegawai" name="pegawai">
             <option>--SELECT--</option>
<?php while($row = mysqli_fetch_array($sql2)){

  ?>
             <option value="<?php echo $row['id_pegawai']; ?>"> <?php echo $row['id_pegawai'];?> - <?php echo $row['nama_pegawai'];?></option>
<?php } ?>
           </select> 
           <input type="hidden" name="jabatan" id="jabatan">
         </td>
         </tr>
         <tr>
           <td width="200"> Gaji Pokok</td>
           <td width="500"><input type="text" name="gaji_pokok" id="gaji_pokok" class="form-control"></td>
         </tr>
          <tr>
           <td width="200"> Absensi</td>
           <td width="500"><input type="text" name="absen" id="absen" class="form-control"></td>
         </tr>
         <tr>
          <td> Jumlah Gaji Pokok </td>
            <td width="500"><input type="text" name="g_pokok" id="g_pokok" class="form-control"></td>
         </tr>
         <tr>
          <td> Tunjangan</td>
            <td width="500">
              <select id="tunjangan" class="form-control">
                <option>--SELECT--</option>
<?php while($row = mysqli_fetch_array($sql3)){
  ?>
                <option value="<?php echo $row['id_tunjangan']; ?>"><?php echo $row['nama_tunjangan'];?></option>
<?php } ?>
              </select>
            </td>
         </tr>
         <tr>
          <td> Potongan </td>
            <td width="500">
              <select class="form-control" id="potongan" name="potongan">
              <option>--SELECT--</option>
<?php while($row = mysqli_fetch_array($sql4)){ ?>
              <option value="<?php echo $row['id_potongan']; ?>"><?php echo $row['nama_potongan']; ?></option>
<?php } ?>
            </select>
          </td>
         </tr>
         <tr>
          <td> Piutang Pegawai </td>
            <td width="500">
              <input type="text" name="piutang" id="piutang" class="form-control"></td>
         </tr>
         <tr>
          <td> Pajak </td>
            <td width="500">
              <input type="hidden" name="pajak" id="pajak">
              <input type="text" name="jumlah_pajak" id="jumlah_pajak" class="form-control"></td>
         </tr>
         <tr>
          <td> Total Gaji</td>
            <td width="500"><input type="text" name="total_gaji" class="form-control" id="total_gaji"></td>
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
           $(document).ready(function(){
                $('#pegawai').select2();
                $('#tunjangan').select2();
                $('#potongan').select2();

                $.ajax({
                  url :"ajax/get_pajak.php",
                  method : "POST",
                  success : function(data){
                      $('#pajak').val(data);
                  }
                })
                 var jabatan = $('#jabatan').val();
                 console.log(jabatan);
          })
           $('#pegawai').on('change',function(){

              var id_pegawai = $('#pegawai').val();
               $.ajax({
                  url :"ajax/get_jabatan.php",
                  method : "POST",
                  data :{'id_pegawai' :id_pegawai},
                  success : function(data){
                    var id_jabatan = data;
                  $('#jabatan').val(id_jabatan);
                        $.ajax({
                          url :"ajax/get_piutang.php",
                  method : "POST",
                  data :{'id_pegawai' :id_pegawai},
                  success : function(data){
                    var piutang = data;
                    if(piutang != ''){
                    $('#piutang').val(piutang);
                    }else{
                      $('#piutang').val('0');
                    }
                  
                        $.ajax({
                            url :"ajax/get_gaji_pokok.php",
                            method : "POST",
                            data :{'id_jabatan' :id_jabatan},
                            success : function(data){
                            $('#gaji_pokok').val(data);
                            var gaji = data;
                              $.ajax({
                                  url :"ajax/get_absensi.php",
                                  method : "POST",
                                  data :{'id_pegawai' :id_pegawai},
                                  success : function(data){
                                          $('#absen').val(data);
                                            var absen  = data;
                                            // var gaji = gaji*absen;
                                          // $('#g_pokok').val(gaji);
                                            var pjk = $('#pajak').val();
                                            var jum_pjk = (pjk/100)*gaji;
                                      $('#jumlah_pajak').val(jum_pjk);
                                      $('#total_gaji').val(gaji - piutang - jum_pjk);
                                    }
                              })
                            }
                        })
                    }
                  })    
                  }
              })
              

            })
           $('absen').keyup(function(){

           var id_jabatan = $('#jabatan').val();
            if(id_jabatan != ''){
              console.log('ada');
            }else{
                console.log('kosong');
            }
           
           })
    </script>

  </div>
</body>

</html>
