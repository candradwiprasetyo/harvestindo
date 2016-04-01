<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_transaction extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_transaction_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Transaction ";
			$data_head['add_button'] = site_url().'admin_transaction/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_transaction_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_transaction/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function view_detail1($tr_im_id) {
		
			$data_head['title'] = "Transaction Detail";
			$data_head['close_button'] = site_url().'admin_transaction/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list_detail =  $this->admin_transaction_model->list_data_detail1($tr_im_id);
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_transaction/list_detail1', array('data_head' => $data_head, 'list' => $list_detail));
			$this->load->view('admin_layout/footer'); 
	
 	}
	

	
	public function approve($id){
		
	
		$this->admin_transaction_model->approve($id);
		redirect('admin_transaction/?did=4');
	}
	
	



	
}