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
    $validator = array('success' => false, 'messages' => array());
   $this->load->library('form_validation');
   if(isset($_COOKIE['token']))
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
                   $this->session->set_userdata('token',$token);
                    $this->input->set_cookie('token',$token,time()+ 360);
                    if($remember=$this->Login_Model->make_session($username,$token));
                    else
                    alert("unable to set cookies");
                } 
                $type= $this->session->userdata('user_type');
                if($type == 'admin')
                {
                //echo json_encode(['success' => true]);
                
				$validator['success'] = true;
				$validator['messages'] = 'welcome admin';	
                redirect(base_url(). 'AdminController/dashbord');
                }
                if($type == 'user')
                {
                    //echo json_encode(['success' => true]);
                    $validator['success'] = true;
				   $validator['messages'] = 'welcome user';
                    redirect(base_url(). 'UserController/dashbord');   
                }
            }
            else{
               // echo json_encode(['success' => false]);

               $validator['success'] = false;
				$validator['messages'] = 'invalid username and password';
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
   echo json_encode($validator);
   
}
   
   
   
      
    public function token(){
        if($_COOKIE['token'] == $_SESSION['token'])
        {
            $token=$_COOKIE['token'];
            $this->load->model('Login_Model');
            $remember=$this->Login_Model->getSession($token);
            if($remember){
            $username= $this->session->userdata('sess_user');
            $password= $this->session->userdata('sess_password');
            $password=password_hash($password,PASSWORD_DEFAULT);
            $data=array(
                'email' => $username);
            $login=$this->Login_Model->sess_login($data);
            if($login)
            {
               $this->user_type();
            }
            else{
                $this->session->set_flashdata('error','error type');
                echo json_encode(['success' => false]);
                redirect(base_url(). 'LoginController/login');
            }
            }
            else{
                $this->session->set_flashdata('error','unable to get cookies data');
                echo json_encode(['success' => false]);
                redirect(base_url(). 'LoginController/login');
            }
        }
        else{
            $this->session->set_flashdata('error','invalid username and password');
            echo json_encode(['success' => false]);
            redirect(base_url(). 'LoginController/login');
        }
       }
        public function user_type()
        {
            $type= $this->session->userdata('types');
            if($type == 'admin')
            {
                echo json_encode(['success' => true]);
            redirect(base_url(). 'AdminController/dashbord');
            }
            if($type == 'user')
            {
                echo json_encode(['success' => true]);
                redirect(base_url(). 'UserController/dashbord');   
            }
            
        }
        function logout()
        {
         
            $this->load->helper('cookie');
            delete_cookie("token");
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('token');
            $this->session->unset_userdata('user_type');
            $this->session->unset_userdata('types');
            redirect(base_url(). '');	
            
    
        }
}