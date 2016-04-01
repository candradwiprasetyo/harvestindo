<?php

class Admin_payment_method_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_data() {
		$query = "select * from payment_methods order by payment_method_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}

	function change_status($data, $id){

		$this->db->trans_start();
		$this->db->where('payment_method_id', $id);
		$this->db->update('payment_methods', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	


}