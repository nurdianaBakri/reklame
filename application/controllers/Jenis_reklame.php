<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Jenis_reklame extends CI_Controller
{ 
	public function index()
	{
		$data['data'] = $this->M_jenis_reklame->getAll();

		$this->load->view('include/header');
		$this->load->view('jenis_reklame/data',$data);
		$this->load->view('include/footer');
	}    

	public function hapus($id)
	{
		$where = array('id_jenis' => $id ); 
		$proses = $this->M_jenis_reklame->hapus($where);
		if ($proses==true)
		{	 
			$this->session->set_flashdata('pesan',"proses hapus berhasil"); 
		}
		else
		{
			$this->session->set_flashdata('pesan',"proses hapus gagal, silahkan coba lagi");		
		}
		redirect('Jenis_reklame'); 
		
	}

	public function form($id_jenis=null)
	{
		$data = array( );
		if ($id_jenis==null)
		{
			$data['data'] = array(
				'id_jenis' => null, 
				'nama' => null, 
			);
		}
		else
		{
			$where = array('id_jenis' => $id_jenis );
			$data['data'] = $this->M_jenis_reklame->detail($where)->row_array(); 
		}
			
		$this->load->view('include/header');
		$this->load->view('jenis_reklame/form',$data);
		$this->load->view('include/footer');
	}


	public function save()
	{
		$id_jenis = $this->input->post('id_jenis');
		$nama = $this->input->post('nama'); 

		$data = array( 
			'nama'=>$nama, 
		);
 
		if ($id_jenis==null)
		{
			$proses = $this->M_jenis_reklame->insert($data);
			if ($proses==true)
			{	 
				$this->session->set_flashdata('pesan',"proses insert berhasil"); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"proses insert gagal, silahkan coba lagi");		
			}
		}
		else
		{
			$where = array('id_jenis' => $id_jenis );
			$proses = $this->M_jenis_reklame->update($where,$data);
			if ($proses==true)
			{	 
				$this->session->set_flashdata('pesan',"proses update berhasil"); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"proses update gagal, silahkan coba lagi"); 
			}  
		}
		redirect('Jenis_reklame'); 
		 
	}
}