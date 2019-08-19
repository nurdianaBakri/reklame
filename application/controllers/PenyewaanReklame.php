<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class PenyewaanReklame extends CI_Controller
{  
	function __construct()
	{
    	parent:: __construct(); 
		if (!isset ($_SESSION ['no_ktp'])){
			redirect("Login");
		}  

		// var_dump($_SESSION ['no_ktp']);
	} 

	public function index()
	{
		$a = $this->session->userdata('jenis_user');


		//jika jenis user== 'admin'
		if($a =='admin'){ 
			$data['data'] = $this->M_sewa->getAll();  
			$this->load->view('include/header');
			$this->load->view('penyewaan/data', $data);
			$this->load->view('include/footer');  
		}

		//jika jenis user =='user'
		else {
			//get id user 
			$id_user = $this->session->userdata('no_ktp'); 

			//get id penyewa by id user 
			$data_penyewa = $this->M_penyewa->detail(array('id_user' => $id_user));

			var_dump($data_penyewa->num_rows());


			if ($data_penyewa->num_rows()>0)
			{
				$data_penyewa2 = $data_penyewa->row_array(); 
				$id_penyewa = $data_penyewa2['id_penyewa'];

				//jika user memiliki data perusahaan, arahkan user ke halaman sewa
				//get data sewa by id_penyewa 
				$data['data'] = $this->M_sewa->detail( array('id_penyewa' => $id_penyewa ))->result_array();  
				$this->load->view('include/header');
				$this->load->view('penyewaan/data', $data);
				$this->load->view('include/footer');
			}
			else
			{
				//jika user belum menyisi dta perusahaan, arahakan ke halaman isi data perusahaan 
				$data['id_reklame'] = null;
				$this->form_perusahaan2($data);
			}    
		}
	}

	public function sewa($id_reklame)
	{
		//cek login

		//jika sudah login,
		//arahkan ke halaman form isi data perusahaan
		$where = array('id_reklame' => $id_reklame );
		$data['data_reklame'] = $this->M_Reklame->detail($where)->row_array(); 

		//get data jenis reklame
		$where2 = array('id_jenis' => $data['data_reklame']['id_jenis_reklame'] );
		$data['data_jenis_reklame'] = $this->M_jenis_reklame->detail($where2)->row_array(); 


		$a = $this->session->userdata('jenis_user');
		if($a =='admin'){ 
			redirect('PenyewaanReklame'); 
		}
		else
		{
			//get data perusahaan/data penyewa user yang login   
			$where3 = array('id_user' =>$this->session->userdata('no_ktp') );
			$data_penyewa = $this->M_penyewa->detail($where3); 

			if ($data_penyewa->num_rows()>0)
			{
				$data['data_penyewa'] = $data_penyewa->row_array();
				$data['data_sewa']['lama_sewa'] = null;
				$data['data_sewa']['tanggal_mulai_sewa'] = null; 
				$data['data_sewa']['produk_rokok'] = 0; 
				$data['jenis_aksi'] ="add";  
				$data['id_sewa'] =null;  

				//arahkan ke halaman form sewa
				$this->load->view('include/header');
				$this->load->view('penyewaan/form_sewa', $data);
				$this->load->view('include/footer'); 
			}
			else
			{
				//arahkan ke halaman isi data penyewa/perusahaan 
				$data['id_reklame'] = $id_reklame;
				$this->form_perusahaan2($data);
			}
		}  
	}

	public function form_perusahaan2($data)
	{ 
		$this->load->view('include/header');
		$this->load->view('penyewaan/form_perusahaan2', $data);
		$this->load->view('include/footer'); 
	}

	public function do_sewa()
	{
		$jenis_aksi = $this->input->post('jenis_aksi');
		$id_reklame = $this->input->post('id_reklame');
		$id_penyewa = $this->input->post('id_penyewa');
		$id_user = $this->input->post('id_user');
		$id_reklame = $this->input->post('id_reklame'); 
		$produk_rokok = $this->input->post('produk_rokok'); 
		$lama_sewa = $this->input->post('lama_sewa'); 
		$status_pajak = $this->input->post('status_bayar_pajak');
		$status_sewa = $this->input->post('status_bayar_sewa');
		$tanggal_mulai_sewa = $this->input->post('tanggal_mulai_sewa'); 

		//tentukan tanggal berakhir sewa
		$text = " +".$lama_sewa." months"; 
	    $tanggal_akhir_sewa = date("Y-m-d", strtotime($text, strtotime($tanggal_mulai_sewa))); 

	    $data = array(
			'id_reklame'=>$id_reklame,
			'id_penyewa'=>$id_penyewa, 
			'id_user'=>$id_user, 
			'produk_rokok'=>$produk_rokok, 
			'id_reklame'=>$id_reklame, 
			'lama_sewa'=>$lama_sewa,
			'status_pajak'=>$status_pajak,
			'status_sewa'=>$status_sewa,
			'tanggal_mulai_sewa'=>$tanggal_mulai_sewa,
			'tanggal_akhir_sewa'=>$tanggal_akhir_sewa 
		); 
 
		if ($jenis_aksi=="add")
		{
			$aksi = $this->M_sewa->insert($data); 
			if ($aksi==true)
			{	
				//tambahkan pesan berhasil 
				$this->session->set_flashdata('pesan',"Proses sewa reklame berhasil"); 
				redirect('PenyewaanReklame/sewa/'.$id_reklame); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"Proses sewa reklame berhasil"); 
				echo $this->session->flashdata('pesan');
			}
		}
		else
		{
			$id_sewa = $this->input->post('id_sewa'); 
			$where = array('id_sewa' => $id_sewa );
			$aksi = $this->M_sewa->update($where, $data); 
			if ($aksi==true)
			{	
				//tambahkan pesan berhasil 
				$this->session->set_flashdata('pesan',"Proses sewa reklame berhasil"); 
				redirect('PenyewaanReklame/detail/'.$id_sewa); 
			}
			else
			{
				$this->session->set_flashdata('pesan',"Proses sewa reklame berhasil"); 
				echo $this->session->flashdata('pesan');
			} 
		}
			
	}
	
	public function do_daftar()
	{
		$id_reklame = $this->input->post('id_reklame');
		$id_user = $this->input->post('id_user');
		$nama_perusahaan = $this->input->post('nama_perusahaan'); 
		$kode_pos = $this->input->post('kode_pos'); 
		$lingkungan = $this->input->post('lingkungan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$kecamatan = $this->input->post('kecamatan'); 
		$no_telp_kantor = $this->input->post('no_telp_kantor'); 

		$data = array(
			'id_user'=>$id_user,
			'nama_perusahaan'=>$nama_perusahaan, 
			'kode_pos'=>$kode_pos, 
			'lingkungan'=>$lingkungan,
			'kelurahan'=>$kelurahan,
			'rt'=>$rt,
			'rw'=>$rw,
			'kecamatan'=>$kecamatan, 
			'no_telp_kantor'=>$no_telp_kantor,
		);

		$insert = $this->M_penyewa->insert($data);
		if ($insert==true)
		{	
			//tambahkan pesan berhasil 
			$this->session->set_flashdata('pesan',"Pendaftaran Penyewa berhasil, silahkan login");
			if (isset($id_reklame)) {
				//redirect ke halaman sewa reklame
				redirect('PenyewaanReklame/sewa/'.$id_reklame);
			}
			else
			{
				echo "redirect ke halaman data reklame (map)";
			}
		}
		else
		{
			echo "redirect ke halaman isi data perusahaan (form)";

		}
	}

	public function detail($id_sewa)
	{
		//get dta sewa dari id sewa 
		$data_sewa = $this->M_sewa->detail( array('id_sewa' => $id_sewa ))->row_array();

		//get data penyewa dari data sewa 
		$where3 = array('id_penyewa' =>$data_sewa['id_penyewa'] );
		$data_penyewa = $this->M_penyewa->detail($where3)->row_array(); 

		//get data reklame dari data sewa 
		$where3 = array('id_reklame' =>$data_sewa['id_reklame'] );
		$data_reklame = $this->M_Reklame->detail($where3)->row_array(); 

		//get data jenis reklame
		$where2 = array('id_jenis' => $data_reklame['id_jenis_reklame'] );
		$data['data_jenis_reklame'] = $this->M_jenis_reklame->detail($where2)->row_array(); 

		$data['data_sewa'] =$data_sewa;
		$data['id_sewa'] =$data_sewa['id_sewa'];
		$data['data_penyewa'] =$data_penyewa;
		$data['data_reklame'] =$data_reklame; 
		$data['jenis_aksi'] ="edit";  

		$this->load->view('include/header');
		$this->load->view('penyewaan/form_sewa', $data);
		$this->load->view('include/footer'); 
	}

	public function hapus($id_sewa)
	{
		echo "module belum di buat";
	}

	public function print($id_sewa)
	{

		//get dta sewa dari id sewa 
		$data_sewa = $this->M_sewa->detail( array('id_sewa' => $id_sewa ))->row_array();

		//get data penyewa dari data sewa 
		$where3 = array('id_penyewa' =>$data_sewa['id_penyewa'] );
		$data_penyewa = $this->M_penyewa->detail($where3)->row_array(); 

		//get data reklame dari data sewa 
		$where3 = array('id_reklame' =>$data_sewa['id_reklame'] );
		$data_reklame = $this->M_Reklame->detail($where3)->row_array(); 

		//get data jenis reklame
		$where2 = array('id_jenis' => $data_reklame['id_jenis_reklame'] );
		$data['data_jenis_reklame'] = $this->M_jenis_reklame->detail($where2)->row_array(); 

		$data['data_sewa'] =$data_sewa;
		$data['id_sewa'] =$data_sewa['id_sewa'];
		$data['data_penyewa'] =$data_penyewa;
		$data['data_reklame'] =$data_reklame; 

		$data['id_sewa'] = $id_sewa;
		$this->load->view('include/header');
		$this->load->view('penyewaan/print', $data);
		$this->load->view('include/footer'); 
	}
 
}