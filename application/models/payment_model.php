<?php

class Payment_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	

	function read_id($id)
	{
		$this->db->select('a.*, b.imd_time, c.user_email, d.im_name, d.im_subname', 1); // ambil seluruh data
		$this->db->join('instant_mining_details b', 'b.imd_id = a.imd_id');
		$this->db->join('users c', 'c.user_id = a.user_id');
		$this->db->join('instant_minings d', 'd.im_id = b.im_id');
		$this->db->where('a.user_id', $id);
		$query = $this->db->get('tr_instant_mining_details_tmp a'); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	function get_data_invoice($id)
	{
		$this->db->select('a.*, c.payment_method_name, d.user_email', 1); // ambil seluruh data
		$this->db->join('payment_methods c', 'c.payment_method_id = a.payment_method_id');
		$this->db->join('users d', 'd.user_id = a.user_id');
		$this->db->where('a.transaction_id', $id);
		
		$query = $this->db->get('transactions a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	
	function list_data($id) {
		$query = "select a.*, b.imd_time, c.user_email, d.im_name, d.im_subname
					from tr_instant_mining_details_tmp a
					join instant_mining_details b on b.imd_id = a.imd_id
					join users c on c.user_id = a.user_id
					join instant_minings d on d.im_id = b.im_id
					where a.user_id = '$id'
					";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function list_data_invoice($id) {
		$query = "select c.* ,d.imd_time, e.im_name, e.im_subname
					from transactions a
					join tr_instant_minings b on b.tr_im_id = a.transaction_data_id
					join tr_instant_mining_details c on c.tr_im_id = b.tr_im_id
					join instant_mining_details d on d.imd_id = c.imd_id
					join instant_minings e on e.im_id = d.im_id
					where a.transaction_id = '$id'
					";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}

	function create($data){

		$this->db->trans_start();
		$this->db->insert('tr_instant_minings', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function create_detail($data){

		$this->db->trans_start();
		$this->db->insert('tr_instant_mining_details', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function create_transaction($data){

		$this->db->trans_start();
		$this->db->insert('transactions', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function delete($id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->delete('tr_instant_mining_details_tmp');
		$this->db->trans_complete();
		
	}
	
	function delete_detail($id){

		$this->db->trans_start();
		$this->db->where('tr_id', $id);
		$this->db->delete('tr_instant_mining_details_tmp');
		$this->db->trans_complete();
		
	}
	
	function cancel_payment($id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->delete('tr_instant_mining_details_tmp');
		$this->db->trans_complete();
		
	}
	
	function get_email($user_id)
	{
		$sql = "select user_email as result from users where user_id = '$user_id'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		
		return $result['result'];
	}
	
	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('tr_im_id', $id);
		$this->db->update('tr_instant_minings', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	function get_rate_dollar(){



		$sql = "select m_rate_dollar from m_rates where m_rate_id = '1'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['m_rate_dollar'];
	
		

	}	
	
	function get_utc_timestamp(){

		$sql = "SELECT UTC_TIMESTAMP as result";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['result'];
	
		

	}	
	
	
}