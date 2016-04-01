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
		
		$data_user = array();
		$result = $this->access->get_data_user_admin($this->session->userdata('hash_user_id'));
		
		if($result){
			$data_user  = $result;
		}
		
		$data_content['about'] = $this->home_model->get_about();
		
		$list_features =  $this->home_model->list_features();
		$list_how =  $this->home_model->list_how();
		$list_our_products =  $this->home_model->list_our_products();
		$list_products =  $this->home_model->list_products();
		$list_gallery =  $this->home_model->list_gallery();
	
 		$this->load->view('layout/header_home', array('data' => $data, 'data_user' => $data_user));
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
		}
		
		
		
		*/
		
 	}
	
	public function test_api(){
		
		$uri = "https://api.harvestindo.com";


$nonce = time();
$key = "hashfield";
$secret = "secretcowlevel";
$method_name = "rent-miner";
$request_path = "/hashfield/v1/get-miner-configuartion/wpsd@gmail.com/10";
$payload = $nonce . $method_name . $request_path;

$signature = hash_hmac("sha256", $payload, $secret);
$request_signature = strtoupper($signature);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_ENCODING => 'identity',
    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $uri . $request_path,
    CURLOPT_HTTPHEADER => array(
        "Content-Type : application/json",
        "Hst-Access-Key : $key",
        "Hst-Access-Sign : $request_signature",
        "Hst-Access-Time : $nonce"
    )
));

$result = curl_exec($curl);

print_r(json_decode($result, true));
		/*
		$uri = "https://api.harvestindo.com";

		$request_path = "/hashfield/v1/rent-miner";
		
		$parameters = array(
			'user_id' => 'wpsd@gmail.com',
			'miners' => array(
				array("miner_id" => 10, "miner_hash" => 835000, "rent_expire" => 145820068)
			)
		);
		
		$nonce = time();
		$key = "hashfield";
		$secret = "secretcowlevel";
		$method_name = "rent-miner";
		$request_path = "/hashfield/v1/rent-miner";
		$parameters = json_encode($parameters);
		$payload = $nonce . $method_name . $request_path . $parameters;
		
		$signature = hash_hmac("sha256", $payload, $secret);
		$request_signature = strtoupper($signature);
		
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_ENCODING => 'identity',
			CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => $uri . $request_path,
			CURLOPT_HTTPHEADER => array(
				"Content-Type : application/json",
				"Hst-Access-Key : $key",
				"Hst-Access-Sign : $request_signature",
				"Hst-Access-Time : $nonce"
			),
			CURLOPT_POSTFIELDS => $parameters
		));
		
		$result = curl_exec($curl);
		
		print_r(json_decode($result, true));
		*/
	
	}
	
	public function test_json(){
		$url = "https://api.coinbase.com/v2/currencies";
		$jsonUrl = file_get_contents($url, False);
		$json_idr = json_decode($jsonUrl, true);
		print_r($json_idr);
		
	}
	
	
}