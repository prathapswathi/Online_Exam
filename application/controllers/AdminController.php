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
        $this->load->view('topics');
    }
    public function get_topics()
    {
        $this->load->model('Admin_Model');
        $result=$this->Admin_Model->all_topics();
        if($result>0)
        {
            return hai;
        }
    }
    public function add_topics()
    {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname','Firstname','trim|required');
        $this->form_validation->set_rules('lastname','Lastname','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
        if($this->form_validation->run())
        {
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $email=$this->input->post('email');
            $password=$this->input->post('password');

            $this->load->model('Admin_Model');
            if($this->Login_Model->register($firstname,$lastname,$email,$password) & ($this->Login_Model->login_insert($email,$password))){
                
                redirect(base_url(). 'LoginController/user_login');
            }
            else{
                $this->session->set_flashdata('error','Unable to Register');
                redirect(base_url(). 'LoginController/sign_up');
            }
            
        }
        else{
            $this->session->set_flashdata('error','Please check your data.Unable to register');    
            $this->load->view('sign_up');	
        }

    }
}