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

	public function form($id_reklame=null)
	{
		$data = array( );
		$jenis_reklame= $this->M_jenis_reklame->getAll(); 

		if ($id_reklame==null)
		{
			$data['data'] = array( 
				'alamat'=>null, 
				'id_reklame'=>null, 
				'panjang'=>null,  
				'lebar'=>null,  
				'ketinggian'=>null,  
				'id_jenis_reklame'=>null,  
				'jenis_reklame'=>$jenis_reklame,  
				'latitude'=>null,  
				'longitude'=>null,  
				'deskripsi'=>null,  
				'jumlah_sisi'=>null,  
				'klasifikasi_jalan'=>null,  
			);
		}
		else
		{
			$where = array('id_reklame' => $id_reklame );
			$data['data'] = $this->M_Reklame->detail($where)->row_array(); 
			$data['data']['jenis_reklame'] = $jenis_reklame;
		}

		$data['map']=$this->M_map->getMapKosong();
			
		$this->load->view('include/header');
		$this->load->view('reklame/form',$data);
		$this->load->view('include/footer');
	}


	public function save()
	{
		$id_reklame = $this->input->post('id_reklame');
		$alamat = $this->input->post('alamat'); 

		$data = array( 
			'alamat'=>$alamat, 
			'panjang'=>$this->input->post('panjang'),  
			'lebar'=>$this->input->post('lebar'),  
			'ketinggian'=>$this->input->post('ketinggian'),  
			'id_jenis_reklame'=>$this->input->post('id_jenis_reklame'),  
			'latitude'=>$this->input->post('latitude'),  
			'longitude'=>$this->input->post('longitude'),  
			'deskripsi'=>$this->input->post('deskripsi'),  
			'jumlah_sisi'=>$this->input->post('jumlah_sisi'),  
			'klasifikasi_jalan'=>$this->input->post('klasifikasi_jalan'),  
		);
 
		if ($id_reklame==null)
		{
			$proses = $this->M_Reklame->insert($data);
			if ($proses==true)
			{	 
				$this->session->set_flashdata('pesan',"proses insert berhasil"); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"proses insert gagal, silahkan coba lagi");		
			}
			redirect('Reklame');  
		}
		else
		{
			$where = array('id_reklame' => $id_reklame );
			$proses = $this->M_Reklame->update($where,$data);
			if ($proses==true)
			{	 
				$this->session->set_flashdata('pesan',"proses update berhasil"); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"proses update gagal, silahkan coba lagi"); 
			}  
			redirect('Reklame/form/'.$id_reklame);  

		}
		 
	}

	public function hapus($id)
	{
		$where = array('id_reklame' => $id ); 
		$proses = $this->M_Reklame->hapus($where);
		if ($proses==true)
		{	 
			$this->session->set_flashdata('pesan',"proses hapus berhasil"); 
		}
		else
		{
			$this->session->set_flashdata('pesan',"proses hapus gagal, silahkan coba lagi");		
		}
		redirect('Reklame'); 
		
	}
}