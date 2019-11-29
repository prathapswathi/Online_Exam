<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('session');

    }
   
    public function index(){
       
        $this->load->view('header');
        $this->load->view('login');	
        $this->load->view('footer');
        
    }
  function login(){
   
    $this->load->view('header');
    $this->load->view('login');	
    $this->load->view('footer');
  
    }

   
public function login_validation(){
   $this->load->library('form_validation');
   if($_COOKIE['token'])
   {
     $this->token();
   }
   else{
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
       if($this->form_validation->run() == TRUE)
        {
            $data=array(
            'email' => $this->input->post('username'),
            'password' => $this->input->post('password'));
     
           $sess_password=$this->input->post('password');
           $this->load->model('Login_Model');
          
           $login= $this->Login_Model->login($data);
            if($login){
                if ($this->input->post("chkremember"))
                {
                    $username=$data['email'];
                    $password=$sess_password;
                    $str=rand(); 
                    $token =md5($str);
                    $this->input->set_cookie('token',$token);$this->session->set_userdata('token',$token);
                    if($remember=$this->Login_Model->make_session($username,$token));
                    else
                    alert("unable to set cookies");
                } 
                $this->user_type();
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
}
   
   
    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url(). '');	
        $this->session->unset_userdata('token');
        redirect(base_url(). '');	
       
        delete_cookie($_COOKIE['token']);

    }
      
    public function token(){
        if($_COOKIE['token'] == $_SESSION['token'])
        {
            $token=$_COOKIE['token'];
            $this->load->model('Login_Model');
            $remember=$this->Login_Model->getSession($token);
            if($remember)
            {
               $this->user_type();
            }
        }
       }
        public function user_type()
        {
            $user_type= $this->session->userdata('user_type');
            if($user_type=='admin')
            {
            redirect(base_url(). 'AdminController/dashbord');
      
            }
            if($user_type == 'user')
            {
                redirect(base_url(). 'UserController/dashbord'); 
                
            }
        }
}