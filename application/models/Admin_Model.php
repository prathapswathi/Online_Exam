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
  public function topics()
  {
    $this->db->select('course_id');
    $this->db->select('course_name');
    $this->db->select('description');
    $this->db->select('image');

	  $this->db->from('topics');
    $query = $this->db->get(); 
    return $query;
  }
}