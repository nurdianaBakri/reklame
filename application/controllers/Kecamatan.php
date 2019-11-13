<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kecamatan extends CI_Controller
{ 
	public function index()
	{
		$data['data'] = $this->M_Kecamatan->getAll(); 
		$this->load->view('include/header');
		$this->load->view('Kecamatan/data',$data);
		$this->load->view('include/footer');
	}   

	public function form($id_kecamatan=null)
	{
		$data = array( ); 
		if ($id_kecamatan==null)
		{
			$data['data'] = array( 
				'id_kecamatan'=>null, 
				'nama_kecamatan'=>null,  
			);
		}
		else
		{
			$where = array('id_kecamatan' => $id_kecamatan );
			$data['data'] = $this->M_Kecamatan->detail($where)->row_array();  
		} 
			
		$this->load->view('include/header');
		$this->load->view('Kecamatan/form',$data);
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
			$proses = $this->M_Kecamatan->insert($data);
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
			$proses = $this->M_Kecamatan->update($where,$data);
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
		$proses = $this->M_Kecamatan->hapus($where);
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