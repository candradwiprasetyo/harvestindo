<?php

class Register_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	function get_exist_username($username)
	{
		$sql = "select count(user_id) as result from users where user_username = '$username'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return ($result['result']) ? $result['result'] : 0;
	}
	
	function create_user($data){
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	
	
	
}