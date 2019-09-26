<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h1>
         User
      </h1></center>
    </section>

    <!-- Main content -->
    <section class="content"> 

          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabel User  </h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
             <?php if ($this->session->flashdata('pesan')!=null)
              { ?> 
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Alert !</h4> 
                  <?php echo "<p>".$this->session->flashdata('pesan')."</p>"; ?>
                </div> 
                <?php 
              }
               ?>   

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr> 
                  <th>ID User</th>
                  <th>Nama</th>
                  <th>Username</th> 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($data as $row) {?>
                <tr> 
                  <td> <?php echo $row['no_ktp']; ?> </td>
                  <td> <?php echo $row['nama']; ?> </td>
                  <td> <?php echo $row['username']; ?> </td>  
                  <td> 
                      <a class="btn btn-success" href="User/detail/<?php echo $row['no_ktp'];?>"> <i class="fa fa-edit "></i> Edit</a>  
                      
                      <a class="btn btn-danger" href="<?php echo site_url('User/hapus/'.$row['no_ktp']);?>"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="icon-trash"></i> <i class="fa fa-trash "></i> Hapus</a>
                </td>
                </tr> 
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
