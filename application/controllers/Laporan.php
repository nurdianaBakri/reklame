<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Laporan extends CI_Controller
{ 
	public function index()
	{ 
		$this->load->view('include/header');
		$this->load->view('laporan/form');
		$this->load->view('include/footer');
	}   

	public function cari()
	{  

		$tgl_akhir = $this->input->post('tgl_akhir');
		$tgl_mulai = $this->input->post('tgl_mulai'); 
		//get laporan 

		$data = $this->M_sewa->get_laporan($tgl_mulai, $tgl_akhir); 

		// var_dump($data);
		 
		$this->load->view('include/header');
		$this->load->view('laporan/data',$data);
		$this->load->view('include/footer');
	}


	public function save()
	{
		$id_kecamatan = $this->input->post('id_kecamatan'); 
		$data = array( 
			'nama_kecamatan'=>$this->input->post('nama_kecamatan'),    
		);
 
		if ($id_kecamatan==null)
		{
			$proses = $this->M_sewa->insert($data);
			if ($proses==true)
			{	 
				$this->session->set_flashdata('pesan',"proses insert berhasil"); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"proses insert gagal, silahkan coba lagi");		
			}
			redirect('Kecamatan');  
		}
		else
		{
			$where = array('id_kecamatan' => $id_kecamatan );
			$proses = $this->M_sewa->update($where,$data);
			if ($proses==true)
			{	 
				$this->session->set_flashdata('pesan',"proses update berhasil"); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"proses update gagal, silahkan coba lagi"); 
			}  
			redirect('Kecamatan/form/'.$id_kecamatan); 
		}
		 
	}

	public function hapus($id)
	{
		$where = array('id_kecamatan' => $id ); 
		$proses = $this->M_sewa->hapus($where);
		if ($proses==true)
		{	 
			$this->session->set_flashdata('pesan',"proses hapus berhasil"); 
		}
		else
		{
			$this->session->set_flashdata('pesan',"proses hapus gagal, silahkan coba lagi");		
		}
		redirect('Kecamatan'); 
		
	}
}