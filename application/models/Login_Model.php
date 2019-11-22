<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function login($username,$password) {
		
		$this->db->where('email',$username);
	
		
		$query=$this->db->get('register');
		if($query->num_rows() > 0)
		{

			$row = $query->row();
            $data = array(
					'username' => $row->email,
					'password' => $row->password,
                    'user_type' => $row->user_type
                    );
            $this->session->set_userdata($data);
			return true;
			
		}
		else{
			return false;
		}
    }
 function register($firstname,$lastname,$email,$password,$utype)
 {
	$this->db->set('firstname',$firstname);
	$this->db->set('lastname',$lastname);
	$this->db->set('email',$email);
	$this->db->set('password',$password);
	$this->db->set('user_type',$utype);
	$query=$this->db->insert('register');
	return ($this->db->affected_rows() != 1) ? false : true;
 }
 function ForgotPassword($email){
	$this->db->select('email');
    $this->db->from('register');
    $this->db->where('email', $email);
    $query=$this->db->get();
	return $query->row_array();
	$data = array(
		'email' => $row->email,
		'user_type' => $row->user_type
		);
	$this->session->set_userdata($data);
 }
 function new_password($password,$email){
	// $email="sujnan@impelsys.com";
	$this->db->set('password',$password);
	$this->db->where('email',$email);
	// $this->db->where('password',$password);
	$this->db->update('register');
	return true;
 }
function update_time($username,$password)
{
	$this->db->set('last_activity','NOW()', FALSE);
	$this->db->where('email',$username);
	$this->db->where('password',$password);
	$this->db->update('register');
 }
function get_time()
 {
	$this->db->select('last_activity');
	$this->db->where('email',$username);
	$this->db->from('login');
	$query = $this->db->get(); 
	
 }
function __destruct() 
{
    $this->db->close();
}
}
