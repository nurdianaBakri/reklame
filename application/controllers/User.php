<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller
{ 
	public function index()
	{
		$data['data'] = $this->M_user->getAll();

		$this->load->view('include/header');
		$this->load->view('user1/data',$data);
		$this->load->view('include/footer');
	}
	
	public function daftar()
	{
		$this->load->view('header');
		$this->load->view('beranda/form_daftar');
		$this->load->view('footer');
	} 

	public function do_daftar()
	{
		$no_ktp = $this->input->post('no_ktp');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$lingkungan = $this->input->post('lingkungan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$kecamatan = $this->input->post('kecamatan');
		$pekerjaan = $this->input->post('pekerjaan');
		$no_hp = $this->input->post('no_hp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'no_ktp'=>$no_ktp,
			'nama'=>$nama,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'lingkungan'=>$lingkungan,
			'kelurahan'=>$kelurahan,
			'rt'=>$rt,
			'rw'=>$rw,
			'kecamatan'=>$kecamatan,
			'pekerjaan'=>$pekerjaan,
			'no_hp'=>$no_hp,
			'username'=>$username,
			'jenis_user'=>"user",
			'password'=>md5($password),
		);

		$insert = $this->M_user->insert($data);
		if ($insert==true)
		{	
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"Pendaftaran berhasil, silahkan login");
			//redirect ke halaman login
			redirect('Login');
		}
		else
		{
			//tamahkan pesan gagal 
			var_dump($insert);
		}
	}

	public function detail($id_user)
	{
		echo "module sedang di kembangkan";
	}

	public function hapus($id_user)
	{
		$data = array('id_user' => $id_user );
		$insert = $this->M_user->hapus($data);
		if ($insert==true)
		{	
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"proses hapus user berhasil");
			//redirect ke halaman login
			redirect('User');
		}
		else
		{
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"proses hapus user berhasil gagal");
			//redirect ke halaman login
			redirect('User');
		}
	}

 
}