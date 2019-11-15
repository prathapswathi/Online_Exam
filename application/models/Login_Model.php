<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function login($username,$password) {
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		
		$query=$this->db->get('login');
		if($query->num_rows() > 0)
		{
			return true;

		}
		else{
			return false;
		}
    }
 function register($firstname,$lastname,$email,$password)
 {
	$this->db->set('firstname',$firstname);
	$this->db->set('lastname',$lastname);
	$this->db->set('email',$email);
	$this->db->set('password',$password);
	$query=$this->db->insert('register');
	return ($this->db->affected_rows() != 1) ? false : true;
 }

function login_insert($email,$password)
{
	$this->db->set('username',$email);
	$this->db->set('password',$password);
	$query=$this->db->insert('login');
	return ($this->db->affected_rows() != 1) ? false : true;
}
function __destruct() 
{
    $this->db->close();
}
}
