<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->config->item('sitename_tittle')?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/fontawesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/square/purple.css">
  </head>
<body class="hold-transition login-page" style="height: 100%;overflow: hidden;">

  
  <div class="login-box">
    <div class="login-logo">
        <h1><?= $this->config->item('sitename')?></h1>
    </div>
    <div class="login-box-body ">
      <p class="login-box-msg"><?php echo $subheading;?></p>
      <form action="<?= base_url($action); ?>" method="post" id="form1">
         <div class="form-group has-feedback">
         <?php echo form_dropdown('tahun', $options, null, $attribute); ?>
        </div>
        <div class="row">
          <div class="col-xs-8">
                             
          </div><!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="btn bg-purple btn-block" id="lanjut" value="Lanjut" disabled />
          </div><!-- /.col -->
        </div>
        <?php echo form_close();?>
      
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url();?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script>

<script>
$(document).ready(function(){
    $("#tahun").change(function () {
        var tahun = $("#tahun").val();
        var formAction = $('#form1').attr("action");
        if (tahun!=""){
            $('#lanjut').attr("disabled",false);
            $('#form1').attr('action', formAction+'/'+tahun);
        }else{
            $('#lanjut').attr("disabled",true);
        }
    });
});
</script>
</body>
</html>