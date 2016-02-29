<?php

class Gallery_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_gallery() {
		$query = "select * from home_gallery order by gallery_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	
}