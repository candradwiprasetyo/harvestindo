<?php

class Mytransaction_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	

	
	function list_transaction($user_id) {
		$query = "select 
							a.*, 
							d.im_name, d.im_subname,
							c.imd_rate1, c.imd_rate2, tr_amount,
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
					where a.user_id = '$user_id' order by transaction_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	
}