<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy_hashrate extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('buy_hashrate_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$hash_logged = $this->session->userdata('hash_logged');
		if($hash_logged == ""){
			redirect('login');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "My Account ";
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('hash_user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			//$list =  $this->admin_category_model->list_data();
			
			$this->load->view('layout/header_disable', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('buy_hashrate/index');
			$this->load->view('layout/footer'); 
			
 	}
	
	public function create_instant_mining($amount, $imd_id) {
		
		//$this->buy_hashrate_model->delete($this->session->userdata('hash_user_id'));
		
		$data['user_id'] 					= $this->session->userdata('hash_user_id');
		$data['imd_id'] 					= $imd_id;
		$data['tr_amount'] 					= $amount;
		
		$tr_usd = ($amount * $this->buy_hashrate_model->get_rate()) * $this->access->get_coinbase_buy();
		$data['tr_usd'] 					= $tr_usd;
		
		$tr_btc = $amount * $this->buy_hashrate_model->get_rate();
		$data['tr_btc'] 					= $tr_btc;
		
		$data['tr_unit_price'] 				= $this->buy_hashrate_model->get_rate_dollar();
		$data['tr_total_price'] 			= ($data['tr_amount'] * 1000000) * $this->buy_hashrate_model->get_rate_dollar();

		$this->buy_hashrate_model->create($data);
		
		
		redirect('payment');
 	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	

	
}