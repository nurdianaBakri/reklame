<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Jenis_reklame extends CI_Controller
{ 
	public function index()
	{
		$data['data'] = $this->M_user->getAll();

		$this->load->view('include/header');
		$this->load->view('jenis_reklame/data',$data);
		$this->load->view('include/footer');
	} 
 
 
}