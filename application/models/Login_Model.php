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
		$this->db->select("firstname,email,password,user_type,token,last_activity");
		if($result = $this->db->get_where("user",$whereData)){
			return $result->first_row("array");
		} else {
			return [];
		}
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

 function UserType()
{
	$this->db->distinct();
	$this->db->select('user_type');
	$this->db->from('user');
	$query=$this->db->get()->result();
	return $query;
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
	$this->db->set('last_activity','NOW()', FALSE);
	$this->db->where('email',$data['email']);
	$this->db->update("user");
 }

 
function __destruct() 
{
    $this->db->close();
}
}
