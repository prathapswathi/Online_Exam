<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function login($data) {
		 $username=$data['email'];
		 $password=$data['password'];
		 $this->db->where('email',$username);
		// $this->db->where('password',password_verify('$password',PASSWORD_BCRYPT));
		 $query=$this->db->get('user');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			if( password_verify($password, $row->password)){
            $data = array(
					'username' => $row->email,
					'password' => $row->password,
					'user_type' => $row->user_type,
					'last_activity'=>$row->last_activity
                    );
			$this->session->set_userdata($data);
			return true;	
			}
			
		}
		else{
			return false;
		}
	}
function UserType()
{
	$this->db->distinct();
	$this->db->select('user_type');
	$this->db->from('user');
	$query=$this->db->get()->result();
	return $query;
}
 function register($firstname,$lastname,$email,$password,$utype)
 {
	$this->db->set('firstname',$firstname);
	$this->db->set('lastname',$lastname);
	$this->db->set('email',$email);
	$this->db->set('password',$password);
	$this->db->set('user_type',$utype);
	$query=$this->db->insert('user');
	return ($this->db->affected_rows() != 1) ? false : true;
 }
 function ForgotPassword($email){
	$this->db->select('email');
    $this->db->from('user');
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
	$this->db->update('user');
	return true;
 }
function update_time($data)
{
	$username=$data['email'];
	$password=$data['password'];
	$this->db->set('last_activity','NOW()', FALSE);
	$this->db->where('email',$username);
	$this->db->where('password',$password);
	$this->db->update('user');
 }

 function make_session($username,$token) {
	$this->db->set('token',$token);
	$this->db->where('email',$username);
	$this->db->update('user');
	if($this->db->affected_rows() == 1){
	return true;	
	}else{
		return false;
	}
}

function __destruct() 
{
    $this->db->close();
}
}
