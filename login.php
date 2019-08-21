<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/core/init.php"); ?>
<?php 
  $error = ''; 

  if(isset($_SESSION['username'])){
    header('Location:index.php');
  }

  if(isset($_POST['login'])){
   $id_pegawai = $_POST['id_pegawai'];
   $password = $_POST['password'];

    if(!empty(trim($id_pegawai)) && !empty(trim($password)) ){
      if(login_cek_id($id_pegawai)){

          if(login_cek_data($id_pegawai,$password)){
              foreach (cek_level($id_pegawai) as $key) {
                $_SESSION['level'] = $key['level'];
              }
            $_SESSION['username']= $id_pegawai;
            header('Location:index.php');
          }else{
            $error = 'username atau password salah';
          }
      }else{
        $error = 'ID tidak terdaftar';
      }
    }else{
      $error = 'Nama atau Password tidak boleh kosong ';
    }
       }
?>
<!DOCTYPE html>
<html lang="en">

<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/head.php"); ?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <form action="login.php" method="post">
        <div class="card-header">Login</div>
        <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">ID Pegawai</label>
            <input class="form-control" id="id_pegawai" name="id_pegawai" type="text" placeholder="ID Pegawai">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
                <?php 
                 if($error != ''){ ?>
                      <div id="error">
                          <font color="red"><?php echo $error; ?></font>
                      </div>
                <?php } ?>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="login" id="login"> Login </button>
        <div class="text-center">
         <!--  <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
 -->        </div>
      </div>
    </div>
  </div>
        </form>
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
    $(document).ready(function(){

        $('#login').on('click', function(){
          // event.preventDefault(event)
           var id_pegawai = $('#id_pegawai').val()
           var password = $('#password').val()
           $.ajax({
                  url :"ajax/get_log_in.php",
                  method : "POST",
                  data : {'id_pegawai' : id_pegawai, 'password' : password},
                  success : function(data){
                      
                  }
              })
        })

      // $('#password').on('keyup',function(){
      //   var id_pegawai = $('#id_pegawai').val()
      //   var pass = $('#password').val()
      //   $.ajax({
      //             url :"ajax/get_log_in.php",
      //             method : "POST",
      //             data : {'id_pegawai' : id_pegawai,'pass': password},
      //             success : function(data){
                      
      //             }
      //   })
        
      // })
      
    })

    </script>
</body>

</html>

