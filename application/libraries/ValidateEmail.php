<?php
// Note, this cannot be namespaced for the time being due to how CI works
//namespace Restserver\Libraries;

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include 'VerifyEmail/vendor/autoload.php';
require APPPATH . 'libraries/VerifyEmail/vendor/autoload.php';
//home/cuelogic/projects/PHPMailer/application/libraries/VerifyEmail/vendor

/**
 * VerifyEmail class
 * To verify given email address.
 *
 */
class ValidateEmail extends hbattat\VerifyEmail{

    public $email = '';
    protected $verifier = '';
    protected $fromEmail = '';

    public function __construct($params)
    {
        parent::__construct($params['email'], $params['fromEmail'], $params['port']);
        $this->verifier = new hbattat\VerifyEmail($params['email'], $params['fromEmail'], $params['port']);
    }

    public function checkEmail($debug = false)
    {
        $response= array();
        $response['isvalid'] = $this->verifier->verify();
        
        if($debug)
            $response['debug'] = ($this->verifier->get_debug());

        return ($response);
    }
    
    public function validateCombinations($combinations, $debug = false)
    {
        $response= array();
        
        $response['result'] = $this->verifier->verifyCombinations($combinations);
        
        if($debug)
            $response['debug'] = ($this->verifier->get_debug());

        return ($response);
    }

}