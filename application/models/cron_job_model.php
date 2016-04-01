<?php

class Cron_job_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	function list_limit_transfer() {
		$query = "select * from transactions where status_id = '1' and payment_method_id = '1' order by transaction_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function get_utc_timestamp(){

		$sql = "SELECT UTC_TIMESTAMP as result";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['result'];

	}	
	
	function get_limit_transfer(){

		$sql = "SELECT limit_transfer as result from settings where id = '1'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['result'];

	}	
	
	function update_limit_transfer($data, $id){

		$this->db->trans_start();
		$this->db->where('transaction_id', $id);
		$this->db->update('transactions', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
}