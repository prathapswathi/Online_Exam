<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
   
    public function index(){
        $this->load->view('admin_profile');
    }
    public function dashbord()
    {
        $this->load->view('admin_dashbord');
        $this->load->view('footer');
    }
    public function profile(){
        $this->load->library('session');
        $last_activity= $this->session->userdata('last_activity');

        $data=array(
            'username'=> $this->session->userdata('username'),
            'active'=>$last_activity,   
        );
        $this->load->view('admin_profile',$data);
    }

    public function topics()
    {
       $this->load->model('Admin_Model');
         $data['h']=$this->Admin_Model->topics();    
        $this->load->view('topics',$data);
        $this->load->view('footer');
    }
    public function add_topics()
    {      
        $this->load->view('add_topics');
        $this->load->view('footer');
    }
    public function add_topics_action()
    {  
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_id','Topic Id','trim|required');
        $this->form_validation->set_rules('course_name','Topic Name','trim|required');
        $this->form_validation->set_rules('desc','Description','trim|required');
        // $this->form_validation->set_rules('image','Image','required');
        if (empty($_FILES['image']['name']))
        {
        $this->form_validation->set_rules('image', 'Image file', 'required');
        }
        
        if($this->form_validation->run())
        {
            $this->load->library('upload');

            if (!empty($_FILES['image']['name']))
            {
                $config['upload_path'] = './images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';     
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('image'))
                {
                    $img = $this->upload->data();
                    // $file_name = $img['file_name'];
                    $file_name = $img['file_name'];
                     $topic_id=$this->input->post('course_id');
                    $topic_name=$this->input->post('course_name');
                    $desc=$this->input->post('desc');
                    $image=$file_name;

    
                   $this->load->model('Admin_Model');
                   $topics=$this->Admin_Model->add_topics($topic_id,$topic_name,$desc,$image);
    
                   if($topics){   
                        redirect(base_url(). 'AdminController/dashbord');
                    }
                    else{
                        $this->session->set_flashdata('error','Unable to Create topics');
                        redirect(base_url(). 'AdminController/add_topics');
                    }
                }
                else
                {
                    echo $this->upload->display_errors();
    
                }
            }
            
        }
        else{
            $this->session->set_flashdata('error','Please check your data.Unable to create topics');    
            $this->load->view('add_topics');	
        }

    }
    public function delete($id)
    {
        // $id=$row->id;
        $this->load->model('Admin_Model');
      //  $image=$this->Admin_Model->get($id);
	if($this->Admin_Model->delete($id)){
        $this->session->set_flashdata('error','Data deleted successfully');
        $this->load->view('topics');
    }
    else{
        $this->session->set_flashdata('error','Unable to delete data');
        $this->load->view('topics');
    }
    }
}