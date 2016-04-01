<?php

class Buy_hashrate_model extends CI_Model{

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

	function create($data){

		$this->db->trans_start();
		$this->db->insert('tr_instant_mining_details_tmp', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function delete($id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->delete('tr_instant_minings_tmp');
		$this->db->trans_complete();
		
	}
	
	function get_rate(){



		$sql = "select m_rate_btc from m_rates where m_rate_id = '1'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['m_rate_btc'];
	
		

	}	
	
	function get_rate_dollar(){



		$sql = "select m_rate_dollar from m_rates where m_rate_id = '1'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['m_rate_dollar'];
	
		

	}	
	
}