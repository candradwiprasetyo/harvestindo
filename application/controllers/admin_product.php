<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_product extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_product_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Products ";
			$data_head['add_button'] = site_url().'admin_product/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_product_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_product/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function form($id = 0) {
		
			$data_head['title'] = "Product ";
			$data_head['action'] = site_url().'admin_product/form_action/'.$id;
			$data_head['close_button'] = site_url().'/admin_product/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			if($id){
				$result = $this->admin_product_model->read_id($id);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['product_id'];
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_product/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
		// upload gambar
		if($_FILES['i_img']['name']){

			if($id){
				$get_img = $this->admin_product_model->get_img("products", "product_img", "product_id = '$id'");
			
				$oldfile   = "assets/images/products/".$get_img;
			
				if( file_exists( $oldfile ) ){
	    			unlink( $oldfile );
				}
			}

			$new_name = $this->upload_img('i_img');

			$data['product_img'] 					= str_replace(" ", "_", $new_name);

		}

		

		 
		 // simpan di table
		$data['product_name']	 				= $this->input->post('i_name');
		$data['product_desc'] 					= $this->input->post('editor');
		$data['product_price']	 				= $this->input->post('i_price');
		
		
		$data['hashrate']	 						= $this->input->post('i_hashrate');
		$data['power_efficiency']	 				= $this->input->post('i_power_efficiency');
		$data['asic_processor']	 					= $this->input->post('i_asic_processor');
		$data['working_environment']	 			= $this->input->post('i_working_environment');
		$data['transport_storage_environment']	 	= $this->input->post('i_transport_storage_environment');
		$data['dimensions']	 						= $this->input->post('i_dimensions');
		$data['weight']	 							= $this->input->post('i_weight');
		$data['controller']	 						= $this->input->post('i_controller');
		$data['performance_variant']	 			= $this->input->post('i_performance_variant');
		$data['power_supply_interface']	 			= $this->input->post('i_power_supply_interface');
		$data['power_requirements']	 				= $this->input->post('i_power_requirements');
		
		
		
		if($id){
			$this->admin_product_model->update($data, $id);
		}else{
			$data['product_date'] = date("Y-m-d H:i:s");
			$this->admin_product_model->create($data);
		}
		
		redirect('admin_product/?did=2');
		
	}

	public function upload_img($img){
		$new_name = time()."_".$_FILES[$img]['name'];
			
			$configUpload['upload_path']    = './assets/images/products/';                 #the folder placed in the root of project
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

	public function delete($id){
		
		$get_img = $this->admin_product_model->get_img("products", "product_img", "product_id = '$id'");
			
		$oldfile   = "assets/images/products/".$get_img;
			
		if( file_exists( $oldfile ) ){
	    	unlink( $oldfile );
		}
		
		$this->admin_product_model->delete($id);
		redirect('admin_product/?did=3');
	}



	
}