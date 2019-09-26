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
                    <div class="col-sm-12">
                     
                      <table class="table table-striped">
                        <tr>
                          <td>nama lengkap pemohon </td>
                          <td>: <?= $data_user['nama'] ?></td>
                        </tr>
                        <tr>
                          <td>Nomor KTP </td>
                          <td>: <?= $data_user['no_ktp'] ?></td>
                        </tr>

                        <tr>
                          <td>Tempat / Tanggal lahir </td>
                          <td>: <?= $data_user['tempat_lahir'].' / '.$data_user['tanggal_lahir'] ?></td>
                        </tr>

                        <tr>
                          <td><b>Alamat Pemohon</b></td>
                          <td></td>
                        </tr>

                          <tr>
                            <td>Lingkungan </td>
                            <td>: <?= $data_user['lingkungan'] ?></td>
                          </tr>

                          <tr>
                            <td>Kelurahan </td>
                            <td>: <?= $data_user['kelurahan'] ?></td>
                          </tr>

                          <tr>
                            <td>RT / RW </td>
                            <td>: <?= $data_user['rt'].' / '.$data_user['rw'] ?></td>
                          </tr>

                          <tr>
                            <td>Kecamatan </td>
                            <td>: <?= $data_user['kecamatan'] ?></td>
                          </tr>

                          <tr>
                            <td>Pekerjaan </td>
                            <td>: <?= $data_user['pekerjaan'] ?></td>
                          </tr>

                           <tr>
                            <td>No. HP </td>
                            <td>: <?= $data_user['no_hp'] ?></td>
                          </tr>

                          <tr >
                            <td colspan="2">Dengan ini mengajukan permohonan kepada Bapak kiranya dapat kami di berikan permohonan izin penyelenggraan reklame dengan data data perursahaan sebagai berikut :</td>
                          </tr>

                          <tr>
                          <td>Nama Perusahaan/Usaha </td>
                          <td>: <?= $data_penyewa['nama_perusahaan'] ?></td>
                        </tr>
                         
                        <tr>
                          <td><b>Alamat Perusahaan</b></td>
                          <td></td>
                        </tr>

                          <tr>
                            <td>Lingkungan </td>
                            <td>: <?= $data_penyewa['lingkungan'] ?></td>
                          </tr>

                          <tr>
                            <td>Kelurahan </td>
                            <td>: <?= $data_penyewa['kelurahan'] ?></td>
                          </tr>

                          <tr>
                            <td>RT / RW </td>
                            <td>: <?= $data_penyewa['rt'].' / '.$data_penyewa['rw'] ?></td>
                          </tr>

                          <tr>
                            <td>Kecamatan </td>
                            <td>: <?= $data_penyewa['kecamatan'] ?></td>
                          </tr>

                          <tr>
                            <td>Kode pos </td>
                            <td>: <?= $data_penyewa['kode_pos'] ?></td>
                          </tr>

                           <tr>
                            <td>No. HP </td>
                            <td>: <?= $data_penyewa['no_telp_kantor'] ?></td>
                          </tr>

                          <tr>
                          <td><b>Data Reklame</b></td>
                          <td></td>
                        </tr>

                          <tr>
                            <td>Jenis Reklame </td>
                            <td>: <?php
                            $this->db->where('id_jenis',$data_reklame['id_jenis_reklame']);
                            $data_jenis = $this->db->get('jenis_reklame')->row_array();
                            echo $data_jenis['nama'] ?></td>
                          </tr>

                          <tr>
                            <td>Jumlah Sisi </td>
                            <td>: <?= $data_reklame['jumlah_sisi'] ?></td>
                          </tr>

                          <tr>
                            <td>Panjang x Lebar x Ketinggian </td>
                            <td>: <?= $data_reklame['panjang'].'M x '.$data_reklame['lebar'].'M x '.$data_reklame['ketinggian'].'M' ?></td>
                          </tr>

                          <tr>
                            <td>Jangka Waktu (Bulan)</td>
                            <td>: <?= $data_sewa['lama_sewa'] ?></td>
                          </tr>

                          <tr>
                            <td>Jenis Promosi </td>
                            <td>: <?php 
                            if ($data_sewa['produk_rokok']==0)
                            {
                              echo "Produk Bukan Rokok";
                            }
                            else {
                              echo "Produk Rokok"; 
                            } ?></td>
                          </tr>

                           <tr>
                            <td>Lokasi Pemasangan </td>
                            <td>: <?= $data_reklame['alamat'] ?></td>
                          </tr> 

                         
                           <tr style="font-weight: bold;">
                            <td>Status bayar pajak </td> 
                             <td>: <?php echo $data_sewa['status_pajak']; ?></td>
                           </tr>  

                            <tr  style="font-weight: bold;">
                              <td>Status sewa</td> 
                             <td>: <?php echo $data_sewa['status_sewa']; ?></td>
                           </tr> 
                       

                           <tr >
                            <td colspan="2">Demikian permohonan yang saya ajukan dan atas perkenan Bapak saya sampaikan terimakasih </td>
                          </tr>


                           <tr >
                            <td rowspan="2" style="text-align: left;">Mataram <?php echo date('Y') ?>
                              
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>

                              <?= $data_user['nama'] ?>
                            </td>
                          </tr>
                       
                      </table>
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
