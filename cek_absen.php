<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/core/init.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php 
 $pesan = '';
if(isset($_POST['submit'])){

  $id = $_POST['id_pegawai'];
  $query = "SELECT * FROM karyawan WHERE id_rfid = '$id'";

  if($result = mysqli_query($link,$query)){
        if(mysqli_num_rows($result) !=0){
          date_default_timezone_set("Asia/Jakarta");
          $id = mysqli_fetch_assoc($result);
          $id_pegawai = $id['id_karyawan'];
          $nama = $id['nama_karyawan'];
          $jam = date('H:i:s');
            // $jam = date('08:30:00');
          $tgl =  date('Y-m-d');
          $data = mysqli_fetch_assoc($result);
          $nama = $data['nama_karyawan'];
           $query2 = "SELECT * FROM `absensi_pegawai` WHERE id_karyawan = '$id_pegawai' AND tgl_absen = '$tgl' ";
          $sql = mysqli_query($link,$query2);
          $data = mysqli_fetch_assoc($sql);
          $id_absensi = $data['id_absensi'];

          $query3 = "SELECT * FROM `jadwal`";
          $sql3 = mysqli_query($link,$query3);
          $data2 = mysqli_fetch_assoc($sql3);

          $pagi =  $data2['jam_datang'];
          $istirahat = $data2['jam_keluar'];
          $siang = $data2['jam_masuk'];
          $sore = $data2['jam_pulang'];
         
           if(strtotime($jam) >= strtotime($pagi) && strtotime($jam) < strtotime('11:50:00')){
              $pesan = $id['nama_karyawan'].' Anda Datang';
              absen_masuk($id_pegawai,$jam,$tgl);
              // header('Location:cek_absen.php');
            }elseif(strtotime($jam) >= strtotime($istirahat) && strtotime($jam) < strtotime('12:50:00')){
              $pesan = $id['nama_karyawan'].' Anda Istirahat';
               absen_keluar($id_absensi,$jam);
            }elseif(strtotime($jam) >= strtotime($siang) && strtotime($jam) < strtotime('15:50:00')){
                  if($id_absensi != ''){
                      $pesan = $id['nama_karyawan'].' Anda Masuk';
                      absen_masuk2($id_absensi,$jam);
                  }else{
                      $pesan = $id['nama_karyawan'].' Anda Datang';
                      absen_masuk($id_pegawai,$jam,$tgl);
                  }
              
            }else{
              $pesan = $id['nama_karyawan'].' Anda pulang';
               absen_keluar2($id_absensi,$jam);
            }
          // }elseif (strtotime($jam) == strtotime($istirahat)){
          //   die('keluar');
          //   // if(absen_keluar($id_absensi,$jam)){
          //   //  header('Location:cek_absen.php');
          //   // }
          
          
         }   
        }else{
        echo "<script> alert('Anda Belum Terdaftar'); </script>";
         echo "<meta http-equiv='refresh' content='0; url=cek_absen.php'>";
          
        }
  }
?>

<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/head.php"); ?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header" align="center"><strong>Halaman Absen Pegawai <br> PT Arrosyid Global Sukses Mulia</strong></div>
        <div class="card-header">
          <p align="center"> <?php $date = date('Y-m-d');
          echo tgl_indo($date); ?> </p>
         <p id="jam" align="center"></p></div>
        <div class="card-body">
            <form action="cek_absen.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">ID </label>
            <input type="number" id="id_pegawai" name="id_pegawai" class="form-control" placeholder="ID " autofocus>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Cek - In " class="btn btn-primary">
            <div class="form-check">
               <?php 
                 if($pesan != ''){ ?>
                      <div id="error">
                          <font color="green"><?php echo $pesan; ?></font>
                      </div>
                <?php } ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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
    $(document).ready(function(event){
       
        function getDateTime() {
        var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth()+1; 
        var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
        if(month.toString().length == 1) {
             month = '0'+month;
        }
        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        var dateTime = hour+':'+minute+':'+second;   
         return dateTime;
    }

    // example usage: realtime clock
    setInterval(function(){
        currentTime = getDateTime();
        document.getElementById("jam").innerHTML = currentTime;
       
    }, 1000);
         
    })

    </script>
    <script type="text/javascript">
      // $(window).on('load', function() {
      //   var id_pegawai = $('#id_pegawai').val();
      //   console.log(id_pegawai);
      // })

        $('#id_pegawai').on('keydown',function(event){
        var id_pegawai = $('#id_pegawai').val();
        console.log(id_pegawai);
        // $.ajax({
        //           url :"ajax/cekabsen.php",
        //           method : "POST",
        //           data : {'id_pegawai' : id_pegawai},
        //           success : function(data){
        //           }
        // })
        
      })
        function absen(){
          var id_pegawai = $('#id_pegawai').val();
          alert('is load');
        }
    </script>
</body>

</html>

