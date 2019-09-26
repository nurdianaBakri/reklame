<?php

class M_sewa extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('sewa');
	  return $query->result_array();	  
	} 
 
	function insert($data)
	{
		return $this->db->insert('sewa',$data);
	} 

	function detail($where)
	{
		$this->db->where($where);
		return $this->db->get('sewa');
	} 

	function update($where,$data)
	{
		$this->db->where($where);
		return $this->db->update('sewa', $data);
	}
   
    
}
?>