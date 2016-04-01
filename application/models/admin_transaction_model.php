<?php

class Admin_transaction_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_data() {
		$query = "select a.*, 
								  								b.user_first_name,
																b.user_email,
																c.transaction_type_name,
																d.status_name,
																e.payment_method_name 
								  						from transactions a
														join users b on b.user_id = a.user_id
														join transaction_types c on c.transaction_type_id = a.transaction_type_id
														join status d on d.status_id = a.status_id
														join payment_methods e on e.payment_method_id = a.payment_method_id
														order by a.transaction_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function list_data_detail1($tr_im_id) {
		$query = "select 
							a.*, 
							d.im_name, d.im_subname,
							c.imd_rate1, c.imd_rate2, tr_amount,
							c.imd_time, h.tr_total_price,
							e.payment_method_name,
							f.status_name,
							g.transaction_type_name
					from transactions a 
					join tr_instant_minings b on b.tr_im_id = a.transaction_data_id
					join tr_instant_mining_details h on h.tr_im_id = b.tr_im_id
					join instant_mining_details c on c.imd_id = h.imd_id
					join instant_minings d on d.im_id = c.im_id
					join payment_methods e on e.payment_method_id = a.payment_method_id
					join status f on f.status_id = a.status_id
					join transaction_types g on g.transaction_type_id = a.transaction_type_id
					where b.tr_im_id = '$tr_im_id' order by transaction_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}

	function approve($id){
		$data['status_id'] = 2;
		$this->db->trans_start();
		$this->db->where('transaction_id', $id);
		$this->db->update('transactions', $data);
	
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
	
	
	
	
}