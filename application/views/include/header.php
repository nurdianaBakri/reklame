<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI | REKLAME</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/select2/select2.min.css" type="text/css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <script src="<?php echo base_url();?>/assets2/plugins/jQuery/jquery-2.2.3.min.js"></script>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>Reklame</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI| </b> Reklame</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top"> 
      
     </div>
    </nav>
  </header>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
           
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>   

        <li>
          <a href="<?php echo base_url();?>PenyewaanReklame">
            <i class="fa fa-circle-o"></i> Penyewaan Reklame</a>
        </li> 
        <li>
            <a href="<?php echo base_url();?>Map">
              <i class="fa fa-circle-o"></i>Map</a>
          </li>

           <?php if ($this->session->userdata('jenis_user')=='user'){ ?>
           <li> 
            <a href="<?php echo base_url();?>User/profile/">
              <i class="fa fa-circle-o"></i>Profile</a>
          </li> 
        <?php } ?>

        <?php if ($this->session->userdata('jenis_user')=='admin'){ ?>
           <li>
            <a href="<?php echo base_url();?>Jenis_reklame">
              <i class="fa fa-circle-o"></i> Jenis reklame</a>
          </li>
          <li>
            <a href="<?php echo base_url();?>Reklame">
              <i class="fa fa-circle-o"></i> reklame</a>
          </li>
            <li>
            <a href="<?php echo base_url();?>User">
              <i class="fa fa-circle-o"></i> user </a>
          </li> 
        <?php } ?>
         
        <li class="treeview">
          <a href="<?php echo base_url();?>Login/logout">
            <i class="glyphicon glyphicon-off"></i> <span>Logout</span>
            <span class="pull-right-container"> 
            </span>
          </a>
        </li>
        
          </ul>

    </section>
    <!-- /.sidebar -->
  </aside>