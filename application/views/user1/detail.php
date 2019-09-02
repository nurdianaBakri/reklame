   

   <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Detail/Update User </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 
        <form class="form-horizontal" action="<?php echo base_url('index.php/User/do_update'); ?>" method="post" enctype="multipart/form-data" name="myForm">
  
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Detail User</h3>
              </div> 
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

                  <input type="hidden"  value="<?php echo $data['no_ktp'] ?>" name="no_ktp_old"> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">NO. KTP</label>
                    <div class="col-sm-4" >
                      <div id="no_ktp"></div>
                      <input type="number" class="form-control" value="<?php echo $data['no_ktp'] ?>" name="no_ktp" required >
                    </div>
                     <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-4">
                      <div id="nama"></div>
                      <input type="text" class="form-control" value="<?php echo $data['nama'] ?>" name="nama" required>
                    </div>
                  </div>
 
                  
                  <div class="form-group"> 
                    <label for="inputPassword3" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                      <div id="tempat_lahir"></div>
                      <input type="text" class="form-control" value="<?php echo $data['tempat_lahir'] ?>" name="tempat_lahir" required>
                    </div>  

                     <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-4">
                        <div id="tanggal_lahir"></div>
                        <input type="date" class="form-control" value="<?php echo $data['tanggal_lahir'] ?>" name="tanggal_lahir" required>
                      </div>  
                  </div>  
 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Lingkungan</label>
                    <div class="col-sm-4">
                      <div id="lingkungan"></div>
                      <input type="text" class="form-control" value="<?php echo $data['lingkungan'] ?>" name="lingkungan" required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Kelurahan</label>
                    <div class="col-sm-4">
                      <div id="kelurahan"></div>
                      <input type="text" class="form-control" value="<?php echo $data['kelurahan'] ?>" name="kelurahan" required>
                    </div>
                  </div> 
 
 
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">RT</label>
                    <div class="col-sm-4">
                      <div id="rt"></div>
                      <input type="number" class="form-control" value="<?php echo $data['rt'] ?>" name="rt" required>
                    </div>

                    <label for="inputPassword3" class="col-sm-2 control-label">RW</label>
                    <div class="col-sm-4">
                      <div id="rw"></div>
                      <input type="number" class="form-control" value="<?php echo $data['rw'] ?>" name="rw" required>
                    </div> 
                  </div>   
                  
                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                    <div class="col-sm-4">
                      <div id="kecamatan"></div>
                      <input type="text" class="form-control" value="<?php echo $data['kecamatan'] ?>" name="kecamatan" required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-4">
                      <div id="pekerjaan"></div>
                      <input type="text" class="form-control" value="<?php echo $data['pekerjaan'] ?>" name="pekerjaan" required>
                    </div>
                  </div>  

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">No HP</label>
                    <div class="col-sm-4">
                      <div id="no_hp"></div>
                      <input type="number" class="form-control" value="<?php echo $data['no_hp'] ?>" name="no_hp" required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                      <div id="username"></div>
                      <input type="text" class="form-control" value="<?php echo $data['username'] ?>" name="username" required>
                    </div>
                  </div>  

                  <div class="form-group"> 
                    <label for="inputPassword3" class="col-sm-2 control-label">Scan KTP</label>
                    <div class="col-sm-4">
                      <div id="file_ktp"></div>
                      <input type="file" class="form-control" name="file_ktp" required>
                    </div> 

                    <label for="inputPassword3" class="col-sm-2 control-label">Perview KTP</label>
                    <div class="col-sm-4">
                      <div id="password"></div>
                     <img src="<?php echo base_url()."uploads/user_".$data['no_ktp'].".PNG" ?>" width="200" height="200">
                    </div>
                  </div> 

                  <div class="form-group">
 
                    <label for="inputPassword3" class="col-sm-2 control-label">Paswword (Masukkan password baru jika ingin merubah password)</label>
                    <div class="col-sm-10">
                      <div id="password"></div>
                      <input type="password" class="form-control" value="<?php echo $data['password'] ?>" name="password">
                    </div>
                  </div> 

                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success btn-block btn-flat" id="submit">Update</button> 
                </div>
              </div>
          </div>
         
          <!--/.col (right) -->
        </div>
        </form> 
       
    </section>
       
      </div>

    </div>
  </body> 
 