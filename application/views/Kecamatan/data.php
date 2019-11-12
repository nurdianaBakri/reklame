<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h1>
         Kecamatan
      </h1></center>
    </section>

    <!-- Main content -->
    <section class="content"> 

          <div class="box">
            <div class="box-header ">
                <h3 class="box-title">Tabel Kecamatan  </h3> 
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
                  <th>ID Kecamatan</th> 
                  <th>Nama Kecamatan</th> 
                  <th></th> 
                  <!-- <th></th>  -->
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($data as $row) {?>
                <tr>  
                  <td> <?php echo $row['id_kecamatan']; ?> </td>
                  <td> <?php echo $row['nama_kecamatan']; ?> </td>  
                  <td>  
                       <a class="btn btn-success" href="Kecamatan/detail/<?php echo $row['id_kecamatan'];?>"> <i class="fa fa-edit "></i> Edit</a>   
                        <a class="btn btn-danger" href="<?php echo site_url('Kecamatan/hapus/'.$row['id_kecamatan']);?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="icon-trash"></i> <i class="fa fa-trash "></i> Hapus</a> 
                  </td> 
                </tr> 
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
