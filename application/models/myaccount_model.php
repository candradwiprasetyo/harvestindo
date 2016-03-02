<?php

class Myaccount_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	

	function read_id($id)
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$this->db->where('a.page_id', $id);
		$query = $this->db->get('pages a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}

	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('page_id', $id);
		$this->db->update('pages', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	
}