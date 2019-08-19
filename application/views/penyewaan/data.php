<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h1>
         Penyewaan Reklame
      </h1></center>
    </section>

    <!-- Main content -->
    <section class="content"> 

          <div class="box">
            <div class="box-header ">
                <h3 class="box-title">Tabel Penyewaan Reklame  </h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr> 
                  <th>ID Sewa</th>
                  <th>Alamat Papan reklame</th>
                  <th>Penyewa</th>
                  <th>Lama Sewa (bulan)</th> 
                  <th>Status Pajak</th> 
                  <th>Status Sewa</th>  
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($data as $row) {?>
                <tr> 
                  <td> <?php echo $row['id_sewa']; ?> </td>
                  <td> <?php
                    $this->db->where('id_reklame',$row['id_reklame']);
                    $alamat = $this->db->get('reklame')->row_array()['alamat']; 
                    echo $alamat; 
                   ?> </td>
                  <td> <?php
                   $this->db->where('id_penyewa',$row['id_penyewa']);
                    $nama_perusahaan = $this->db->get('penyewa')->row_array()['nama_perusahaan']; 
                    echo $nama_perusahaan;   
                   ?> </td>
                  <td> <?php echo $row['lama_sewa']; ?> </td>
                  <td> <?php echo $row['status_pajak']; ?> </td>  
                  <td> <?php echo $row['status_sewa']; ?> </td>  
                  <td> 
                    <?php 
                    $jenis_user = $this->session->userdata('jenis_user');
                    if ($jenis_user=='admin') {
                      ?>
                       <a class="btn btn-success" href="PenyewaanReklame/detail/<?php echo $row['id_sewa'];?>"> <i class="fa fa-edit "></i> Edit</a>   
                      <?php
                    }
                    else
                    { ?> 
                       <a class="btn btn-success" href="PenyewaanReklame/detail/<?php echo $row['id_sewa'];?>"> <i class="fa fa-edit "></i> Detail</a>   
                    <?php } ?>
                     
                </td>

                 <td> 
                    <?php 
                    $jenis_user = $this->session->userdata('jenis_user');
                    if ($jenis_user=='admin') {
                      ?> 
                        <a class="btn btn-danger" href="<?php echo site_url('PenyewaanReklame/hapus/'.$row['id_sewa']);?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="icon-trash"></i> <i class="fa fa-trash "></i> Hapus</a>
                      <?php
                    }
                    else{}?>
                     
                </td>
                </tr> 
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
