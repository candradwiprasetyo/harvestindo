<?php

class Home_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	function get_about()
	{
		$sql = "select page_content from pages where page_id = '1'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['page_content'];
	}

	function list_features() {
		$query = "select * from home_features order by feature_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function list_gallery() {
		$query = "select * from home_gallery where gallery_status = '1' order by gallery_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function list_how() {
		$query = "select * from home_how order by data_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function list_our_products() {
		$query = "select * from home_our_products order by data_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function list_products() {
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