
   

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Update/tambah Reklame </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 

      <form class="form-horizontal" action="<?php echo base_url('index.php/Reklame/save'); ?>" method="post" name="myForm">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->

            <?php if ($this->session->flashdata('pesan')!=null)
            {
              echo "<h3>".$this->session->flashdata('pesan')."</h3>";
            }
             ?>  

            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Reklame</h3>
              </div> 
                <div class="box-body"> 

                  <input type="hidden" class="form-control" name="id_reklame" value="<?php echo $data['id_reklame'] ?>" > 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <div id="alamat" style="color: red"></div>
                      <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>" required>
                    </div>
                  </div>  

                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Panjang</label>
                    <div class="col-sm-4">
                      <div id="panjang" style="color: red"></div>
                      <input type="number" class="form-control" name="panjang" value="<?php echo $data['panjang'] ?>" required>
                    </div>
                     <label for="inputPassword3" class="col-sm-2 control-label">Lebar</label>
                    <div class="col-sm-4">
                      <div id="lebar" style="color: red"></div>
                      <input type="number" class="form-control" name="lebar" value="<?php echo $data['lebar'] ?>" required>
                    </div>
                  </div>  

                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Ketinggian</label>
                    <div class="col-sm-4">
                      <div id="ketinggian" style="color: red"></div>
                      <input type="number" class="form-control" name="ketinggian" value="<?php echo $data['ketinggian'] ?>" required>
                    </div>
                     <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Sisi</label>
                    <div class="col-sm-4">
                      <div id="jumlah_sisi" style="color: red"></div>
                      <input type="number" class="form-control" name="jumlah_sisi" value="<?php echo $data['jumlah_sisi'] ?>" required>
                    </div>
                  </div>   

                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Latitude</label>
                    <div class="col-sm-4">
                      <div id="latitude" style="color: red"></div>
                      <input type="text" class="form-control" name="latitude" value="<?php echo $data['latitude'] ?>" required>
                    </div>
                     <label for="inputPassword3" class="col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-4">
                      <div id="longitude" style="color: red"></div>
                      <input type="text" class="form-control" name="longitude" value="<?php echo $data['longitude'] ?>" required>
                    </div>
                  </div>   

                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Jenis Reklame</label>
                    <div class="col-sm-4">
                      <div id="id_jenis_reklame" style="color: red"></div> 
                        <select name="id_jenis_reklame" class="form-control">
                          <?php foreach ($data['jenis_reklame'] as $key ): ?>
                             <option value="<?php echo $key['id_jenis'] ?>" <?php if($data['id_jenis_reklame']==$key['id_jenis']){ echo "selected";} ?>><?php echo $key['nama']; ?></option> 
                          <?php endforeach ?>
                        </select> 
                    </div> 
                    
                  </div>   

                  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Klasifikasi Jalan</label>
                      <div class="col-sm-4">
                        <div id="klasifikasi_jalan" style="color: red"></div>
                        <select name="klasifikasi_jalan" class="form-control">
                          <option value="A" <?php if($data['klasifikasi_jalan']=="A"){ echo "selected";} ?>>A</option> 
                          <option value="B" <?php if($data['klasifikasi_jalan']=="B"){ echo "selected";} ?>>B</option> 
                          <option value="C" <?php if($data['klasifikasi_jalan']=="C"){ echo "selected";} ?>>C</option> 
                          <option value="D" <?php if($data['klasifikasi_jalan']=="D"){ echo "selected";} ?>>D</option> 
                        </select>
                      </div>  

                        <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-4">
                          <div id="deskripsi" style="color: red"></div>
                          <textarea name="deskripsi" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
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

    </section>
       
      </div>

    </div>
  </body> 

 