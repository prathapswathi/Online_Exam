<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function login($data) {
		// $username=$data['username'];
		// $password=$data['password'];
		// $this->db->where('email',$username);
		// $this->db->where('password',password_verify('$password',PASSWORD_BCRYPT));
		// $query=$this->db->get('register');
		$query = $this->db->get_where('register', $data);
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
	if( $query->num_rows()>0)
	{
	$row = $query->row();
	$data = array(
		'email' => $row->email
	);
	$this->session->set_userdata($data);
	return true;
	}
	else
	{
		return false;
	}
 }
 function new_password($hpassword){
	$this->db->set('password',$hpassword);
	$this->db->where('email',$this->session->userdata('email'));
	$this->db->update('register');
	return true;
 }
function update_time($data)
{
	$this->db->set('last_activity','NOW()', FALSE);
	// $this->db->where('email',$username);
	// $this->db->where('password',password_verify('$password',PASSWORD_BCRYPT));
	$this->db->update('register',$data,'last_activity=NOW()');
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
