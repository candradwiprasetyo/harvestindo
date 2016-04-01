<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_rate extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_rate_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	
	
	public function index() {
		
			$data_head['title'] = "Rate Hashfield ";
			$data_head['action'] = site_url().'admin_rate/form_action/1';
			$data_head['close_button'] = site_url().'admin_rate/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			
				$result = $this->admin_rate_model->read_id(1);
				if($result){
					$data  = $result;
					
				}
			
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_rate/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
		
		$data['m_rate_btc'] 					= $this->input->post('i_rate_btc');
		$data['m_rate_dollar'] 					= $this->input->post('i_rate_dollar');
		
		
		if($id){
			$this->admin_rate_model->update($data, $id);
		}
		
		redirect('admin_rate/?did=1');
		
	}
	
	
	
}