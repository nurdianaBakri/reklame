<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Data Penyewa </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 
      <form class="form-horizontal" action="<?php echo base_url('index.php/PenyewaanReklame/do_sewa'); ?>" method="post" name="myForm"> 

          <div class="box">

             <?php if ($this->session->flashdata('pesan')!=null)
              { ?> 
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Alert !</h4> 
                  <?php echo "<p>".$this->session->flashdata('pesan')."</p>"; ?>
                </div> 
                <?php 
              }
               ?>  

             
            <div class="row">
              <!-- right column -->
              <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Penyewa</h3>
                  </div> 
                    <div class="box-body">  
                      <?php $jenis_user =  $this->session->userdata('jenis_user'); ?>

                          <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('no_ktp'); ?>">  
                          <input type="hidden" name="id_penyewa" value="<?php echo $data_penyewa['id_penyewa'] ?>">  
                          <input type="hidden" name="jenis_aksi" value="<?php echo $jenis_aksi ?>"> 
                          <input type="hidden" name="id_sewa" value="<?php echo $id_sewa ?>"> 
                          <input type="hidden" name="id_reklame" value="<?php echo $data_reklame['id_reklame'] ?>"> 

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                          <div id="nama_perusahaan" style="color: red"></div>
                          <input type="text" class="form-control" name="nama_perusahaan" readonly value="<?php echo $data_penyewa['nama_perusahaan'] ?>">
                        </div>
                      </div>  

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Lingkungan</label>
                        <div class="col-sm-4">
                          <div id="lingkungan" style="color: red"></div>
                          <input type="text" class="form-control" name="lingkungan" readonly value="<?php echo $data_penyewa['lingkungan'] ?>">
                        </div>

                         <label for="inputPassword3" class="col-sm-2 control-label">Kelurahan</label>
                        <div class="col-sm-4">
                          <div id="kelurahan" style="color: red"></div>
                          <input type="text" class="form-control" name="kelurahan" readonly value="<?php echo $data_penyewa['kelurahan'] ?>">
                        </div>
                      </div>  
     
                      <div class="form-group">
                        <label class="col-sm-2 control-label">RT</label>
                        <div class="col-sm-2">
                          <div id="rt" style="color: red"></div>
                          <input type="number" class="form-control" name="rt" readonly value="<?php echo $data_penyewa['rt'] ?>">
                        </div>

                        <label class="col-sm-2 control-label">RW</label>
                        <div class="col-sm-2">
                          <div id="rw" style="color: red"></div>
                          <input type="number" class="form-control" name="rw" readonly value="<?php echo $data_penyewa['rw'] ?>">
                        </div> 

                         <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-2">
                          <div id="kode_pos" style="color: red"></div>
                          <input type="number" class="form-control" name="kode_pos" readonly value="<?php echo $data_penyewa['kode_pos'] ?>">
                        </div> 
                      </div>   
                      
                       <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                        <div class="col-sm-4">
                          <div id="kecamatan" style="color: red"></div>
                          <input type="text" class="form-control" name="kecamatan" readonly value="<?php echo $data_penyewa['kecamatan'] ?>">
                        </div>

                        <label for="inputPassword3" class="col-sm-2 control-label">No Telp Perusahaan</label>
                        <div class="col-sm-4">
                          <div id="no_telp_kantor" style="color: red"></div>
                          <input type="number" class="form-control" name="no_telp_kantor" readonly value="<?php echo $data_penyewa['no_telp_kantor'] ?>">
                        </div>
                      </div>  
                      
                    </div> 
                  </div> 

                   <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Papan Reklame</h3>
                  </div> 
                    <div class="box-body">  

                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Alamat Papan Reklame</label>
                        <div class="col-sm-10">
                          <div id="id_jenis_reklame" style="color: red"></div>
                          <input type="text" class="form-control" name="alamat" readonly value="<?php echo $data_reklame['alamat'] ?>">
                        </div> 
                      </div>   
                     
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Jenis Reklame</label>
                        <div class="col-sm-4">
                          <div id="id_jenis_reklame" style="color: red"></div>
                          <input type="text" class="form-control" name="id_jenis_reklame" readonly value="<?php echo $data_jenis_reklame['nama'] ?>">
                        </div>

                         <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Sisi</label>
                        <div class="col-sm-4">
                          <div id="jumlah_sisi" style="color: red"></div>
                          <input type="text" class="form-control" name="jumlah_sisi" readonly value="<?php echo $data_reklame['jumlah_sisi'] ?>">
                        </div>
                      </div>  

                       <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Panjang(M)</label>
                        <div class="col-sm-4">
                          <div id="panjang" style="color: red"></div>
                          <input type="text" class="form-control" name="panjang" readonly value="<?php echo $data_reklame['panjang'] ?>">
                        </div>

                        <label for="inputPassword3" class="col-sm-2 control-label">Lebar(M)</label>
                        <div class="col-sm-4">
                          <div id="lebar" style="color: red"></div>
                          <input type="text" class="form-control" name="lebar" readonly value="<?php echo $data_reklame['lebar'] ?>">
                        </div>
                      </div>  

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Ketinggian(M)</label>
                        <div class="col-sm-4">
                          <div id="ketinggian" style="color: red"></div>
                          <input type="text" class="form-control" name="ketinggian" readonly value="<?php echo $data_reklame['ketinggian'] ?>">
                        </div>

                        <label for="inputPassword3" class="col-sm-2 control-label">Waktu sewa (bulan)</label>
                        <div class="col-sm-4">
                          <div id="lama_sewa" style="color: red"></div>
                          <input type="number" class="form-control" name="lama_sewa" required value="<?php echo $data_sewa['lama_sewa'] ?>">
                        </div>
                      </div>   

                       <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai sewa</label>
                        <div class="col-sm-4">
                          <div id="tanggal_mulai_sewa" style="color: red"></div>
                          <input type="date" class="form-control" name="tanggal_mulai_sewa" value="<?php echo $data_sewa['tanggal_mulai_sewa'] ?>">
                        </div> 

                         <?php if ($jenis_aksi=="edit"): ?>
                          <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Akhir sewa</label>
                          <div class="col-sm-4">
                            <div id="tanggal_mulai_sewa" style="color: red"></div>
                            <input type="date" class="form-control" name="tanggal_mulai_sewa" value="<?php echo $data_sewa['tanggal_akhir_sewa'] ?>" readonly>
                          </div> 
                        <?php endif ?>  
                      </div>  

                       <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Produk Rokok?</label>
                        <div class="col-sm-4">
                          <div id="produk_rokok" style="color: red"></div>
                          <select name="produk_rokok" class="form-control">
                            <option value="1" <?php if($data_sewa['produk_rokok']==1){ echo "selected";} ?>>Ya</option>
                            <option value="0" <?php if($data_sewa['produk_rokok']==0){ echo "selected";} ?>>Tidak</option>
                          </select>
                        </div>  
                          
                      </div> 

                      <?php  

                      if ($jenis_user=='admin'){ ?>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Status Bayar Pajak</label>
                          <div class="col-sm-4">
                            <select class="form-control" name="status_bayar_pajak">
                              <option value="belum di bayar" <?php if($data_sewa['status_pajak']=="belum di bayar"){ echo "selected";} ?>>Belum di bayar</option>
                              <option value="lunas" <?php if($data_sewa['status_pajak']=="lunas"){ echo "selected";} ?>>Lunas</option>
                            </select>
                          </div> 

                          <label for="inputPassword3" class="col-sm-2 control-label">Status Bayar Sewa</label>
                          <div class="col-sm-4">
                            <select class="form-control" name="status_bayar_sewa">
                              <option value="belum di bayar" <?php if($data_sewa['status_sewa']=="belum di bayar"){ echo "selected";} ?>>Belum di bayar</option>
                              <option value="lunas" <?php if($data_sewa['status_sewa']=="lunas"){ echo "selected";} ?>>Lunas</option>
                              <option value="tertolak" <?php if($data_sewa['status_sewa']=="tertolak"){ echo "selected";} ?>>Pengajuan Tertolak</option> 
                            </select>
                          </div>   
                        </div>
                      <?php } else { ?>  
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Status Bayar Pajak</label>
                          <div class="col-sm-4">
                           <input type="text" class="form-control" name="status_bayar_pajak" value="<?php echo $data_sewa['status_pajak'] ?>" readonly >
                          </div> 

                          <label for="inputPassword3" class="col-sm-2 control-label">Status Sewa</label>
                          <div class="col-sm-4">
                           <input type="text" class="form-control" name="status_bayar_sewa" value="<?php echo $data_sewa['status_sewa'] ?>" readonly > 
                          </div>   
                        </div>
                      <?php } ?>  
                        
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-flat" id="submit">Simpan</button> 
                        <?php if ($data_sewa['id_sewa']!=null): ?>

                          <?php if ($jenis_user=='admin'){ ?> 
                              <a class="btn btn-danger btn-flat" href="<?php echo base_url()."index.php/PenyewaanReklame/tolak_pengajuan/".$data_sewa['id_sewa'] ?>">Tolak Pengajuan</a>  
                            <?php } ?> 

                          <a target="_blank" class="btn btn-success btn-flat" href="<?php echo base_url()."index.php/PenyewaanReklame/print2/".$data_sewa['id_sewa'] ?>">Print Perhitungan NSR</a> 

                           <a target="_blank" class="btn btn-success btn-flat" href="<?php echo base_url()."index.php/PenyewaanReklame/printPermohonanIzin/".$data_sewa['id_sewa'] ?>">Print Permohoan Izin pemasangan penyelenggaraan reklame</a>
                        <?php endif ?>
                        
                    </div>
                  </div>
              </div>
             
              <!--/.col (right) -->
            </div>
          </div>
        
        </form>  

        </section>
      </div>

    </div>
  </body>
