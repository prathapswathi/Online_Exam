<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller{

   
    public function index(){
        $this->load->view('user_dashboard');
    }
    public function profile(){
        $this->load->view('user_profile');
    }
    public function user_dashbord()
    {
        $this->load->view('user_dashboard');
    }
}