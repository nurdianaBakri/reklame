<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
    	parent:: __construct(); 
	}  

	function index(){ 
		$data = $this->M_map->getAll();

        $this->load->view('header');
		$this->load->view('beranda/index',$data);
		$this->load->view('footer');  
	}  

	
	public function filter_reklame()
	{

		//tangkap kd filter dari view 
		$kd_filter =$this->input->post('kd_filter');
		var_dump($kd_filter);

		$data = array();

		$this->load->library('googlemaps');
        $config=array();
        $config['center'] = '-8.581252, 116.105441';
        $config['zoom']=14;
        $config['map_height']="400px";
        $this->googlemaps->initialize($config);

		//jika user memilih semua
		if ($kd_filter=="1")
		{
			$dataMarker =$this->M_Reklame->getAll();
	        foreach($dataMarker as $row)
			{ 
				$marker = array();
				$lat = $row['latitude'];
				$lng = $row['longitude'];
				$pst = $lat.','.$lng;
				$marker['position'] = $pst;
				$content3 = "<center><a href='faskesTunggal/".$row['id_reklame']."' onclick='window.open(this.href); return false;'><p>Details</a></center>";
				$marker['infowindow_content'] = $content3 ;
				$marker['onclick'] = $row['id_reklame']; 
				$marker['icon_scaledSize'] = '25,32';
				$this->googlemaps->add_marker($marker);
			} 
	        $data['map']=$this->googlemaps->create_map(); 
		}

		//jika user memilih papan reklame yang sudah habis 
		//masa kontrak
		else
		{
	        $data['map']=$this->googlemaps->create_map(); 
		}

		$this->load->view('beranda/hasil_filter',$data);

	}
}
