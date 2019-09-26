<?php

class M_login extends CI_Model
{ 
	public function login($u, $p)
 	{
        $password = $p;
        $this->db->where('username',$u);
        $this->db->where('password',md5($p)); 
        $query = $this->db->get('user'); 

		if($query->num_rows()==1)// beriksa baris ada atau tidak 
		{ 
            foreach ($query->result() as $row){ 
            $data = array(
                'username'=> $row->username,
                'no_ktp'=> $row->no_ktp, 
                'nama'=> $row->nama, 
                'jenis_user'=>$row->jenis_user,
                'logged_in'=>TRUE
            );

            $_SESSION['no_ktp'] = $row->no_ktp;
            $_SESSION['username'] = $row->username;
            $_SESSION['nama'] = $row->nama;
            $_SESSION['jenis_user'] = $row->jenis_user; 
        } 
        $this->session->set_userdata($data);
        return TRUE;
      }
    	else
    	{
            return FALSE;
    	}
    } 

    //memriksa login apa tidak, jika tidak , maka akan kembali ke index.php
	//jika login, maka akan ke home.php
	 public function isLoggedIn()
	 { 
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        
        $is_logged_in = $this->session->userdata('logged_in');

        if(!isset($is_logged_in) || $is_logged_in!==TRUE)
        {
            redirect('/'); // tanda "/" merupakan tanda index(login)
            exit;
        }
    }  
}
?>