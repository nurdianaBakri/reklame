
   

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Laporan </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 

      <form class="form-horizontal" action="<?php echo base_url('index.php/Laporan/cari'); ?>" method="post" name="myForm">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->  

            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Masukkan tanggal Mulai Sewa dan tanggal akhir sewa untuk melihat laporan</h3>
              </div> 
                <div class="box-body">  
 
                   <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                      <div id="tgl_mulai" style="color: red"></div>
                      <input type="date" class="form-control" name="tgl_mulai"  equired>
                    </div> 
                  </div>   

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Akhir</label>
                    <div class="col-sm-10">
                      <div id="tgl_akhir" style="color: red"></div>
                      <input type="date" class="form-control" name="tgl_akhir"  equired>
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

 