<?php

class Myaccount_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	

	function get_instant_mining($user_id){



		$sql = "select 
							sum(h.tr_amount) as result
					from transactions a 
					join tr_instant_minings b on b.tr_im_id = a.transaction_data_id
					join tr_instant_mining_details h on h.tr_im_id = b.tr_im_id
					join instant_mining_details c on c.imd_id = h.imd_id
					join instant_minings d on d.im_id = c.im_id
					join payment_methods e on e.payment_method_id = a.payment_method_id
					join status f on f.status_id = a.status_id
					
					where a.user_id = '$user_id' and a.transaction_type_id = '1' and a.status_id = 2 order by transaction_id";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['result'];
	
		

	}	
	
	
}