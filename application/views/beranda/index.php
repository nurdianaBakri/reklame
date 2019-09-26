
<div class="container"  style="margin-top:60px">  
 
    <div class="jumbotron">
      <h1 class="display-4">Selamat Datang !</h1> 
      <hr class="my-4">
      <p>Di sistem informasi Penyewaan reklame Kota Mataram, silahkan pilih lokasi reklame yang ingin anda sewa dengan cara meng-klik pin, kemudian klik sewa sekarang.</p> 
    </div>

    <div class="row">
        <div class="col-md-9">
            <?php echo $map['js'];?>  
            <div class="row">
                <div class="col-md-12">
                  <?php echo $map['html'];?> 
                </div>  
            </div> 
        </div>
        <div class="col-md-3">
            <h3>Keterangan : </h3>
            <li><img src="<?php echo base_url()."assets4/images/pinmerah.png" ?>" height="20px" width="20px" >Lokasi Sedang di pakai</li>
            <li><img src="<?php echo base_url()."assets4/images/pinhijau.png" ?>" height="20px" width="20px" > Lokasi Tersedia</li>
            <li><img src="<?php echo base_url()."assets4/images/pinkuning.png" ?>" height="20px" width="20px" >Lokasi Menuggu Verifikasi</li>
        </div>
    </div>
        	 

</div>


<script type="text/javascript"> 

	function filter_reklame() { 
		var kode_filter = $('#kode_filter').val();
        $.ajax({ 
            url:"<?php echo base_url()."index.php/Welcome/filter_reklame/" ?>",
            data: { kode_filter: kode_filter },
            type: 'post',
            dataType:'html'
        }).done(function(responseData) {
            console.log('Done: ', responseData);
			$('.col-md-10').html(responseData); 
        }).fail(function() {
            console.log('Failed');
        });
	}
</script>