<?php

class M_penyewa extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('penyewa');
	  return $query->result_array();	  
	} 
 
	function insert($data)
	{
		return $this->db->insert('penyewa',$data);
	} 

	function detail($where)
	{
		$this->db->where($where);
		return $this->db->get('penyewa');
	}
    
}
?>