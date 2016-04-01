<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_job extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('cron_job_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
	
	public function limit_transfer(){
		
		$list_limit_transfer =  $this->cron_job_model->list_limit_transfer();
		
		
		foreach($list_limit_transfer as $row):
		
			$str2 = strtotime($this->cron_job_model->get_utc_timestamp());
			
			$str1 = strtotime($row['transaction_date']);
			
			$selisih = $str2 - $str1;
			
			$limit_transfer = $this->cron_job_model->get_limit_transfer();
			
			if($selisih >= $limit_transfer){
				$data['status_id'] = 3;
				$this->cron_job_model->update_limit_transfer($data, $row['transaction_id']);
			}
			
			echo $this->cron_job_model->get_utc_timestamp()." | ".$row['transaction_date']." | ".$str1." - ".$str2." - ".$selisih."<br>";
			
			
		endforeach;
	}
	
	
}