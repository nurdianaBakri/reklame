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
                			$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <center><a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  

                                        $marker['icon'] = './assets4/images/pinhijau.png';
                		}
                                else if ($data_sewa2['status_sewa']=='tertolak') {
                                        $content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <center><a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  
                                        $marker['icon'] = './assets4/images/pinhijau.png'; 
                                }
                                else if ($data_sewa2['status_sewa']=='belum di bayar' && $data_sewa2['status_pajak']=='belum di bayar') {
                                        $content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <p>Jumlah Pemesan : ".$jumlah_pelamar."</p><center> <a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  
                                        $marker['icon'] = './assets4/images/pinkuning.png'; 
                                }
                                //cek apakah hari ini lebih kecil sama dengan tanggal mulai sewa 

                		else
                		{  
                			$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tidak Tersedia</p> <center> Mulai sewa: ".$data_sewa2['tanggal_mulai_sewa']."</p> <p>Akhir Sewa :  ".$data_sewa2['tanggal_akhir_sewa']." </center>";
                				
                		      $marker['icon'] = './assets4/images/pinmerah.png';
                		}
                	}
                	else
                	{
                		$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <center><a href='PenyewaanReklame/sewa/".$row['id_reklame']."' onclick='window.open(this.href); return false;'><p>Sewa Sekarang</a></center>";   

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