<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feature extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('feature_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
 	
	public function index() {
		
		$data['title'] = "Feature Hashfield";
	
 		$this->load->view('layout/header', array('data' => $data));
		$this->load->view('feature/index');
		$this->load->view('layout/footer'); 
		
 	}
	
	
}