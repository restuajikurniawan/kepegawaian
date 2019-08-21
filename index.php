<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/core/init.php"); ?>
<?php
if( !isset($_SESSION['username']) ){
  header('Location:login.php');
}
  $hari = date('M Y');
  $tanggal = date('d');
 if(isset($_POST['submit_gaji'])){

    if($tanggal >= 20){
          if(insert_gaji_pokok()){
          ?> 
          <!-- <script type="text/javascript"> alert('berhasil')</script> -->
          <?php
        }else{
          ?> 
          <script type="text/javascript"> alert('gagal')</script>
          <?php
        }
        if(insert_tunjangan_anak() && insert_tunjangan_istri() && insert_tunjangan_jabatan()){
          ?> 
          <!-- <script type="text/javascript"> alert('berhasil')</script> -->
          <?php
      }else{
          ?> 
          <!-- <script type="text/javascript"> alert('gagal')</script> -->
          <?php
      }
          if(insert_gaji_lembur()){
         ?> 
          <!-- <script type="text/javascript"> alert('berhasil')</script> -->
          <?php
    }else{
          ?> 
          <script type="text/javascript"> alert('gagal')</script>
          <?php
    }
    if(potongan_bpjs() && potongan_koperasi() && potongan_piutang() && potongan_alpha()){
       ?> 
          <script type="text/javascript"> alert('berhasil')</script>
          <?php
  }else{
     ?> 
          <script type="text/javascript"> alert('gagal')</script>
          <?php
  }
  }
        
 }
if(isset($_POST['rekap_kerja'])){
    
    if($tanggal >= 20){
          if(rekap_hadir() && rekap_terlambat() && rekap_sakit() && rekap_cuti() && rekap_alpha()){ ?> 
          <script type="text/javascript"> alert('berhasil')</script>
          <?php
          }else{  ?> 
          <script type="text/javascript"> alert('gagal')</script>
          <?php
    }
    }else{  ?> 
          <script type="text/javascript"> alert('Minimal Rekap Tanggal 20 ! ')</script>
          <?php
    }

  
    
}
// if(isset($_POST['tdk_utang'])){
//   $id_pegawai = $_POST['id_pegawai'];
//   utang_tolak($id_pegawai);
// }
// if(isset($_POST['acc_utang'])){
//   $id_pegawai = $_POST['id_pegawai'];
//   utang_setuju($id_pegawai);
// }

// if(isset($_POST['tdk_dinas'])){
//   $id_pegawai = $_POST['id_pgw'];
//   dinas_tolak($id_pegawai);
// }
?>
<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/head.php"); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" >
  <!-- Navigation-->
    <?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/navigation.php"); ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
     <form action="index.php" method="post">
<?php if($_SESSION['level']=='PERSONALIA'){?>
        <button name="rekap_kerja" align="center" class="btn btn-primary"> Rekap Absensi </button>
        <button name="submit_gaji" align="center" class="btn btn-primary"> Rekap Gaji </button>
<?php } ?>
      </form>
<?php if($_SESSION['level']=='KEUANGAN'){ ?>
     <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> Notifikasi </div>
            
                  <div class="list-group list-group-flush small">
                  <a class="list-group-item list-group-item-action" href="#">
  <?php  foreach (cek_acc_utang() as $key) {
    if($key['acc']== '0'){
     ?>
                  <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="incon">
                  <div class="media-body">

                    <table>
                      <tr>
                        <td>                   
                         <strong><?php echo $key['nama_karyawan']; ?></strong> mengajukan utang sebesar Rp. 
                        <strong><?php echo number_format($key['j_pinjaman'],0,".","."); ?></strong>. </td>
                        <td>
                          <a href="get_acc_utang.php?id=<?php echo $key['id_piutang'] ?>"><button name="acc_utang" class="btn btn-success btn-sm">Setuju</button></a>
                          <a href="get_tolak_utang.php?id=<?php echo $key['id_piutang'] ?>"><button name="tdk_utang" class="btn btn-danger btn-sm">Tolak </button>

                        </td>
                      </tr>
                    </table>

                    </div>
                  </div>
                <?php }?>
 <?php }?>
  <?php  foreach (cek_acc_dinas() as $key) {
    if($key['status'] == '0'){
     ?>
      <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="incon">
                  <div class="media-body">

                    <table>
                      <tr>
                        <td>                   
                         <strong><?php echo $key['nama_karyawan']; ?></strong> mengajukan perjalanan dinas sebesar Rp. 
                        <strong><?php echo number_format($key['jumlah_pengeluaran'],0,".","."); ?></strong>. </td>
                        <td>
                          <a href="get_acc_dinas.php?id=<?php echo $key['id_dinas'] ?>"><button name="acc_utang" class="btn btn-success btn-sm">Setuju</button></a>
                          <a href="get_tolak_dinas.php?id=<?php echo $key['id_dinas'] ?>"><button name="tdk_utang" class="btn btn-danger btn-sm">Tolak </button>

                        </td>
                      </tr>
                    </table>

                     </div>
                  </div>
     <?php }?>
 <?php }?>
                  </a>
                  </div>     
            <div class="card-footer small text-muted"></div>
          </div>     
<?php } ?>
<?php if($_SESSION['level']=='HRD'){ ?>
     <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> Notifikasi </div>
            
                  <div class="list-group list-group-flush small">
                  <a class="list-group-item list-group-item-action" href="#">
  <?php  foreach (cek_acc_lembur() as $key) {
    if($key['acc']== '0'){
     ?>
                  <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="incon">
                  <div class="media-body">

                    <table>
                      <tr>
                        <td>                   
                         <strong><?php echo $key['nama_karyawan']; ?></strong> melakukan lembur pada tanggal
                         <strong><?php  echo tgl_indo($key['tgl_lembur'])?></strong> selama 
                        <strong><?php echo $key['tot_jam']/10000; ?></strong> jam. untuk mengerjakan 
                        <strong><?php echo $key['keterangan']?></strong> </td>
                        <td>
                          <a href="get_acc_lembur.php?id=<?php echo $key['id_lembur'] ?>"><button name="acc_utang" class="btn btn-success btn-sm">Setuju</button></a>
                          <a href="get_tolak_lembur.php?id=<?php echo $key['id_lembur'] ?>"><button name="tdk_utang" class="btn btn-danger btn-sm">Tolak </button>

                        </td>
                      </tr>
                    </table>

                    </div>
                  </div>
                <?php }?>
 <?php }?>
                  </a>
                  </div>     
            <div class="card-footer small text-muted"></div>
          </div>  
<?php } ?>


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/footer.php"); ?>
    <!-- Scroll to Top Button-->
    
    <!-- Logout Modal-->
    <?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/logout.php"); ?>
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
   
  </div>
</body>

</html>
