<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Data Perusahaan/Penyewa </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 

       <div class="box">
             
           <form class="form-horizontal" action="<?php echo base_url('index.php/PenyewaanReklame/do_daftar'); ?>" method="post" name="myForm">
                  <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                      <!-- Horizontal Form -->
                      <div class="box box-success">
                        <div class="box-header with-border">
                          <h3 class="box-title">Daftar Perusahaan</h3>
                        </div> 
                          <div class="box-body">  
                              <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('no_ktp'); ?>">
                              <input type="hidden" name="id_reklame" value="<?php echo $id_reklame ?>">

                           
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Nama Perushaan</label>
                              <div class="col-sm-10">
                                <div id="nama_perusahaan" style="color: red"></div>
                                <input type="text" class="form-control" name="nama_perusahaan" required>
                              </div>
                            </div>  

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Lingkungan</label>
                              <div class="col-sm-10">
                                <div id="lingkungan" style="color: red"></div>
                                <input type="text" class="form-control" name="lingkungan" required>
                              </div>
                            </div> 

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Kelurahan</label>
                              <div class="col-sm-10">
                                <div id="kelurahan" style="color: red"></div>
                                <input type="text" class="form-control" name="kelurahan" required>
                              </div>
                            </div> 
           
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">RT</label>
                              <div class="col-sm-2">
                                <div id="rt" style="color: red"></div>
                                <input type="number" class="form-control" name="rt" required>
                              </div>

                              <label for="inputPassword3" class="col-sm-2 control-label">RW</label>
                              <div class="col-sm-2">
                                <div id="rw" style="color: red"></div>
                                <input type="number" class="form-control" name="rw" required>
                              </div> 

                               <label for="inputPassword3" class="col-sm-2 control-label">Kode Pos</label>
                              <div class="col-sm-2">
                                <div id="kode_pos" style="color: red"></div>
                                <input type="number" class="form-control" name="kode_pos" required>
                              </div> 
                            </div>   
                            
                             <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                              <div class="col-sm-10">
                                <div id="kecamatan" style="color: red"></div>
                                <input type="text" class="form-control" name="kecamatan" required>
                              </div>
                            </div> 
 
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">No Telp Perusahaan</label>
                              <div class="col-sm-10">
                                <div id="no_telp_kantor" style="color: red"></div>
                                <input type="number" class="form-control" name="no_telp_kantor" required>
                              </div>
                            </div> 
 

                          </div>
                          <div class="box-footer">
                                  <button type="submit" class="btn btn-success btn-block btn-flat" id="submit">Simpan</button> 
                          </div>
                        </div>
                    </div>
                   
                    <!--/.col (right) -->
                  </div>
                  </form>  
          </div>

        </section>
      </div>

    </div>
  </body>
