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

		$params = array('email' => $this->get('email'), 'fromEmail' => $fromEmail, 'port' => 25);	
		

		$this->load->library('ValidateEmail', $params);

		$data = $this->validateemail->checkEmail($debug);
    	$this->response($data);
  	}

	public function index_post()
	{
		// Create a new record
	}
}
