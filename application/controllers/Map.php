<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	function __construct()
	{
    	parent:: __construct(); 
	}  

	function index(){
		$data = $this->M_map->getAll();  
		$this->load->view('include/header');
		$this->load->view('map/index',$data);
		$this->load->view('include/footer'); 
	}  

	
	 
}
