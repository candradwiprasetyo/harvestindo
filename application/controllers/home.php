<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('recaptcha');
		
	}
 	
	public function index() {
		
		$data['title'] = "hashfield";
		$list['list'] = "test";
		$data['header_type'] = 1;
		
		$data_content['about'] = $this->home_model->get_about();
		
		$list_features =  $this->home_model->list_features();
		$list_how =  $this->home_model->list_how();
		$list_our_products =  $this->home_model->list_our_products();
		$list_products =  $this->home_model->list_products();
		$list_gallery =  $this->home_model->list_gallery();
	
 		$this->load->view('layout/header_home', array('data' => $data));
		$this->load->view('home/index', array(
								'data_content' => $data_content, 
								'list_features' => $list_features, 
								'list_how' => $list_how,
								'list_our_products' => $list_our_products,
								'list_products' => $list_products,
								'list_gallery' => $list_gallery
								));
		$this->load->view('layout/footer'); 
		/*
		
		$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
		
		$options = array('cost' => 11);
		$hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
		
		if (password_verify('rasmuslerdorf', $hash)) {
			echo 'Password is valid!';
		} else {
			echo 'Invalid password.';
		}*/
		
 	}
	
	
}