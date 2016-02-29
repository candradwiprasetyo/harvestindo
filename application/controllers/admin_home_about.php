<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home_about extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_home_about_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	
	
	public function index() {
		
			$data_head['title'] = "About Hashfield ";
			$data_head['action'] = site_url().'admin_home_about/form_action/1';
			$data_head['close_button'] = site_url().'admin_home_about/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			
				$result = $this->admin_home_about_model->read_id(1);
				if($result){
					$data  = $result;
					
				}
			
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_home_about/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
		
		$data['page_content'] 					= $this->input->post('editor');
		
		
		if($id){
			$this->admin_home_about_model->update($data, $id);
		}
		
		redirect('admin_home_about/?did=1');
		
	}
	
	public function delete($id){
		
		$get_img = $this->admin_home_about_model->get_img("sliders", "slider_img", "slider_id = '$id'");
			
		$oldfile   = "assets/images/slider/".$get_img;
			
		if( file_exists( $oldfile ) ){
	    	unlink( $oldfile );
		}
		
		$this->admin_home_about_model->delete($id);
		redirect('admin_home_about/?did=3');
	}

	public function upload_img($img){
		$new_name = time()."_".$_FILES[$img]['name'];
			
			$configUpload['upload_path']    = './assets/images/slider/';                 #the folder placed in the root of project
			$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
			$config['max_size']	= '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';                       #max height
			$configUpload['encrypt_name']   = false;   
			$configUpload['file_name'] 		= $new_name;                      	#encrypt name of the uploaded file
			$this->load->library('upload', $configUpload);                  #init the upload class
			if(!$this->upload->do_upload($img)){
				$uploadedDetails    = $this->upload->display_errors();
			}else{
				$uploadedDetails    = $this->upload->data(); 
				//$this->_createThumbnail($uploadedDetails['file_name']);
	 
				//$thumbnail_name = $uploadedDetails['raw_name']. '_thumb' .$uploadedDetails['file_ext'];   
			}
			
			return $new_name;
	}

	



	
}