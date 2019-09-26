   <div class="container"  style="margin-top:60px">  
      <form class="form-horizontal" action="<?php echo base_url('index.php/User/do_daftar'); ?>" method="post" enctype="multipart/form-data" name="myForm">

        <?php 
        //echo form_open_multipart('index.php/User/do_daftar');
        ?>

        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar</h3>
              </div> 
                <div class="box-body">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">NO. KTP</label>
                    <div class="col-sm-4" >
                      <div id="no_ktp"></div>
                      <input type="number" class="form-control" name="no_ktp" required >
                    </div>
                     <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-4">
                      <div id="nama"></div>
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>
 
                  
                  <div class="form-group"> 
                    <label for="inputPassword3" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                      <div id="tempat_lahir"></div>
                      <input type="text" class="form-control" name="tempat_lahir" required>
                    </div>  

                     <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-4">
                        <div id="tanggal_lahir"></div>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                      </div>  
                  </div>  
 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Lingkungan</label>
                    <div class="col-sm-4">
                      <div id="lingkungan"></div>
                      <input type="text" class="form-control" name="lingkungan" required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Kelurahan</label>
                    <div class="col-sm-4">
                      <div id="kelurahan"></div>
                      <input type="text" class="form-control" name="kelurahan" required>
                    </div>
                  </div> 
 
 
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">RT</label>
                    <div class="col-sm-4">
                      <div id="rt"></div>
                      <input type="number" class="form-control" name="rt" required>
                    </div>

                    <label for="inputPassword3" class="col-sm-2 control-label">RW</label>
                    <div class="col-sm-4">
                      <div id="rw"></div>
                      <input type="number" class="form-control" name="rw" required>
                    </div> 
                  </div>   
                  
                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                    <div class="col-sm-4">
                      <div id="kecamatan"></div>
                      <input type="text" class="form-control" name="kecamatan" required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-4">
                      <div id="pekerjaan"></div>
                      <input type="text" class="form-control" name="pekerjaan" required>
                    </div>
                  </div>  

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">No HP</label>
                    <div class="col-sm-4">
                      <div id="no_hp"></div>
                      <input type="number" class="form-control" name="no_hp" required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                      <div id="username"></div>
                      <input type="text" class="form-control" name="username" required>
                    </div>
                  </div> 
 

                  <div class="form-group">

                    <label for="inputPassword3" class="col-sm-2 control-label">Scan KTP</label>
                    <div class="col-sm-4">
                      <div id="file_ktp"></div>
                      <input type="file" class="form-control" name="file_ktp" required>
                    </div> 

                    <label for="inputPassword3" class="col-sm-2 control-label">Paswword</label>
                    <div class="col-sm-4">
                      <div id="password"></div>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                  </div> 

                </div>
                <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-block btn-flat" id="submit">Daftar</button> 
                </div>
              </div>
          </div>
         
          <!--/.col (right) -->
        </div>
        </form> 

        <br>
        <br>
</div>
 


 