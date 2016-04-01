<?php

class Admin_instant_mining_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_data() {
		$query = "select * from instant_minings order by im_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}

	function read_id($id)
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$this->db->where('a.im_id', $id);
		$query = $this->db->get('instant_minings a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	function read_detail_id($id)
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$this->db->where('a.imd_id', $id);
		$query = $this->db->get('instant_mining_details a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	
	
	function create($data){

		$this->db->trans_start();
		$this->db->insert('instant_minings', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('im_id', $id);
		$this->db->update('instant_minings', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	
	function delete($id){

		$this->db->trans_start();
		$this->db->where('im_id', $id);
		$this->db->delete('instant_minings');
		$this->db->where('im_id', $id);
		$this->db->delete('instant_mining_details');
		$this->db->trans_complete();
		
	}
	
	function create_detail($data){

		$this->db->trans_start();
		$this->db->insert('instant_mining_details', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function update_detail($data, $id){

		$this->db->trans_start();
		$this->db->where('imd_id', $id);
		$this->db->update('instant_mining_details', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	
	function delete_detail($id){

		$this->db->trans_start();
		$this->db->where('imd_id', $id);
		$this->db->delete('instant_mining_details');
		$this->db->trans_complete();
		
	}

	
	
}