<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  public function add_topics($course_id,$course_name,$desc,$image)
  {
  $this->db->set('course_id',$course_id);
	$this->db->set('course_name',$course_name);
	$this->db->set('description',$desc);
	$this->db->set('image',$image);
	$query=$this->db->insert('topics');
	return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function topics()
  {
    $this->db->select('id');
    $this->db->select('course_id');
    $this->db->select('course_name');
    $this->db->select('description');
    $this->db->select('image');
	  $this->db->from('topics');
    $query = $this->db->get()->result();
    return $query;
  }
  public function get($id)
{
    $this->db->select('image');
    $this->db->from('topics');
    $this->db->where('id',$id);
    $query = $this->db->get();
    $row=$query->row();
    $image=$row->image;
    return $image;
}
  public function delete($id,$image)
  {
    unlink("./images/".$image);
    $this->db->where('id', $id);
    $query=$this->db->delete('topics');
    return $query; 
  }
}