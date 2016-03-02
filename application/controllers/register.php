<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('register_model');
		$this->load->library('session');
		$this->load->helper('url');
		
		$hash_logged = $this->session->userdata('hash_logged');
		if($hash_logged){
			redirect('myaccount');
		}
	}
 	
	public function index() {
		

			
			$data['title'] = "Register";
			
			$type = (isset($_GET['type'])) ? $_GET['type'] : "";
			if($type == 1){
				$data['message'] = "Signup Success";
			}else{
				$data['message'] = "";
			}
			
			$data['action'] = site_url()."register/signup";
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('register/register_form', $data);
			$this->load->view('layout/footer'); 
		
		
		
 	}

 	
	
	public function signup() {
		
		$this->load->helper(array('form','url'));
		
		$options = array('cost' => 11);
		$hash = password_hash($this->input->post('i_password'), PASSWORD_BCRYPT, $options);
		
		
		 
		$data['user_type_id']	 				= 2;
		$data['user_category_id']	 			= 1;
		$data['user_first_name'] 				= $this->input->post('i_first_name');
		$data['user_last_name'] 				= $this->input->post('i_last_name');
		$data['user_email'] 					= $this->input->post('i_email');
		$data['user_username']	 				= $this->input->post('i_username');
		$data['user_password']	 				= $hash;
		$data['user_active_status']	 			= 1;
		
		

		$get_exist_username = $this->register_model->get_exist_username($data['user_username']);
			
			if($get_exist_username > 0){
				redirect("login?err=2");
			}else{
			
				$id = $this->register_model->create_user($data);

				redirect("register?did=1");
				
			}
		
		
		
 	}
	

	
}