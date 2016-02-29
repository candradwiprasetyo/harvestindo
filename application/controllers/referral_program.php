<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class referral_program extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('referral_program_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
 	
	public function index() {
		
		$data['title'] = "Referral program hashfield";
	
 		$this->load->view('layout/header', array('data' => $data));
		$this->load->view('referral_program/index');
		$this->load->view('layout/footer'); 
		
 	}
	
	
}