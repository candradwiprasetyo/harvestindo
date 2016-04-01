<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_bank extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_bank_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Bank ";
			$data_head['add_button'] = site_url().'admin_bank/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_bank_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_bank/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function form($id = 0) {
		
			$data_head['title'] = "Bank ";
			$data_head['action'] = site_url().'admin_bank/form_action/'.$id;
			$data_head['close_button'] = site_url().'/admin_bank/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			if($id){
				$result = $this->admin_bank_model->read_id($id);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['bank_id'];
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_bank/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
		 
		 // simpan di table
		$data['bank_name']	 						= $this->input->post('i_bank_name');
		$data['bank_account_name'] 					= $this->input->post('i_bank_account_name');
		$data['bank_account_number'] 				= $this->input->post('i_bank_account_number');
		
		if($id){
			$this->admin_bank_model->update($data, $id);
		}else{
			$this->admin_bank_model->create($data);
		}
		
		redirect('admin_bank/?did=2');
		
	}

	
}