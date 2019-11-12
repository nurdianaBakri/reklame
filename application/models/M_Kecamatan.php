<?php

class M_Kecamatan extends CI_Model
{ 
	function getAll()
	{ 
	  $query = $this->db->get('kecamatan');
	  return $query->result_array();	  
	} 
 
	function insert($data)
	{
		return $this->db->insert('kecamatan',$data);
	} 

	function detail($where)
	{
		$this->db->where($where);
		return $this->db->get('kecamatan');
	} 

	function update($where,$data)
	{
		$this->db->where($where);
		return $this->db->update('kecamatan', $data);
	}
   
    
}
?>