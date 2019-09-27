<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->config->item('sitename_tittle') ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/fontawesome/css/all.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables/dataTables.checkboxes.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/skin-black-light.css'); ?>">

  <link rel="stylesheet" href="<?= base_url('assets/plugins/pace/pace.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-select/css/bootstrap-select.css'); ?>">
  <!-- jQuery 3 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
   body, html {
  height: 100%;
}
.bg {
  /* The image used */
  background-image: url("<?= base_url('assets/dist/img/cover.jpg'); ?>");

  /* Full height */
  height: 75%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.ex1 {
  padding-top: 10px;
}
h1 {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 30px;
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
}
.deepshd {
  color: #000000;
  /* background-color: #3194f7; */
  letter-spacing: .1em;
}
  </style>
</head>




<body>
    <div class="bg"></div>

    <div class="container-fluid ex1">
      <div class="row">
        <div class="col-sm-1 ex1">
        <img src="<?= base_url('assets/dist/img/Logo_STAKN_Palangkaraya.jpg'); ?>"  alt="Logo STAKN" width="110" height="110">
        </div>
        <div class="col-sm-10" align="center">
        
        <h1 class="deepshd"> SELAMAT DATANG DI APLIKASI SISTEM PENGELOLAAN DATA PERIKANAN 
          <br>
          <code>SUNGAI KATINGAN</code> DAN <code>SEBANGAU</code> KAWASAN TAMAN NASIONAL SEBANGAU </h1>

        <button type="button" class="btn btn-danger" style="font-size: 25px;" data-toggle="modal" data-target="#modalAwal">INPUT DATA</button>&emsp;&emsp;&emsp;&emsp;
        <button type="button" class="btn btn-success" style="font-size: 25px;">LIHAT DATA</button>&emsp;&emsp;&emsp;&emsp;
        <button type="button" class="btn btn-info" style="font-size: 25px;">DESKRIPSI</button>

        </div>
        <div class="col-sm-1 ex1" align="center">
        <img src="<?= base_url('assets/dist/img/logo_wwf.png'); ?>"  alt="Logo STAKN" width="110" height="110">
        </div>
      </div>
    </div>

    <?php $this->load->view($modal); ?>
</body>

  <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/PACE/pace.min.js');?>"></script>

  <!-- SlimScroll -->
  <script src="<?= base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
  <script src="<?= base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>
