<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie'); 
        $this->load->library('Authorization_Token');
        $this->load->library('CreatorJwt');
       
        
    }
   
    public function index(){
        $this->load->model('Login_Model');
        // $token=$this->session->userdata('token');
        // $data['session']=$this->Login_Model->get_session($token);
        $this->load->view('header');
        $this->load->view('login');	
        $this->load->view('footer');
      
    }
  function login(){
        $this->load->model('Login_Model');
        // $token=$this->session->userdata('token');
        // $data['session']=$this->Login_Model->get_session($token);
        $this->load->view('header');
        $this->load->view('login');	
        $this->load->view('footer');
    }

    
	public function sign_up(){
        $this->load->view('header');
        $this->load->model('Login_Model');
        $data['utype']=$this->Login_Model->UserType(); 
        $this->load->view('register',$data);	
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
        $this->form_validation->set_rules('terms','TOS','trim|required'); 

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
            $this->load->model('Login_Model');
            $data['utype']=$this->Login_Model->UserType(); 
            $this->load->view('header');
            $this->load->view('register',$data);	
            $this->load->view('footer');
        }
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
    public function login_validation(){

        $session_set_value = $this->session->all_userdata();

        if ($_COOKIE['token'] == $session_set_value['token']) {
        $this->user_type();
     } else {


        $this->load->library('form_validation');
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

            $str=rand(); 
            $token =md5($str);
            $this->input->set_cookie('token',$token); 
            $this->session->set_userdata('token',$token);
                if ($this->input->post("chkremember"))
                {
                    $username=$data['email'];
                    $password=$sess_password;
                    $remember=$this->Login_Model->make_session($username,$password,$token);
                    $this->input->set_cookie('token',$token , 360);
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
    public function ForgotPassword()
    {
        $email = $this->input->post('email');
        $this->load->model('Login_Model');
        $findemail = $this->Login_Model->ForgotPassword($email);
        if ($findemail) {
          
            redirect(base_url() . 'LoginController/recover');
        } else {
            echo "<script>alert(' $email not found, please enter correct email id')</script>";
            redirect(base_url() . 'LoginController/reset', 'refresh');
        }
    }
    public function new_password()
    {
        $this->load->library('session');
        $this->load->model('Login_Model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[25]|callback_is_password_strong');
        $this->form_validation->set_message('is_password_strong', 'password is weak!!!');
        $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
        if($this->form_validation->run())
        {
        $password= $this->input->post('password');
        $cpassword=$this->input->post('cpassword');
        $hpassword = password_hash($password,PASSWORD_DEFAULT);
      
        if($this->Login_Model->new_password($hpassword)){
            echo "<script>alert(' Successfully changed the password')</script>";
            redirect(base_url(). 'LoginController/login');
        }
        else{
            echo "<script>alert('Unable to change the password')</script>";
            redirect(base_url(). 'LoginController/login');
        }
        }
        else{
            $this->load->view('header');
            $this->load->view('change_password');	
            $this->load->view('footer');
        }

    }
    public function is_password_strong($password)
    {
       if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password) && preg_match('#[^a-zA-Z\d]#',$password)) {
         return TRUE;
       }
       return FALSE;
    }
    
    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url(). '');	
        $this->session->unset_userdata('token');
        redirect(base_url(). '');	
       
        delete_cookie($_COOKIE['token']);

    }
      
   
}