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
		
		$data['title'] = "shop_now hashfield";
		
		$list_product =  $this->shop_now_model->list_product();
	
 		$this->load->view('layout/header', array('data' => $data));
		$this->load->view('shop_now/index', array('list_product' => $list_product));
		$this->load->view('layout/footer'); 
		
 	}
	
	
}