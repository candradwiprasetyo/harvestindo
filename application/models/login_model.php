<?php

class Login_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	function is_valid($username, $password)
	{
	
		$options = array('cost' => 11);
		$hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
		
		if (password_verify('rasmuslerdorf', $hash)) {
			echo 'Password is valid!';
		} else {
			echo 'Invalid password.';
		}
		
		
		$param['user_username'] = $username;
		$param['user_password'] = $password;
		$param['user_active_status'] = '1';
		
		$query = $this->db->get_where('users u', array('user_type_id != 1  && `user_username` =' => $username, 'user_active_status' => 1));

		if ($query->num_rows() == 0) return NULL;
		$data = $query->row_array();
		
		if (password_verify($password, $data['user_password'])) {
			return array($data['user_id'], $data['user_type_id']);
		}else{
			return NULL;
		}
	}
	
	function is_facebook_valid($username)
	{
		$param['user_username'] = $username;
		$param['user_active_status'] = '1';
		
		$query = $this->db->get_where('users', $param);
		
		# debug($this->db->last_query());

		if ($query->num_rows() == 0) return NULL;
		$data = $query->row_array();
		
		return array($data['user_id'], $data['user_type_id']);
	}
	
	function create_user($data){
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		if($data['user_type_id'] == 2){
			$data_creative['user_id'] = $id;
			$this->db->insert('creatives', $data_creative);
		}
		
		$this->db->trans_complete();
		return $id;
	}
	
	function create_user_facebook($data, $data_creative){
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		if($data['user_type_id'] == 2){
			$data_creative['user_id'] = $id;
			$this->db->insert('creatives', $data_creative);
		}
		
		$this->db->trans_complete();
		return $id;
	}
	
	
	
	
}