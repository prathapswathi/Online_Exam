<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller{

   
    public function index(){
        $this->load->view('home');
    }
	public function admin_login(){
        
        $this->load->view('admin_login');	
       
    }
    public function sign_in(){

    }
    public function user_login(){
		$this->load->view('user_login');
	}
	public function sign_up(){
		$this->load->view('sign_up');
    }
    public function register()
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

            $this->load->model('Login_Model');
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
    
	public function reset(){
		$this->load->view('forgot_password');
    }
    public function change_pass(){
        $this->load->view('change_password');
    }
    public function admin_login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $username=$this->input->post('username');
            $password=$this->input->post('password');

            $this->load->model('Login_Model');
            if($this->Login_Model->login($username,$password)){
                ($this->Login_Model->update_time($username,$password));
                $session_data=array(
                    'username'=>$username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url(). 'AdminController/dashbord');
            }
            else{
                $this->session->set_flashdata('error','invalid username and password');
                redirect(base_url(). 'LoginController/admin_login');
            }
            
        }
        else{
            $this->load->view('admin_login');	
        }
    }
    public function user_login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $username=$this->input->post('username');
            $password=$this->input->post('password');

            $this->load->model('Login_Model');
            if($this->Login_Model->login($username,$password)){
                ($this->Login_Model->update_time($username,$password));
                $session_data=array(
                    'username'=>$username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url(). 'UserController/dashbord');
            }
            else{
                $this->session->set_flashdata('error','invalid username and password');
                redirect(base_url(). 'LoginController/user_login');
            }
            
        }
        else{
            $this->load->view('user_login');	
        }
    }
    function enter()
    {
        if($this->session->userdata('username')!='')
        {
            
            echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
            echo '<label><a href="'.base_url().'LoginController/logout">Logout</a></label>';
        }
        else{
            redirect(base_url(). 'LoginController/admin_login');	
        }
    }
    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url(). '');	
    }
}