<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h1>
         Reklame
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
                <h3 class="box-title">Tabel Reklame  </h3>  
                <a class="btn btn-primary" href="<?php echo base_url()."index.php/Reklame/form/" ?>">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr> 
                  <th>ID Reklame</th>
                  <th>Alamat</th> 
                  <th>Panjang</th> 
                  <th>Lebar</th> 
                  <th>Ketinggi</th> 
                  <th>Jenis Reklame</th> 
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($data as $row) {?>
                <tr> 
                  <td> <?php echo $row['id_reklame']; ?> </td>
                  <td> <?php echo $row['alamat']; ?> </td> 
                  <td> <?php echo $row['panjang']; ?> </td> 
                  <td> <?php echo $row['lebar']; ?> </td> 
                  <td> <?php echo $row['ketinggian']; ?> </td> 
                  <td> <?php
                   $nama_jenis_reklame = $this->M_jenis_reklame->detail( array('id_jenis' => $row['id_jenis_reklame'] ))->row_array()['nama'];
                   echo $nama_jenis_reklame; 
                   ?> </td> 
                  <td> 
                      <a class="btn btn-success" href="Reklame/form/<?php echo $row['id_reklame'];?>"> <i class="fa fa-edit "></i> Edit</a>   
                </td>
                <td>   
                      <a class="btn btn-danger" href="<?php echo site_url('Reklame/hapus/'.$row['id_reklame']);?>"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="icon-trash"></i> <i class="fa fa-trash "></i> Hapus</a>
                </td>
                </tr> 
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
