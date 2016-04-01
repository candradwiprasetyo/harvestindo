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
		
		$data_head['title'] = "Gallery hashfield";
		
		$list_gallery =  $this->gallery_model->list_gallery();
		
		$data_user = array();
		$result = $this->access->get_data_user_admin($this->session->userdata('hash_user_id'));
		
		if($result){
			$data_user  = $result;
		}
	
 		$this->load->view('layout/header', array('data_head' => $data_head, 'data_user' => $data_user));
		$this->load->view('gallery/index', array('list_gallery' => $list_gallery));
		$this->load->view('layout/footer'); 
		
 	}
	
	
}