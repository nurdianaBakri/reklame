
   

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Update/tambah Kecamatan </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 

      <form class="form-horizontal" action="<?php echo base_url('index.php/Kecamatan/save'); ?>" method="post" name="myForm">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->  

            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Kecamatan</h3>
              </div> 
                <div class="box-body"> 

                   <?php if ($this->session->flashdata('pesan')!=null)
                  { ?> 
                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Informasi !</h4> 
                      <?php echo "<p>".$this->session->flashdata('pesan')."</p>"; ?>
                    </div> 
                    <?php 
                  }
                   ?>    

                  <input type="hidden" class="form-control" name="id_kecamatan" value="<?php echo $data['id_kecamatan'] ?>" > 
 
                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Kecamatan</label>
                    <div class="col-sm-10">
                      <div id="nama_kecamatan" style="color: red"></div>
                      <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $data['nama_kecamatan'] ?>" required>
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

 