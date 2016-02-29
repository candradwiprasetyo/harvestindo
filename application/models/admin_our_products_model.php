<?php

class Admin_our_products_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_data() {
		$query = "select * from home_our_products order by data_id";
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
		$this->db->where('a.data_id', $id);
		$query = $this->db->get('home_our_products a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	
	

	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('data_id', $id);
		$this->db->update('home_our_products', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	

	
}