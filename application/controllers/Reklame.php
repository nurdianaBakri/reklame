<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reklame extends CI_Controller
{ 
	public function index()
	{
		$data['data'] = $this->M_user->getAll();

		$this->load->view('include/header');
		$this->load->view('jenis_reklame/data',$data);
		$this->load->view('include/footer');
	}   

	public function detail($id)
	{
		echo "module sedang di buat";
	}

	public function hapus($id)
	{
		echo "module sedang di buat";
	}
}