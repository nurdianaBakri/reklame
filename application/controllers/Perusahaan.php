<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Perusahaan extends CI_Controller
{  
	function __construct()
	{
    	parent:: __construct(); 
		if (!isset ($_SESSION ['no_ktp'])){
			redirect("Login");
		}    
	}   
	 
	public function do_update()
	{ 
		$id_user = $this->input->post('id_user'); 
		$id_penyewa = $this->input->post('id_penyewa'); 
		$nama_perusahaan = $this->input->post('nama_perusahaan'); 
		$kode_pos = $this->input->post('kode_pos'); 
		$lingkungan = $this->input->post('lingkungan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$kecamatan = $this->input->post('kecamatan'); 
		$no_telp_kantor = $this->input->post('no_telp_kantor'); 
		$npwp = $this->input->post('npwp');   
		$scan_npwp = "perusahaan_".$id_user;  

		$data = array( 
			'nama_perusahaan'=>$nama_perusahaan, 
			'kode_pos'=>$kode_pos, 
			'lingkungan'=>$lingkungan,
			'kelurahan'=>$kelurahan,
			'rt'=>$rt,
			'rw'=>$rw,
			'kecamatan'=>$kecamatan, 
			'no_telp_kantor'=>$no_telp_kantor,
			'npwp'=>$npwp,
			'scan_npwp'=>$scan_npwp.".png",
		);

		$uploadfile="";

		if (empty($_FILES['scan_npwp']['name'])) {
			
		} 
		else
		{ 
			$data['scan_npwp'] = $scan_npwp.".png"; 

			//uplod file
			$file_name = $scan_npwp;
			$uploadfile = $this->doConfig($file_name); 
		}

		//uplod file
		// $uploadfile = $this->doConfig($scan_npwp);   

		$where = array('id_penyewa' => $id_penyewa );

		$insert = $this->M_perusahaan->update($where, $data);
		if ($insert==true)
		{	
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"Proses update data perusahaan/penyewa berhasil, silahkan pilih titik reklame yang ingin anda sewa "); 
			redirect('User/profile/'); 
		}
		else
		{
			$this->session->set_flashdata('pesan',"Proses update data perusahaan/penyewa/perusahaan gagal, silahkan coba lagi");  
			redirect('User/profile'); 

		}
	}

	public function doConfig($file_name)
    {
    	$data = array();
    	$config['upload_path']        = './uploads/';
		$config['file_name']          = $file_name.".png";
        $config['allowed_types']      = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['overwrite'] = TRUE;

		$path = $_FILES['scan_npwp']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('scan_npwp'))
        {
            $data = array(
                'berhasil' =>FALSE ,
                'error' => $this->upload->display_errors(),
            );
        }
        else
        {
            $upload = $this->upload->data();
            $data = array(
                'berhasil' =>TRUE ,
                'error' => $upload,
            );
        }
        return $data;
    } 
 
}