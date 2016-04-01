<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_payment_method extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_payment_method_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Features ";
			$data_head['add_button'] = site_url().'admin_payment_method/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_payment_method_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_payment_method/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function enable($id){
		$data['payment_method_status'] = 1;
		$this->admin_payment_method_model->change_status($data, $id);
		redirect('admin_payment_method/?did=2');
	}
	
	public function disable($id){
		$data['payment_method_status'] = 0;
		
		$this->admin_payment_method_model->change_status($data, $id);
		redirect('admin_payment_method/?did=3');
	}
	
}