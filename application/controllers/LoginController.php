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
  
public function ajax_login()
{
   $this->load->library('form_validation');
   $this->load->model('Login_Model');
   if(isset($_COOKIE['userToken']))
   {
     $this->token();
   }
   else {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    
     if($this->form_validation->run() == TRUE)
    {
       $data['email']=$this->input->post('username');
       $password=$this->input->post('password');
       $UserData=$this->Login_Model->getUserData($data);
       if(password_verify($password,$UserData['password'])){
        $responseData['status'] = 'SUCCESS';
        $responseData['user_type'] = $UserData['user_type'];
            if(!empty($this->input->post("chkremember"))){
                $responseData['remember'] = 'remember';
                $token = md5(time());
                set_cookie("userToken",$token,time()+3600);
                $_SESSION['userToken'] = $token;
                $this->Login_Model->setUserData($data,['token'=>$token]);
            }
       }
       else{
        $responseData['status'] = 'FAILE';
        $responseData['message'] = "invalid username and password!! Please try again";
       }
    }
    else{
        $responseData['message'] = validation_errors();
    }
   
    header("Content-Type: application/json");
    echo json_encode($responseData);
   }
    
 }
public function token()
{
    $wheretoken['token'] = $_COOKIE['userToken'];
    $this->load->model('Login_Model');
    $getUserData = $this->Login_Model->getUserData($wheretoken);
    if($_COOKIE['userToken'] == $getUserData['token']){
        $responseData['status'] = 'SUCCESS';
        $responseData['user_type'] = $getUserData['user_type'];
    } else {
        $responseData['status'] = 'FAIL';
        $responseData['message'] = 'Unable to login';     
   }
    header("Content-Type: application/json");
    echo json_encode($responseData);
}
function logout()
{
    delete_cookie("userToken");
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('token');
    $this->session->unset_userdata('user_type');
    $this->session->unset_userdata('types');
    redirect(base_url(). '');	
    
}
}