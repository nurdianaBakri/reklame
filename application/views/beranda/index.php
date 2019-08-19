
<div class="container"  style="margin-top:60px"> 

	<?php echo $map['js'];?>  
  <div class="row">
    <div class="col-md-12">
      <?php echo $map['html'];?> 
    </div> 
   <!--  <div class="col-md-2"> 
      Filter Papan Reklame
      <select name="kode_filter"  id="kode_filter" class="form-control">
      	<option value="1">Semua</option>
      	<option value="2">Hampir Berakhir masa kontrak</option>
      	<option value="3">Berakhir masa kontrak</option>
      </select>
    </div> -->
  </div> 

</div>


<script type="text/javascript">
	// $(document).ready(function(){
	// 	var kode_filter = $('#kode_filter').val();
	//     filter_reklame(kode_filter);
	// }); 

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