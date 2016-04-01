<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_now extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('shop_now_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
 	
	public function index() {
		
		$data_head['title'] = "Shop Now hashfield";
		
		$list_product =  $this->shop_now_model->list_product();
	
 		$this->load->view('layout/header', array('data_head' => $data_head));
		$this->load->view('shop_now/index', array('list_product' => $list_product));
		$this->load->view('layout/footer'); 
		
 	}

 	
	
	
}