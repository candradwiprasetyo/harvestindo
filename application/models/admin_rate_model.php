<?php

class Admin_rate_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	

	function read_id($id)
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$this->db->where('a.m_rate_id', $id);
		$query = $this->db->get('m_rates a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}

	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('m_rate_id', $id);
		$this->db->update('m_rates', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	
}