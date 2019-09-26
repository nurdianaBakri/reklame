<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h1>
         Jenis Reklame
      </h1></center>
    </section>

    <!-- Main content -->
    <section class="content"> 

        <?php if ($this->session->flashdata('pesan')!=null)
        {
          echo "<h3>".$this->session->flashdata('pesan')."</h3>";
        }
         ?> 

          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabel Jenis Reklame  </h3>  
                <a class="btn btn-primary" href="<?php echo base_url()."index.php/Jenis_reklame/form/" ?>">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr> 
                  <th>ID Jenis Reklame</th>
                  <th>Nama</th> 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($data as $row) {?>
                <tr> 
                  <td> <?php echo $row['id_jenis']; ?> </td>
                  <td> <?php echo $row['nama']; ?> </td> 
                  <td> 
                      <a class="btn btn-success" href="Jenis_reklame/form/<?php echo $row['id_jenis'];?>"> <i class="fa fa-edit "></i> Edit</a>  
                      
                      <a class="btn btn-danger" href="<?php echo site_url('Jenis_reklame/hapus/'.$row['id_jenis']);?>"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="icon-trash"></i> <i class="fa fa-trash "></i> Hapus</a>
                </td>
                </tr> 
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
