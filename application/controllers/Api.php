<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{
	public function verifyemail_get()
	{
			
		$email = $this->get('email');
		$fromEmail = $this->get('fromEmail');
		$port = !empty($this->get('port')) ? $this->get('port') : 25;
		$debug= $this->get('debug');
		$combinations = array();
		$combinationAllowedCount= 10;
		//$combinations = $this->get('combinations');
		if(is_array($this->get('combinations')))
		{
			$combinations = $this->get('combinations');
		}

		//print_r(count($combinations));
		//exit();

		$requiredFileds= '';
		if(empty($email)){
			$requiredFileds .= ', email';
		}
		
		if(empty($fromEmail)){
			$requiredFileds .= ', fromEmail';
		}

		if(trim($requiredFileds) != ''){
			
			$message = array('error' => 'required fields not provided:'. trim($requiredFileds, ","));

			$this->response($message);
			return ;

		}

		if(count($combinations) > 5){
			$message = array('error' => 'Email combinations exceeds the allowed size');
			$this->response($message);
			return ;			
		}



		$params = array('email' => $this->get('email'), 'fromEmail' => $fromEmail, 'port' => 25, 'combinations' => $combinations);



		$this->load->library('ValidateEmail', $params);

		if(count($combinations) <= 5 && count($combinations) > 0){
			$data = $this->validateemail->validateCombinations($combinations, $debug);
		
		}else{
			
			$data = $this->validateemail->checkEmail($debug);
		}

		$this->response($data);

  	}

	public function index_post()
	{
		// Create a new record
	}
}
