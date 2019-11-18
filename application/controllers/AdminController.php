<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller{

   
    public function index(){
        $this->load->view('admin_profile');
    }
    public function dashbord()
    {
        $this->load->view('admin_dashbord');
    }
    public function profile(){
        $this->load->view('admin_profile');
    }
    public function last_active(){
        $this->load->model('Login_Model');
        if($this->Login_Model->get_time())
        {
            echo $time;
        }
    }
    public function topics()
    {
        $this->load->view('add_topics');
    }
}