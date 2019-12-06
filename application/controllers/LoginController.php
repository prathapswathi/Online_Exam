<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->helper('date');
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
    public function ajax_register()
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
                $responseData['status'] = 'SUCCESS';             
            }
            else{
                $responseData['status'] = 'FAIL';    
                $responseData['message'] = 'Unable to register!! Please try again';    
            }
            
        }
        else{
            $responseData['message'] = validation_errors();
          
        }
        header("Content-Type: application/json");
    echo json_encode($responseData);
    }
    public function is_password_strong($password)
    {
       if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password) && preg_match('#[^a-zA-Z\d]#',$password)) {
         return TRUE;
       }
       return FALSE;
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
        $this->Login_Model->update_time($data);
        $sess_data = array(
            'username' => $UserData['email']);
            $this->session->set_userdata($sess_data);
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
        $this->Login_Model->update_time($getUserData);
        $responseData['status'] = 'SUCCESS';
        $responseData['user_type'] = $getUserData['user_type'];
    } else {
        $responseData['status'] = 'FAIL';
        $responseData['message'] = 'Unable to login';     
   }
    header("Content-Type: application/json");
    echo json_encode($responseData);
}

public function ajax_forgotPassword()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->form_validation->run())
        {
            $email = $this->input->post('email');
            $this->load->model('Login_Model');
            $findemail = $this->Login_Model->ForgotPassword($email);
            if ($findemail) {
                $this->load->config('email');
                $this->load->library('email');
                $this->load->library('encrypt');
                $link='http://localhost/Online_Exam/LoginController/recover';
                $from = 'swathi8498@gmail.com';
                $to = $email;
                $subject = 'Reset Your Password';
                $message = "Please click here to reset your password <a href='http://localhost/Online_Exam/LoginController/recover' >Reset Password</a>";
                //$message =$link;
        
                $this->email->set_newline("\r\n");
                $this->email->from($from,'Reset your password');
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                if($this->email->send()){
                
                    $responseData['status'] = 'SUCCESS';
                    // $responseData['message'] = 'Password reset link sent to your provided mail !!!';
                }
                else{
                    $responseData['status'] = 'FAIL';
                    $responseData['message'] = 'Unable to send mail !!!!!!!';
                }
             //$responseData['status'] = 'SUCCESS';
                
            } else {
                $responseData['status'] = 'FAIL';
                $responseData['message'] = 'email not found, please enter correct email id';
            }
        }
        else {
            $responseData['message'] = validation_errors();
        }
       
        header("Content-Type: application/json");
        echo json_encode($responseData);
    }
    public function ajax_changePassword()
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
            
            $responseData['status'] = 'SUCCESS';
        }
        else{
            $responseData['status'] = 'FAIL';
                $responseData['message'] = 'Unable to change the password!!Please try again';
        }
        }
        else{
            $responseData['message'] = validation_errors();
            
        }
        header("Content-Type: application/json");
        echo json_encode($responseData);
    }

function logout()
{
    delete_cookie("userToken");
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('token');
    $this->session->unset_userdata('user_type');
    $this->session->unset_userdata('types');
    redirect(base_url(). '');	
    
}
}