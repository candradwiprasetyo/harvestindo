<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_our_products extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_our_products_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Our products";
			$data_head['add_button'] = site_url().'admin_our_products/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_our_products_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_our_products/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function form($id = 0) {
		
			$data_head['title'] = "feature ";
			$data_head['action'] = site_url().'admin_our_products/form_action/'.$id;
			$data_head['close_button'] = site_url().'/admin_our_products/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			if($id){
				$result = $this->admin_our_products_model->read_id($id);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['data_id'];
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_our_products/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
	
		 // simpan di table
		$data['data_name']	 				= $this->input->post('i_name');
		$data['data_desc'] 					= $this->input->post('i_desc');
		
		
		if($id){
			$this->admin_our_products_model->update($data, $id);
		}else{
			$data['feature_date'] = date("Y-m-d H:m:s");
			$this->admin_our_products_model->create($data);
		}
		
		redirect('admin_our_products/?did=2');
		
	}

	



	
}