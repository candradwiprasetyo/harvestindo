<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytransaction extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mytransaction_model');
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
			
			$list =  $this->mytransaction_model->list_transaction($this->session->userdata('hash_user_id'));
			
			$this->load->view('layout/header_disable', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('mytransaction/index', array('list' => $list));
			$this->load->view('layout/footer'); 
			
 	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	

	
}