<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    //'smtp_host' => 'smtp.gmail.com', 
    $config['smtp_host'] ='smtp.gmail.com',
    'smtp_port' =>  587,
    'smtp_user' => 'swathi8498@gmail.com
	',
    'smtp_pass' => 'swathi123',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);