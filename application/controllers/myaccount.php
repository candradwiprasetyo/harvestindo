<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('myaccount_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$hash_logged = $this->session->userdata('hash_logged');
		if($hash_logged == ""){
			redirect('login');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "My Account ";
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('hash_user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$get_instant_mining = $this->myaccount_model->get_instant_mining($this->session->userdata('hash_user_id'));
			
			$get_instant_mining = ($get_instant_mining) ?  $get_instant_mining * 1000 : 0;
			
			$data['get_instant_mining'] = $get_instant_mining;
						
			//$list =  $this->admin_category_model->list_data();
			
			$this->load->view('layout/header_disable', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('myaccount/index', $data);
			$this->load->view('layout/footer'); 
			
 	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	

	
}