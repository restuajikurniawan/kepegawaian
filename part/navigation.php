<?php include($_SERVER['DOCUMENT_ROOT']."/kepegawaian/view/head.php"); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="<?php echo $siteurl; ?>/index.php"><img src="<?php echo $siteurl; ?>/assets/image/arrosyid.ico" alt="logo" height="35" width="35"> AR ROSYID </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
<?php if($_SESSION['level'] == 'PERSONALIA'){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo $siteurl; ?>/index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
<?php } ?>
<?php if($_SESSION['level'] == 'PERSONALIA' or $_SESSION['level'] == 'HRD' or $_SESSION['level'] == 'KEUANGAN'){?>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Absensi">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-key"></i>
            <span class="nav-link-text">Master Data Pegawai</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti4">
<?php if($_SESSION['level'] == 'PERSONALIA' or $_SESSION['level'] == 'HRD' or $_SESSION['level'] == 'KEUANGAN'){?>
            <li>
              <a href="<?php echo $siteurl; ?>/part/master_data_pegawai/master_pegawai.php"><i class="fa fa-fw fa-credit-card"></i>Master Data Pegawai</a>
            </li>
<?php } ?>
<?php if($_SESSION['level'] == 'PERSONALIA' or $_SESSION['level'] == 'HRD'){?>
            <li>
              <a href="<?php echo $siteurl; ?>/part/master_data_pegawai/master_status.php"><i class="fa fa-fw fa-credit-card"></i>Master Status Pegawai</a>
            </li>
            <li>
              <a href="<?php echo $siteurl; ?>/part/master_data_pegawai/master_divisi.php"><i class="fa fa-fw fa-credit-card"></i>Master Divisi Pegawai</a>
            </li>
            <li>
              <a href="<?php echo $siteurl; ?>/part/master_data_pegawai/master_jabatan.php"> <i class="fa fa-fw fa-credit-card"></i> Master Jabatan Pegawai</a>
            </li>
            <li>
              <a href="<?php echo $siteurl; ?>/part/master_data_pegawai/master_pendidikan.php"> <i class="fa fa-fw fa-credit-card"></i> Master Pendidikan</a>
            </li>
<?php } ?>
          </ul>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA'){?>        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gaji Pokok">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-key"></i>
            <span class="nav-link-text">Data Master Gaji</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="master_gaji_pokok.php"><i class="fa fa-fw fa-credit-card"></i> Master Gaji Pokok </a>
            </li>
            <li>
              <a href="master_lembur.php"><i class="fa fa-fw fa-credit-card"></i> Master Lembur</a>
            </li>
            <li>
              <a href="master_tunjangan.php"> <i class="fa fa-fw fa-credit-card"></i> Master Tunjangan</a>
            </li>
            <li>
              <a href="master_potongan.php"> <i class="fa fa-fw fa-credit-card"></i> Master Potongan</a>
            </li>
            <li>
              <a href="master_asuransi.php"> <i class="fa fa-fw fa-credit-card"></i> Master Asuransi</a>
            </li>
            <li>
              <a href="master_pajak.php"> <i class="fa fa-fw fa-credit-card"></i> Master Pajak </a>
            </li>
            <li>
              <a href="master_hariraya.php"> <i class="fa fa-fw fa-credit-card"></i> Master Hari Raya</a>
            </li>
            <li>
              <a href="master_Koperasi.php"> <i class="fa fa-fw fa-credit-card"></i> Master Koperasi</a>
            </li>

          </ul>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA'){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Absensi">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-key"></i>
            <span class="nav-link-text">Absensi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti3">
            <li>
              <a href="master_absensi.php"><i class="fa fa-fw fa-credit-card"></i>Data Absensi</a>
            </li>
            <li>
              <a href="cuti_pegawai.php"> <i class="fa fa-fw fa-credit-card"></i> Izin Pegawai</a>
            </li>
          </ul>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA' or $_SESSION['level'] == 'KEUANGAN' or $_SESSION['level'] == 'HRD'){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti2">
<?php if($_SESSION['level']=='PERSONALIA' or $_SESSION['level'] == 'KEUANGAN'){?>
            <li>
              <a href="laporan_gaji.php"><i class="fa fa-fw fa-credit-card"></i> Laporan Gaji Pegawai</a>
            </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA' or $_SESSION['level'] == 'HRD'){?>
            <li>
              <a href="rekap_absen.php"> <i class="fa fa-fw fa-credit-card"></i> Rekap Absensi</a>
            </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA' or $_SESSION['level'] == 'KEUANGAN'){?>
            <li>
              <a href="laporan_dinas.php"> <i class="fa fa-fw fa-credit-card"></i> Laporan Perjalanan Dinas</a>
            </li>
            <li>
              <a href="laporan_piutang.php"> <i class="fa fa-fw fa-credit-card"></i> Laporan Piutang</a>
            </li>
<?php } ?>
          </ul>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA'){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="piutang_pegawai.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Piutang Pegawai</span>
          </a>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA'){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="lembur_pegawai.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Lembur </span>
          </a>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA'){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="perjalanan_dinas.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Perjalanan dinas</span>
          </a>
        </li>
<?php } ?>
<?php if($_SESSION['level']=='PERSONALIA'){?>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="user.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> User</span>
          </a>
        </li>
<?php } ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
</nav>