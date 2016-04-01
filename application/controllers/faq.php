<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('faq_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
 	
	public function index() {
		
		$data_head['title'] = "FAQ hashfield";
		
		$data_user = array();
		
		$result = $this->access->get_data_user_admin($this->session->userdata('hash_user_id'));
		
		if($result){
			$data_user  = $result;
		}
	
 		$this->load->view('layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
		$this->load->view('faq/index');
		$this->load->view('layout/footer'); 
		
 	}
	
	
}