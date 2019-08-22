
   

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Update/tambah jenis reklame </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 

      <form class="form-horizontal" action="<?php echo base_url('index.php/Jenis_reklame/save'); ?>" method="post" name="myForm">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Jenis Reklame</h3>
              </div> 
                <div class="box-body"> 

                  <input type="hidden" class="form-control" name="id_jenis" value="<?php echo $data['id_jenis'] ?>" > 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Jenis Reklame</label>
                    <div class="col-sm-10">
                      <div id="nama" style="color: red"></div>
                      <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" required>
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

 