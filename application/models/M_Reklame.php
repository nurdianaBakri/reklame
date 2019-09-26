<?php

class M_Reklame extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('reklame');
	  return $query->result_array();	  
	} 
 
	function insert($data)
	{
		return $this->db->insert('reklame',$data);
	}

	function detail($where)
	{
		$this->db->where($where);
		return $this->db->get('reklame');
	} 

	function update($where,$data)
	{
		$this->db->where($where);
		return $this->db->update('reklame', $data);
	}

	function hapus($where)
	{
		$this->db->where($where);
		return $this->db->delete('reklame');
	}
   
    
}
?>