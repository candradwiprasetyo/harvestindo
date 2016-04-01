<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('session');
		$this->load->library('access');
		$this->load->helper('url');
		
		$hash_logged = $this->session->userdata('hash_logged');
		if($hash_logged){
			redirect('myaccount');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Login";	
			
			$data['message'] = "";
			
			
			$this->load->view('layout/header', array('data_head' => $data_head));
			$this->load->view('login/login_form', $data);
			$this->load->view('layout/footer'); 
		
		
		
 	}

 	
	
	public function submit_login() {

		$username 	= $this->input->post('i_username');
		$password 	= $this->input->post('i_password');
		
		$user_id = $this->login_model->is_valid($username, $password);

		if(!$user_id)
		{							
			redirect("login?err=1");
			
		}else{
			$this->session->set_userdata('hash_logged', 1);
			$this->session->set_userdata('hash_user_id', $user_id[0]);
			$this->session->set_userdata('hash_user_type_id', $user_id[1]);

			redirect("myaccount");
			
		}
	
		
	}
	

	
}