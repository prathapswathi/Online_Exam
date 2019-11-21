<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller{

   
    public function index(){
        $this->load->view('home');
    }
    function login(){
        $this->load->view('header');
        $this->load->view('login');	
        $this->load->view('footer');
    }
	public function sign_up(){
        $this->load->view('header');
        $this->load->view('register');	
        $this->load->view('footer');
    }
    public function reset(){
        $this->load->view('header');
        $this->load->view('forgot_password');
        $this->load->view('footer');
    }
    public function recover(){
        $this->load->view('header');
        $this->load->view('change_password');
        $this->load->view('footer');
    }
    public function register()
    {
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname','Firstname','trim|required');
        $this->form_validation->set_rules('lastname','Lastname','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[25]|callback_is_password_strong');
        $this->form_validation->set_message('is_password_strong', 'password is weak!!!');
        $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
        $this->form_validation->set_rules('utype','User Type','trim|required');

        if($this->form_validation->run())
        {
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $hpass = password_hash($password,PASSWORD_DEFAULT);
            $utype=$this->input->post('utype');
            $this->load->model('Login_Model');
            if($this->Login_Model->register($firstname,$lastname,$email,$hpass,$utype) ){
                
                redirect(base_url(). 'LoginController/login');
            }
            else{
                $this->session->set_flashdata('error','Unable to Register');
                redirect(base_url(). 'LoginController/register');
            }
            
        }
        else{
            $this->session->set_flashdata('error','Unable to register');
            $this->load->view('header');
            $this->load->view('register');	
            $this->load->view('footer');
        }
    }
    public function is_password_strong($password)
    {
       if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
         return TRUE;
       }
       return FALSE;
    }
	
    public function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $password=$this->valid_password($password);
            $hpass = password_hash($password,PASSWORD_DEFAULT);

            $this->load->model('Login_Model');
            if($this->Login_Model->login($username,$password)){
                $user_type= $this->session->userdata('user_type');
                $this->Login_Model->update_time($username,$hpass);
            
                if($user_type=='admin')
                {
                redirect(base_url(). 'AdminController/dashbord');
                }
                if($user_type == 'user')
                {
                    redirect(base_url(). 'UserController/dashbord');  
                }
            }
            else{
                $this->session->set_flashdata('error','invalid username and password');
                redirect(base_url(). 'LoginController/login');
            }
            
        }
        else{
            $this->load->view('header');
            $this->load->view('login');	
            $this->load->view('footer');
        }
    }
    
  
    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url(). '');	
    }
    

}