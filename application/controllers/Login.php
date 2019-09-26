<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller
{ 

	public function index()
	{ 
		$this->load->view('login/login'); 
	}

	public function getLogin ()
	{  
		$u = $this->input->post('username');
		$p = $this->input->post('password');


		//cek kosong apa tidak 
		if ($u == ""|| $p == ""){

			$data['title']="Login"; 
			//tampilkan pesan 
			$this->session->set_flashdata('pesan',"Username atau Password Tidak Boleh Kosong");  
			redirect ('Login');
		}
		else
		{ 
			$result = false; 
			$result= $this->M_login->login($u, $p);
			if ($result==false)
			{
				$this->session->set_flashdata('pesan',"Username atau Password Tidak cocok");  
				redirect ('Login');
				# code...
			}
			else
			{
				if ($this->session->userdata('jenis_user')=='admin')
				{ 
					redirect('PenyewaanReklame'); 
				}
				else
				{
					redirect('PenyewaanReklame');
				} 

			}
		}
	}  

	public function reset2()
	{	 
		$data = array
		( 
		  'email' => $this->input->post('email'),
		  'username' => $this->input->post('username'),
		  'password' => $this->input->post('password'),
	   );

		$a=$this->M_login->editDataEnduser("enduser",$data);
			if ($a== TRUE){
			redirect("sadmLoginC/login");
		}
		else $this->load->view('login/sadmResetV');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect ("Login");

	}
 
}