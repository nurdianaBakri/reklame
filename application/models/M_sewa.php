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

	public function get_laporan($mulai, $akhir)
	{
		$q ="SELECT * FROM sewa where  tanggal_mulai_sewa between '$mulai' and '$akhir'";
		$hasil = $this->db->query($q)->result_array();

		$balikan = array(
			'q' => $q, 
			'hasil' => $hasil, 
		); 
		return $balikan;
	}
}
?>