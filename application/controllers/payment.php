<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('payment_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$hash_logged = $this->session->userdata('hash_logged');
		if($hash_logged == ""){
			redirect('login');
		}
	}
 	
	public function index() {
		
	
			$data_head['title'] = "Payment ";
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('hash_user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$data['user_email'] = $data_user['user_email']; 
			
			$list =  $this->payment_model->list_data($this->session->userdata('hash_user_id'));
			
			$this->load->view('layout/header_disable', array( 'data_head' => $data_head, 'data_user' => $data_user));
			
			if($this->access->get_cart($this->session->userdata('hash_user_id')) > 0){
				$this->load->view('payment/index', array('data' => $data, 'list' => $list));
			
			}else{
				$this->load->view('payment/index_null', array('data' => $data, 'list' => $list));
			
			}
			
			$this->load->view('layout/footer'); 
			
 	}
	
	public function payment_notif($id) {
			
			if($id == 1){
				$this->load->view('payment/notif1');
			}else if($id == 2){
				$this->load->view('payment/notif2');
			}else if($id == 3){
				$this->load->view('payment/notif3');
			}
 	}
	
	public function save_payment() {
		
			
			$list =  $this->payment_model->list_data($this->session->userdata('hash_user_id'));
			
			if($this->input->post('i_payment_method') == 2){
					$data['card_number'] 			= '';//$this->input->post('i_card_number');
					//$data['cvv'] 					= $this->input->post('i_cvv');
			}else if($this->input->post('i_payment_method') == 3){
					$data['card_number'] 			= $this->input->post('i_card_number');
					$data['cvv'] 					= $this->input->post('i_cvv');
					$data['bank_id'] 				= $this->input->post('i_bank_id');
					$data['tenor_id'] 				= $this->input->post('i_tenor_id');
			}else{
				$data['card_number'] = '';
			}
			
			$tr_im_id = $this->payment_model->create($data);
			
			$total_price = 0;
			foreach($list as $row):
			
				// create tr_instant_mining_detail
				$data_detail['tr_im_id'] 					= $tr_im_id;
				$data_detail['imd_id'] 						= $row['imd_id'];
				$data_detail['tr_amount'] 					= $row['tr_amount'];
				$data_detail['tr_usd'] 						= $row['tr_usd'];
				$data_detail['tr_btc'] 						= $row['tr_btc'];
				$data_detail['tr_unit_price'] 				= $row['tr_unit_price'];
				$data_detail['tr_total_price'] 				= $row['tr_total_price'];
				$total_price = $total_price + $row['tr_total_price'];
				
				$this->payment_model->create_detail($data_detail);
			
			endforeach; 
			
			
			$email =  $this->payment_model->get_email($this->session->userdata('hash_user_id'));
			
			// create transactions
			$data_transaction['transaction_number'] 		= $this->session->userdata('hash_user_id').time();
			$data_transaction['transaction_date'] 			= $this->payment_model->get_utc_timestamp();
			$data_transaction['user_id'] 					= $this->session->userdata('hash_user_id');
			$data_transaction['transaction_type_id'] 		= 1;
			$data_transaction['status_id'] 					= 1;
			$data_transaction['transaction_data_id'] 		= $tr_im_id;
			$data_transaction['payment_method_id'] 			= $this->input->post('i_payment_method');
			$data_transaction['total_price']				= $total_price;
			
			$transaction_id = $this->payment_model->create_transaction($data_transaction);
			
			$this->payment_model->delete($this->session->userdata('hash_user_id'));
			
			$this->sendMailReset_manual($email, $this->session->userdata('hash_user_id'), $transaction_id, $data_transaction['payment_method_id']);
			
			redirect('mytransaction');
			
 	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function sendMailReset_manual($email, $user_id, $transaction_id, $payment_method){
			

			$ci = get_instance();
	        $ci->load->library('email');
	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "ssl://smtp.gmail.com";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "candradwiprasetyo@gmail.com";
	        $config['smtp_pass'] = "cm3l0n pc";
	        
	        $config['charset'] = "utf-8";
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';
	        
			
	        $ci->email->initialize($config);
	 		
			$data = array();
			$result = $this->payment_model->get_data_invoice($transaction_id);
			
			if($result){
				$data  = $result;
			}
			
			$list =  $this->payment_model->list_data_invoice($transaction_id);
			
	        $ci->email->from('candradwiprasetyo@gmail.com', 'Admin Hashfield');
	        $ci->email->reply_to('candradwiprasetyo@gmail.com', 'Admin Hashfield');
	        $ci->email->to($email);
	        $ci->email->subject('Pembayaran Hashfield');
	       
	        $message=$this->load->view('payment/email_notification', array('data' => $data, 'list' => $list), TRUE);
			$ci->email->message($message);
			if ($this->email->send()) {
	            //echo 'Email sent.';
	        } else {
	            //show_error($this->email->print_debugger());
	        }
		
			  
			    
	}
	
	public function cancel_payment(){
		
		
		$this->payment_model->delete($this->session->userdata('hash_user_id'));
		redirect('buy_hashrate');
	}
	
	public function delete_detail($id){
		
		
		$this->payment_model->delete_detail($id);
		
			redirect('payment');
		
		
		
	}
	


	
}