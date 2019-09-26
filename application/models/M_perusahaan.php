<?php

class M_perusahaan extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('penyewa');
	  return $query->result_array();	  
	}   

	function update($where,$data)
	{
		$this->db->where($where);
		return $this->db->update('penyewa', $data);
	}
 
}
?>