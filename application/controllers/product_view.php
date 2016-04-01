<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_view extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('product_view_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
 	
	public function view($id = 0) {
		
		$data_head['title'] = "product view hashfield";
	
		$data_product = array();
		$result = $this->product_view_model->read_id($id);
		
		if($result){
			$data_product = $result;
		}
			
		
 		$this->load->view('layout/header', array('data_head' => $data_head));
		$this->load->view('product_view/index',  array('data_product' => $data_product));
		$this->load->view('layout/footer'); 
		
		
 	}
	
	
}