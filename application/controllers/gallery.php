<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
 	
	public function index() {
		
		$data['title'] = "Gallery hashfield";
	
 		$this->load->view('layout/header', array('data' => $data));
		$this->load->view('gallery/index');
		$this->load->view('layout/footer'); 
		
 	}
	
	
}