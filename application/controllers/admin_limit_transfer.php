<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_limit_transfer extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_limit_transfer_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	
	
	public function index() {
		
			$data_head['title'] = "Limit Transfer ";
			$data_head['action'] = site_url().'admin_limit_transfer/form_action/1';
			$data_head['close_button'] = site_url().'admin_limit_transfer/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			
				$result = $this->admin_limit_transfer_model->read_id();
				if($result){
					$data  = $result;
					
				}
			
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_limit_transfer/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action() {
		
		
		$data['limit_transfer'] 					= $this->input->post('i_limit_transfer');
		
			$this->admin_limit_transfer_model->update($data, 1);
		
		
		redirect('admin_limit_transfer/?did=1');
		
	}
	
	
	
}