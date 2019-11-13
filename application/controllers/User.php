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

	 public function do_upload()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data()); 
                    var_dump($data);

            }
    }
	
	public function daftar()
	{
		$data['kecamatan']=$this->M_Kecamatan->getAll();

		$this->load->view('header',$data);
		$this->load->view('beranda/form_daftar',$data);
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
			'scan_ktp'=>"user_".$no_ktp.'.png',
			'pekerjaan'=>$pekerjaan,
			'no_hp'=>$no_hp,
			'scan_ktp'=>"user_".$no_ktp.".png",
			'username'=>$username,
			'jenis_user'=>"user", 
			'password'=>md5($password),
		);
 
 
		//uplod file
		$file_name = "user_".$no_ktp;
		$uploadfile = $this->doConfig($file_name); 
 
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
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"Pendaftaran gagal, silahkan cobba lagi");
			//redirect ke halaman login
			redirect('Login');
		}
	}

	public function do_update()
	{
		$no_ktp = $this->input->post('no_ktp');
		$no_ktp_old = $this->input->post('no_ktp_old');
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
		$password2 = $this->input->post('password2');

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
			
		);

		if ($password!="" || $password!=null)
		{
			if ($password==$password2)
			{
				# code...
				$data['password'] = md5($password);
			}
			else
			{
				$this->session->set_flashdata('pesan',"update user gagal, karena password dan konfirmasi password tidak cocok, silahkan login");
				redirect('User/detail/'.$no_ktp);
			}
		}

		if (empty($_FILES['file_ktp']['name'])) {
			
		} 
		else
		{ 
			$data['scan_ktp'] = "user_".$no_ktp.".png"; 

			//uplod file
			$file_name = "user_".$no_ktp;
			$uploadfile = $this->doConfig($file_name); 
		}

		$where = array('no_ktp' => $no_ktp_old ); 
		$insert = $this->M_user->update($where, $data);
		if ($insert==true)
		{	
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"update user berhasil, silahkan login");
			redirect('User/detail/'.$no_ktp);
		}
		else
		{
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"update user gagal, silahkan cobba lagi");
			redirect('User/detail/'.$no_ktp);
		}
	}


 	public function doConfig($file_name)
    {
    	$data = array();
    	$config['upload_path']        = './uploads/';
		$config['file_name']          = $file_name.".png";
        $config['allowed_types']      = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['overwrite'] = TRUE;

		$path = $_FILES['file_ktp']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file_ktp'))
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

	public function detail($no_ktp)
	{
		$data['kecamatan']=$this->M_Kecamatan->getAll();

		$where = array(
			'no_ktp' => $no_ktp, 
		);
		$data['data'] = $this->M_user->detail($where)->row_array();

		$this->load->view('include/header');
		$this->load->view('user1/detail',$data);
		$this->load->view('include/footer');
	}

	public function profile()
	{
		$no_ktp = $this->session->userdata('no_ktp');
		$data['kecamatan']=$this->M_Kecamatan->getAll();

		
		$where = array(
			'no_ktp' => $no_ktp, 
		);
		$data['data'] = $this->M_user->detail($where)->row_array();
 		 
 		$where = array(
			'id_user' => $no_ktp, 
		); 
		$data['data_perusahaan'] =  $this->M_penyewa->detail($where)->row_array();  
 
		$this->load->view('include/header');
		$this->load->view('user1/profile',$data);
		$this->load->view('include/footer');
	}

	public function hapus($no_ktp)
	{
		$data = array('no_ktp' => $no_ktp );
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