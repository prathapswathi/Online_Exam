<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller{

   
    public function index(){
        $this->load->view('admin_dashbord');
    }
    public function profile(){
        $this->load->view('admin_profile');
    }
}