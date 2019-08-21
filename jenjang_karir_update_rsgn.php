<?php  require_once "core/init.php"; 
    
   $id_pegawai = $_GET['id'];
  
    if(update_rsgn_pegawai($id_pegawai)){
      update_rsgn_jjk($id_pegawai);
      header('Location:jenjang_karir.php');
    }else{
      ?>
       <script type="text/javascript"> alert('Insert Gagal');</script> 
      <?php
        }
?>