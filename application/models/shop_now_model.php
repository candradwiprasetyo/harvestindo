<?php

class Shop_now_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_product() {
		$query = "select * from products order by product_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	
}