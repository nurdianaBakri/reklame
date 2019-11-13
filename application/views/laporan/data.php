<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h1>
         Laporan
      </h1></center>
    </section>

    <!-- Main content -->
    <section class="content"> 

          <div class="box">
            <div class="box-header ">
                <h3 class="box-title">Tabel Laporan  </h3> 
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
                  <th>ID Sewa</th> 
                  <th>Nama Perusahaan</th> 
                  <th>Tanggal Mulai Sewa</th> 
                  <th>Tanggal Akhir Sewa</th> 
                  <th>Jumlah Bulan sewa</th> 
                  <th>Info Reklame</th> 
                  <th>Total sewa</th>  
                </tr>
                </thead>
                <tbody> 
                  <?php   
                  foreach ($hasil as $row) {


                    // var_dump($row);
                    if (($row['status_pajak']=='lunas') && ($row['status_sewa']=='lunas'))
                    { ?>
                        <tr>  
                          <td> <?php echo $row['id_sewa']; ?> </td>
                          <td> <?php 
                           //get data reklame 
                          $penyewa = $this->db->get_where('penyewa', array('id_penyewa' => $row['id_penyewa'] ))->row_array();
                          
                          echo $penyewa['nama_perusahaan'];  
                           ?> </td> 
                          <td> <?php echo $row['tanggal_mulai_sewa']; ?> </td>
                          <td> <?php echo $row['tanggal_akhir_sewa']; ?> </td>
                          <td> <?php echo $row['lama_sewa']; ?> </td> 
                          <td> <?php 

                          //get data reklame 
                          $reklame = $this->db->get_where('reklame', array('id_reklame' => $row['id_reklame'] ))->row_array();
                          
                          echo $reklame['alamat'];
                        ?> </td>
                        <td> <?php 

                            //get data pajak perbulan
                            $luas = $reklame['panjang'] * $reklame['lebar'];
                            $ketinggian = $reklame['ketinggian'];
                            $id_jenis_reklame = $reklame['id_jenis_reklame'];
                            $klasifikasi_jalan = $reklame['klasifikasi_jalan'];
                            $jumlah_sisi = $reklame['jumlah_sisi'];

                            $njob = $this->M_map->get_njob($luas,$ketinggian,$id_jenis_reklame);

                            //get nilai strategis 
                            $data_nilai_strategis = $this->M_map->get_nilai_strategis($klasifikasi_jalan, $jumlah_sisi, $ketinggian);

                          echo $data_nilai_strategis['total_nilai_strategis']; 

                        ?> </td> 
                      </tr> 

                    <?php  } ?> 
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
