

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  silahakan pilih reklame </h1> 
    </section>

    <!-- Main content -->
    <section class="content"> 

       <?php if ($this->session->flashdata('pesan')!=null)
        { ?> 
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Informasi !</h4> 
            <?php echo "<p>".$this->session->flashdata('pesan')."</p>"; ?>
          </div> 
          <?php 
        }
         ?>   

      <?php echo $map['js'];?>  
        <div class="row">
          <div class="col-md-12">
            <?php echo $map['html'];?> 
          </div>  
        </div> 

    </section>
       
      </div>

    </div>
  </body> 