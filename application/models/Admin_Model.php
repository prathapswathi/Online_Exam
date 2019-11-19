<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  public function add_topics()
  {

  }
  public function all_topics()
  {
    $this->db->select('*');
	$this->db->from('topics');
    $query = $this->db->get(); 
    $result=$query->result();
    $num_rows=$query->num_rows();
    
    return array("all_data"=>$result,"num_rows"=>$num_rows);
  }
}