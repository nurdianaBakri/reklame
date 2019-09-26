<?php echo $map['js'];?>  
  <div class="row">
    <div class="col-md-10">
      <?php echo $map['html'];?> 
    </div> 
    <div class="col-md-2"> 
      Filter Papan Reklame
      <select name="kode_filter" onchange="filter_reklame(this.value)" id="kode_filter">
      	<option value="1">Semua</option>
      	<option value="2">Hampir Berakhir masa kontrak</option>
      	<option value="3">Berakhir masa kontrak</option>
      </select>
    </div>
  </div> 
