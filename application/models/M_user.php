<?php

class M_user extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('user');
	  return $query->result_array();	  
	} 
 
	function insert($data)
	{
		return $this->db->insert('user',$data);
	} 

	public function hapus($where)
	{
		$this->db->where($where);
		return $this->db->delete('user');
	}

	function detail($where)
	{
		$this->db->where($where);
		return $this->db->get('user');
	}
   
    
}
?>