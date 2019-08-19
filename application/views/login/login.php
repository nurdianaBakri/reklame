<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/select2/select2.min.css" type="text/css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/iCheck/square/blue.css">

  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><i class="fa fa-unlock"></i><b> Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <?php if ($this->session->flashdata('pesan')!=null)
    {
      echo $this->session->flashdata('pesan');
    }
     ?>

    <form action="<?php echo base_url()."index.php/Login/getLogin"; ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div> 
      <div class="row">
      <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> Sign In</button>
        </div> 
    </form> 
       <ul>
        <a href="<?php echo base_url();?>index.php/User/daftar">Tidak punya akun? Daftar sekarang !</a>
        <div class="clear"></div>
      </ul> 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>/assets2/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>/assets2/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets2/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>/assets2/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
</body>
</html>
