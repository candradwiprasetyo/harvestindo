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
			
			echo "myaccount";
			
			echo "<a href='".site_url()."myaccount/logout'>logout";
			
			/*
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_category_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_category/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
			*/
 	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	

	
}