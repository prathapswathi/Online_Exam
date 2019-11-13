<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller{
    public function index(){
        $this->load->view('home');
    }
	public function admin_login(){
		$this->load->view('admin_login');
    }
    public function user_login(){
		$this->load->view('user_login');
	}
	public function sign_up(){
		$this->load->view('sign_up');
	}
	public function reset(){
		$this->load->view('forgot_password');
    }
    public function change_pass(){
        $this->load->view('change_password');
    }
}