<?php

class M_map extends CI_Model
{ 
	function getAll()
	{ 
	        $this->load->library('googlemaps');
            $config=array();
            $config['center'] = '-8.581252, 116.105441';
            $config['zoom']=14;
            $config['map_height']="550px";
            $this->googlemaps->initialize($config);

            $marker=array(); 
            $dataMarker =$this->M_Reklame->getAll();
            
            foreach($dataMarker as $row)
        	{ 
        		$content3="";
        		$marker = array();
        		$lat = $row['latitude'];
        		$lng = $row['longitude'];
        		$pst = $lat.','.$lng;
        		$marker['position'] = $pst;

                //get data pajak perbulan
                $luas = $row['panjang'] * $row['lebar'];
                $ketinggian = $row['ketinggian'];
                $id_jenis_reklame = $row['id_jenis_reklame'];
                $klasifikasi_jalan = $row['klasifikasi_jalan'];
                $jumlah_sisi = $row['jumlah_sisi'];

                $njob = $this->get_njob($luas,$ketinggian,$id_jenis_reklame);

                //get nilai strategis 
                $data_nilai_strategis = $this->get_nilai_strategis($klasifikasi_jalan, $jumlah_sisi, $ketinggian);

        		//masukkan informasi penyewaan ke dalam info window 
        		$where = array(
        			'id_reklame' => $row['id_reklame'], 
        		);
                	$data_sewa =$this->M_sewa->detail($where); 
                	if ($data_sewa->num_rows()>0)
                	{  
                        $jumlah_pelamar = $data_sewa->num_rows();
                        $data_sewa2 = $data_sewa->row_array();  

                		if ($data_sewa2['status_sewa']=='slot ada')
                		{
                			$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <p>Panjang : ".$row['panjang']." M</p> <p>Lebar : ".$row['lebar']." M </p> <p>Pajak/bulan : ".$data_nilai_strategis['total_nilai_strategis']."</p><center><a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  

                            $marker['icon'] = './assets4/images/pinhijau.png';
                		}
                        else if ($data_sewa2['status_sewa']=='tertolak') 
                        {
                            $content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <p>Panjang : ".$row['panjang']." M</p> <p>Lebar : ".$row['lebar']." M </p><p>Pajak/bulan : ".$data_nilai_strategis['total_nilai_strategis']."</p><center><a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  
                            $marker['icon'] = './assets4/images/pinhijau.png'; 
                        }
                        else if ($data_sewa2['status_sewa']=='belum di bayar' && $data_sewa2['status_pajak']=='belum di bayar') {
                                $content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <p>Panjang : ".$row['panjang']." M</p> <p>Lebar : ".$row['lebar']." M </p><p>Pajak/Bulan : ".$data_nilai_strategis['total_nilai_strategis']."</p><p>Jumlah Pemesan : ".$jumlah_pelamar."</p><center> <a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  
                                $marker['icon'] = './assets4/images/pinkuning.png'; 
                        }
                        //cek apakah hari ini lebih kecil sama dengan tanggal mulai sewa 

                		else
                		{  
                			$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tidak Tersedia</p> <p>Panjang : ".$row['panjang']." M</p> <p>Lebar : ".$row['lebar']." M </p> <p>Pajak/bulan : ".$data_nilai_strategis['total_nilai_strategis']."</p><center> Mulai sewa: ".$data_sewa2['tanggal_mulai_sewa']."</p> <p>Akhir Sewa :  ".$data_sewa2['tanggal_akhir_sewa']." </center>";
                				
                		      $marker['icon'] = './assets4/images/pinmerah.png';
                		}
                	}
                	else
                	{
                		$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <p>Panjang : ".$row['panjang']." M</p> <p>Lebar : ".$row['lebar']." M </p> <p>Pajak/bulan : ".$data_nilai_strategis['total_nilai_strategis']."</p><center><a href='PenyewaanReklame/sewa/".$row['id_reklame']."' onclick='window.open(this.href); return false;'><p>Sewa Sekarang</a></center>";   

                        $marker['icon'] = './assets4/images/pinhijau.png';

                	} 
                		
        		$marker['infowindow_content'] = $content3 ;
        		$marker['onclick'] = $row['id_reklame']; 
        		$marker['icon_scaledSize'] = '50,50';
        		$this->googlemaps->add_marker($marker);
        } 

        $data['map']=$this->googlemaps->create_map();  
        return $data;	  
	}  

    public function get_njob($luas, $ketinggian, $id_jenis_reklame)
    {
        //GET skor luar bidang
        if ($luas<=8)
        {
          $this->db->where('jenis_reklame',$id_jenis_reklame);
          $data_ketentuan = $this->db->get('ketentuan')->row_array();
          $x_luas =$data_ketentuan['luas_bidang_a'];
          $x_ketinggian =$data_ketentuan['ketinggian'];
        }
        else if ($luas>8) {
          $this->db->where('jenis_reklame',$id_jenis_reklame);
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

        return $NJOPLuas+$NJOPKetinggian;
    }

    public function get_nilai_strategis($klasifikasi_jalan, $jumlah_sisi, $ketinggian)
    {
        $data_reklame['klasifikasi_jalan'] = $klasifikasi_jalan;
        $data_reklame['jumlah_sisi'] = $jumlah_sisi+0;
        $data_reklame['ketinggian'] = $ketinggian+0;

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

      $data_balikan = array(
        'total_nilai_strategis' => number_format($total_nilai_strategis,2),  
        'bobot_total' => $bobot_total, 
    );

      return $data_balikan;
    }


        function getMapKosong()
        { 
               $this->load->library('googlemaps'); 

                $config['center'] = '-8.581252, 116.105441';
                $config['zoom'] = 14;
                $this->googlemaps->initialize($config);

                $marker = array();
                $marker['position'] = '-8.581252, 116.105441';
                $marker['draggable'] = true; 
                $marker['ondragend'] = '$(\'#latitude\').val(event.latLng.lat()); $(\'#longitude\').val(event.latLng.lng());';
                $this->googlemaps->add_marker($marker);
                $data = $this->googlemaps->create_map();
                return $data;     

        }  

        function getMapKosong2()
        { 
              $this->load->library('googlemaps');
                $config=array();
                $config['center'] = '-8.581252, 116.105441';
                $config['zoom']=14;
                $config['map_height']="550px";
                $config['map_width']="800px";   
  
                $config['onclick'] = '$(\'#latitude\').val(event.latLng.lat()); $(\'#longitude\').val(event.latLng.lng());'; 

                $this->googlemaps->initialize($config);
 
                $data=$this->googlemaps->create_map();   
                return $data;     
        }  
    
}
?>