<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_instant_mining extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_instant_mining_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Instant Mining Product ";
			$data_head['add_button'] = site_url().'admin_instant_mining/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_instant_mining_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_instant_mining/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function form($id = 0) {
		
			$data_head['title'] = "Intant Mining ";
			$data_head['action'] = site_url().'admin_instant_mining/form_action/'.$id;
			$data_head['close_button'] = site_url().'admin_instant_mining/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			if($id){
				$result = $this->admin_instant_mining_model->read_id($id);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['im_id'];
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_instant_mining/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_detail($id = 0, $id_detail = 0) {
		
			$data_head['title'] = "Intant Mining ";
			$data_head['action'] = site_url().'admin_instant_mining/form_action_detail/'.$id."/".$id_detail;
			$data_head['close_button'] = site_url().'admin_instant_mining/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			if($id_detail){
				$result = $this->admin_instant_mining_model->read_detail_id($id_detail);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['imd_id'];
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_instant_mining/form_detail', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	
	public function form_action($id = 0) {

		 
		 // simpan di table
		$data['im_name']	 				= $this->input->post('i_name');
		$data['im_subname'] 				= $this->input->post('i_subname');
		$data['im_remaining'] 				= $this->input->post('i_remaining');
		$data['im_maintenance_fee'] 		= $this->input->post('i_maintenance_fee');
		
		
		if($id){
			$this->admin_instant_mining_model->update($data, $id);
		}else{
			$this->admin_instant_mining_model->create($data);
		}
		
		redirect('admin_instant_mining/?did=2');
		
	}
	
	public function form_action_detail($id = 0, $id_detail = 0) {

		 
		 // simpan di table
		$data['imd_time']	 				= $this->input->post('i_time');
		$data['imd_rate1'] 					= $this->input->post('i_rate1');
		$data['imd_rate2'] 					= $this->input->post('i_rate2');
		$data['im_id']						= $id;
		
		if($id_detail){
			$this->admin_instant_mining_model->update_detail($data, $id_detail);
		}else{
			$this->admin_instant_mining_model->create_detail($data);
		}
		
		redirect('admin_instant_mining/?did=2');
		
	}

	
	public function delete($id){
		
		$this->admin_instant_mining_model->delete($id);
		redirect('admin_instant_mining/?did=3');
	}
	
	public function delete_detail($id){
		
		$this->admin_instant_mining_model->delete_detail($id);
		redirect('admin_instant_mining/?did=3');
	}
	



	
}