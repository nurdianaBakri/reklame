<?php

class M_jenis_reklame extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('jenis_reklame');
	  return $query->result_array();	  
	} 
 
	function insert($data)
	{
		return $this->db->insert('jenis_reklame',$data);
	} 

	function detail($where)
	{
		$this->db->where($where);
		return $this->db->get('jenis_reklame');
	}

	function update($where,$data)
	{
		$this->db->where($where);
		return $this->db->update('jenis_reklame', $data);
	}

	function hapus($where)
	{
		$this->db->where($where);
		return $this->db->delete('jenis_reklame');
	}
    
}
?>