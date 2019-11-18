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
		//$this->db->set('last_sctivity','NOW()','FALSE');
		//$this->db->where('last_activity',date('Y-m-d H:i:s'));

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
	$this->db->set('last_activity','NOW()', FALSE);
	$this->db->where('last_activity',$date);
	$query=$this->db->insert('login');
	return ($this->db->affected_rows() != 1) ? false : true;
}
function update_time($username,$password)
{
	$this->db->set('last_activity','NOW()', FALSE);
	$this->db->where('username',$username);
	$this->db->where('password',$password);
	$this->db->update('login');
 }
function get_time()
 {
	$this->db->select('last_activity');
	$this->db->where('username',$username);
	$this->db->from('login');
	$query = $this->db->get(); 
 }
function __destruct() 
{
    $this->db->close();
}
}
