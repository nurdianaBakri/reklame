<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
 
    <div class="content-wrapper"> 
      <section class="content">  
        <div id="DivIdToPrint">

          <div class="box"> 
            <!-- Horizontal Form -->
            <div class="box box-success">
              <div class="box-header  with-border">
                <h3 class="box-title">Data Objek Pajak</h3>
              </div> 
                <div class="box-body">    
                  <div class="row">
                    <div class="col-sm-6">

                      <?php 
                        $produk_rokok="";
                        $luas = $data_reklame['panjang'] * $data_reklame['lebar'];
                        $ketinggian = $data_reklame['ketinggian'];
                        $x_luas=0; 
                        $x_ketinggian=0;  

                        if ($data_sewa['produk_rokok']==1) {
                          $produk_rokok='Rokok';
                        }
                        else
                        {
                          $produk_rokok='Non Rokok'; 
                        } 
                      ?>
                     <table>
                       <tr>
                         <td width="25%">No. Urut</td>
                         <td>:</td>
                         <td><?php echo $data_sewa['id_sewa']; ?></td>
                       </tr>

                        <tr>
                         <td>Wajib pajak</td>
                         <td>:</td>
                         <td><?php echo $data_penyewa['nama_perusahaan']; ?></td>
                       </tr>

                        <tr>
                         <td>Lokasi Pemasangan</td>
                         <td>:</td>
                         <td><?php echo $data_reklame['alamat']; ?></td>
                       </tr>

                        <tr>
                         <td>Jenis </td>
                         <td>:</td>
                         <td><?php echo $data_jenis_reklame['nama']; ?></td>
                       </tr>

                         <tr>
                         <td>Panjang</td>
                         <td>:</td>
                         <td><?php echo $data_reklame['panjang']; ?></td>
                       </tr>

                        <tr>
                         <td>Lebar</td>
                         <td>:</td>
                         <td><?php echo $data_reklame['lebar']; ?></td>
                       </tr>

                        <tr>
                         <td>Luas</td>
                         <td>:</td>
                         <td><?php echo $luas; ?></td>
                       </tr>

                       <tr>
                         <td>Ketinggian</td>
                         <td>:</td>
                         <td><?php echo $ketinggian; ?></td>
                       </tr>

                       <tr>
                         <td>Sudut Pandang</td>
                         <td>:</td>
                         <td><?php echo $data_reklame['jumlah_sisi']." arah"; ?></td>
                       </tr>

                     </table>
                    </div>
                    <div class="col-sm-6">
                      <table> 
                        <tr>
                         <td width="25%">Sisi</td>
                         <td>:</td>
                         <td><?php echo $data_reklame['jumlah_sisi']; ?></td>
                        </tr>

                        <tr>
                         <td>Lama</td>
                         <td>:</td>
                         <td><?php echo $data_sewa['lama_sewa']." bulan(".$data_sewa['tanggal_mulai_sewa']." sampai ".$data_sewa['tanggal_akhir_sewa'].")"; ?></td>
                       </tr>

                       <tr>
                         <td>Klasifikasi Jalan</td>
                         <td>:</td>
                         <td><?php echo $data_reklame['klasifikasi_jalan']; ?></td>
                       </tr>

                        <tr>
                         <td width="25%">Jenis Produk</td>
                         <td>:</td>
                         <td><?php echo $produk_rokok; ?></td>
                       </tr>

                     </table>
                    </div>
                  </div>
  
                  </div>   
                </div>

              </div>
          </div>

           <div class="box"> 
            <!-- Horizontal Form -->
            <div class="box box-success">
              <div class="box-header  with-border">
                <h3 class="box-title">Nota Perhitungan Nilai Sewa Reklame</h3>
              </div> 
                <div class="box-body"> 
                  <div class="row">
                    <div class="col-sm-6">

                      <?php
                        //GET skor luar bidang
                        if ($luas<=8)
                        {
                          $this->db->where('jenis_reklame',$data_reklame['id_jenis_reklame']);
                          $data_ketentuan = $this->db->get('ketentuan')->row_array();
                          $x_luas =$data_ketentuan['luas_bidang_a'];
                          $x_ketinggian =$data_ketentuan['ketinggian'];
                        }
                        else if ($luas>8) {
                          $this->db->where('jenis_reklame',$data_reklame['id_jenis_reklame']);
                          $data_ketentuan = $this->db->get('ketentuan')->row_array();
                          $x_luas =$data_ketentuan['luas_bidang_a'];
                          $x_ketinggian =$data_ketentuan['ketinggian'];
                        }

                        $NJOPLuas =$luas * $x_luas; 
                        $NJOPKetinggian =$ketinggian*$x_ketinggian;   

                        $TextNJOPLuas =$luas." x ".number_format($x_luas)." = ".number_format($NJOPLuas); 
                        $TextNJOPKetinggian =$ketinggian." x ".number_format($x_ketinggian)." = ".number_format($NJOPKetinggian); 

                        $NJOPLuas =$luas * $x_luas; 
                        $NJOPKetinggian =$ketinggian*$x_ketinggian; 
                      ?>
                      <table> 
                       <tr>
                           <td><b>NJOP</b></td>
                           <td></td>
                           <td></td>
                         </tr>

                          <tr>
                           <td>luas</td>
                           <td>:</td>
                           <td><?php echo $TextNJOPLuas; ?></td>
                         </tr>

                         <tr>
                           <td>Ketinggian</td>
                           <td>:</td>
                           <td><?php echo $TextNJOPKetinggian; ?></td>
                         </tr>

                          <tr>
                           <td><b>Total NJOP</b></td>
                           <td>:</td>
                           <td><?php echo number_format($NJOPLuas+$NJOPKetinggian); ?></td>
                         </tr>

                       </table>
                    </div>
                     <div class="col-sm-6">

                      <?php

                       //GET skor luar bidang 
                      $this->db->where('klasifikasi_jalan',$data_reklame['klasifikasi_jalan']);
                      $data_spek_jalan = $this->db->get('lokasi_jalan')->row_array();
                      $x_lokasi = ($data_spek_jalan['skor']*60)/100;  

                      $this->db->where('arah',$data_reklame['jumlah_sisi']);
                      $data_sudut_pandang = $this->db->get('sudut_pandang')->row_array();
                      $x_sudut_pandang = ($data_sudut_pandang['skor']*15)/100; 

                      $skor_ketinggian=0;

                      if ($data_reklame['ketinggian']>=15)
                      {
                         $skor_ketinggian  = 10;
                      }  

                      else if ($data_reklame['ketinggian']>=10 && $data_reklame['ketinggian']<=14.99)
                      {
                         $skor_ketinggian  = 8;
                      } 

                      else if ($data_reklame['ketinggian']>=6 && $data_reklame['ketinggian']<=9.99)
                      {
                         $skor_ketinggian  = 6;
                      } 
                      else if ($data_reklame['ketinggian']>=3 && $data_reklame['ketinggian']<=5.99)
                      {
                         $skor_ketinggian  = 4;
                      } 
                      else{
                         $skor_ketinggian  = 2; 
                      } 

                      $x_skor_ketinggian = ($skor_ketinggian*25)/100; 

                      $bobot_total = $x_lokasi+$x_sudut_pandang+$x_skor_ketinggian;

                      //nsns = nilai satuan nilai strategis
                      $nsns=0;
                      if ($bobot_total<=8)
                      {
                        $nsns = 7500; 
                      }
                      else
                      {
                        $nsns = 15000;
                      } 

                      $total_nilai_strategis = $bobot_total * $nsns;

                      ?>
                      <table> 
                       <tr>
                           <td"><b>NILAI STRATEGIS</b></td>
                           <td></td>
                           <td></td>
                         </tr>

                          <tr>
                           <td>Skor Lokasi</td>
                           <td>:</td>
                           <td><?php echo $data_spek_jalan['skor']." x 60% = ".$x_lokasi; ?></td>
                         </tr>

                          <tr>
                           <td>Skor Sudut Pandang</td>
                           <td>:</td>
                           <td><?php echo $data_sudut_pandang['skor']." x 15% = ".$x_sudut_pandang; ?></td>
                         </tr>

                          <tr>
                           <td>Skor Ketinggian</td>
                           <td>:</td>
                           <td><?php echo $skor_ketinggian." x 25% = ".$x_skor_ketinggian; ?></td>
                         </tr>

                          <tr>
                           <td><b>Bobot Total</b></td>
                           <td>:</td>
                           <td><?php echo $bobot_total; ?></td>
                         </tr>

                       </table>
                    </div>

                    <div class="row">
                      <div class="col-sm-1"></div>
                      <div class="col-sm-10">

                        <?php 
                          $totalNJOP =$NJOPLuas+$NJOPKetinggian;
                          $totalNJOP_nilaiStrategis = $totalNJOP+$total_nilai_strategis;
                          $tarif_pajak = ($totalNJOP_nilaiStrategis*25)/100;


                          $pajak_produk_rokok=0;
                          $TXTpajak_produk_rokok="";
                          if ($data_sewa['produk_rokok']==1)
                          {
                            $pajak_produk_rokok =($tarif_pajak*25)/100;
                            $TXTpajak_produk_rokok = number_format($tarif_pajak)." x 25% = ".number_format($pajak_produk_rokok);
                          }
                          else
                          {
                            $pajak_produk_rokok =0;  
                            $TXTpajak_produk_rokok = number_format($tarif_pajak)." x 25% = 0";
                          }

                          $total_pjk_reklame = $tarif_pajak+$pajak_produk_rokok;
                        ?>

                        <br>
                        <table> 
                         <tr>
                            <td>TOTAL NILAI STRATEGIS</td>
                             <td>:</td>
                             <td><?php echo $bobot_total ." x ". $nsns." = ".number_format($total_nilai_strategis); ?></td>
                           </tr>

                             <td>TOTAL NJOP + NILAI STRATEGIS</td>
                             <td>:</td>
                             <td><?php echo number_format($totalNJOP) ." x ". number_format($total_nilai_strategis)." = ".number_format($totalNJOP_nilaiStrategis); ?></td>
                           </tr>

                            <tr>
                             <td>Tarif Pajak</td>
                             <td>:</td>
                             <td><?php echo $totalNJOP_nilaiStrategis." x 25% = ".number_format($tarif_pajak); ?></td>
                           </tr>

                            <tr>
                             <td>Produk Rokok</td>
                             <td>:</td>
                             <td><?php echo $TXTpajak_produk_rokok; ?></td>
                           </tr>

                            <tr>
                             <td><b>Total Pajak Reklame</b></td>
                             <td>:</td>
                             <td><?php echo number_format($total_pjk_reklame); ?></td>
                           </tr>

                         </table>
                      </div>
                      <div class="col-sm-1"></div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-sm-1"></div>
                      <div class="col-sm-10"> 

                        <?php 

                        $masa_pajak = $data_sewa['lama_sewa']*$total_pjk_reklame;

                        ?>
                        
                        <table> 
                         <tr>
                            <td>SISI BIDANG REKLAME</td>
                             <td>:</td>
                             <td><?php echo $data_reklame['jumlah_sisi'] ." sisi x ". number_format($total_pjk_reklame)." = ".number_format($data_reklame['jumlah_sisi']*$total_pjk_reklame); ?></td>
                           </tr>

                             <td>PAJAK SEMUA UNIT</td>
                             <td>:</td>
                             <td><?php echo "1 x ". number_format($total_pjk_reklame)." = ".number_format($total_pjk_reklame); ?></td>
                           </tr>

                            <tr style="font-weight: bold;">
                             <td>MASA PAJAK</td>
                             <td>:</td>
                             <td><?php echo $data_sewa['lama_sewa']." x ".number_format($total_pjk_reklame)."= ".number_format($masa_pajak); ?></td>
                           </tr> 

                         </table>
                      </div>
                      <div class="col-sm-1"></div>
                    </div>

                  </div>
                </div>

              </div>
          </div>

        </div> 
        </section>
    </div>

  </div>
</body>

<script type="text/javascript">

  function printDiv() 
  {  
     var printContents = document.getElementById('DivIdToPrint').innerHTML;
     var originalContents = document.body.innerHTML; 
     document.body.innerHTML = printContents; 
     window.print(); 
     document.body.innerHTML = originalContents; 
}

  $(document).ready(function(){
    printDiv();
});
</script>
