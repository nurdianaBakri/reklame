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
        		$data_sewa2 = $data_sewa->row_array(); 
        		if ($data_sewa2['status_sewa']=='slot ada')
        		{
        			$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <center><a target='_blank' href='index.php/PenyewaanReklame/sewa/".$row['id_reklame']."'><p>Sewa Sekarang</a></center>";  
        		}
        		else
        		{  
        			$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tidak Tersedia</p> <center> Mulai sewa: ".$data_sewa2['tanggal_mulai_sewa']."</p> <p>Akhir Sewa :  ".$data_sewa2['tanggal_akhir_sewa']." </center>";
					
					 $marker['icon'] = 'https://smallimg.pngkey.com/png/small/129-1294584_vector-library-library-pins-clipart-map-pin-google.png';
        		}
        	}
        	else
        	{
        		$content3 = "<p>Alamat :  ".$row['alamat']."</p> <p>Status : Tersedia</p> <center><a href='PenyewaanReklame/sewa/".$row['id_reklame']."' onclick='window.open(this.href); return false;'><p>Sewa Sekarang</a></center>";   
        	}  
			
			$marker['infowindow_content'] = $content3 ;
			$marker['onclick'] = $row['id_reklame']; 
			$marker['icon_scaledSize'] = '25,32';
			$this->googlemaps->add_marker($marker);
		} 
        $data['map']=$this->googlemaps->create_map(); 

        return $data;	  
	}  
    
}
?>