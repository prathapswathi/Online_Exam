<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
	public function setUserData($whereData,$updateData){
		if($result = $this->db->update("user",$updateData,$whereData)){
			return 'SUCCESS';
		} else {
			return 'FAIL';
		}
	}
 
	public function getUserData($whereData){
		$this->db->select("firstname,lastname,password,user_type,token");
		if($result = $this->db->get_where("user",$whereData)){
			return $result->first_row("array");
		} else {
			return [];
		}
	}

//     public function login($data) {
// 		 $username=$data['email'];
// 		 $password=$data['password'];
// 		 $this->db->where('email',$username);
// 		// $this->db->where('password',password_verify('$password',PASSWORD_BCRYPT));
// 		 $query=$this->db->get('user');
// 		if($query->num_rows() > 0)
// 		{
// 			$row = $query->row();
// 			if( password_verify($password, $row->password)){
//             $data = array(
// 					'username' => $row->email,
// 					'password' => $row->password,
// 					'user_type' => $row->user_type,
// 					'last_activity'=>$row->last_activity
//                     );
// 			$this->session->set_userdata($data);
// 			return true;	
// 			}
			
// 		}
// 		else{
// 			return false;
// 		}
// 	}
// 	public function	sess_login($data){
// 		$username=$data['email'];
		
// 		$this->db->where('email',$username);
// 		$query=$this->db->get('user');
// 	   if($query->num_rows() > 0)
// 	   {
// 		$row = $query->row();
// 	    $data = array(
// 		'types' => $row->user_type
// 	   );
// 	   $this->session->set_userdata($data);
// 		   return true;	  
// 	   }
// 	   else{
// 		   return false;
// 	   }
// 	}
// function UserType()
// {
// 	$this->db->distinct();
// 	$this->db->select('user_type');
// 	$this->db->from('user');
// 	$query=$this->db->get()->result();
// 	return $query;
// }
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
 function getSession($token){
	$this->db->select('email');
	$this->db->select('password');
	$this->db->select('user_type');
    $this->db->from('user');
    $this->db->where('token',$token);
    $query=$this->db->get();
	if( $query->num_rows()>0)
	{
	$row = $query->row();
	$data = array(
		'sess_user' => $row->email,
		'sess_password' => $row->password,
	);
	$this->session->set_userdata($data);
	return true;
	}
	else
	{
		return false;
	}
 }
function __destruct() 
{
    $this->db->close();
}
}
