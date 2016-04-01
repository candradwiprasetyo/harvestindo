<?php

class Admin_limit_transfer_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	

	function read_id()
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$query = $this->db->get('settings a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}

	
	function create($data){

		$this->db->trans_start();
		$this->db->insert('settings', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('settings', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	
}