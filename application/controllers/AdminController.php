<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
    }
   
    public function index(){
        $this->load->view('admin_profile');
        
    }
    public function dashboard()
    {
        $this->load->view('admin_dashbord');
        $this->load->view('footer');
    }
    public function profile(){
        $this->load->model('Login_Model');
        $data['email']=$this->session->userdata('username');
        $UserData=$this->Login_Model->getUserData($data);
        $last_activity= $UserData['last_activity'];
        $name=$UserData['firstname'];
        $data=array(
            'name'=>$name,
            'username'=> $this->session->userdata('username'),
            'active'=>$last_activity,   
        );
        $this->load->view('admin_profile',$data);
    }

    public function topics()
    {
        $this->load->model('Admin_Model');
    //      $data['h']=$this->Admin_Model->topics();    
    //     $this->load->view('topics',$data);
    //     $this->load->view('footer');
$config = array();
$config["base_url"] = base_url() . "AdminController/topics";
$total_row = $this->Admin_Model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 1;
$config['use_page_numbers'] = TRUE;
$config['num_links'] = $total_row;
$config['cur_tag_open'] = '&nbsp;<a class="current">';
$config['cur_tag_close'] = '</a>';
$config['next_link'] = 'Next';
$config['prev_link'] = 'Previous';

$this->pagination->initialize($config);
if($this->uri->segment(2)){
$page = ($this->uri->segment(2)) ;
}
else{
$page = 1;
}
$data["h"] = $this->Admin_Model->get_topics($config["per_page"], $page);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

// View data according to array.
$this->load->view("topics", $data);
$this->load->view("footer");

  }
    public function read_topics($id)
    {
       
       // $id=$this->input->post('id');
        $this->load->model('Admin_Model');  
        $data['get_topics']=$this->Admin_Model->read_topics($id); 
        $this->load->view('read_topics',$data);
        $this->load->view('footer');
     
        
    }
    public function add_topics()
    {      
        $this->load->view('add_topics');
        $this->load->view('footer');
    }
    public function edit_topics($id)
    {
        $this->load->model('Admin_Model');  
        $data['get_topics']=$this->Admin_Model->read_topics($id); 
        $this->load->view('edit_topics',$data);
        $this->load->view('footer');
    }
    public function edit_topics_action($id)
    {
        $this->load->view('footer');
        $topic_id=$this->input->post('course_id');
        $topic_name=$this->input->post('course_name');
        $desc=$this->input->post('desc');
        $this->load->model('Admin_Model');   
        if($this->Admin_Model->edit_topics($id,$topic_id,$topic_name,$desc))
        { 
            echo "<script>alert('The topics updated successfully....!')</script>";
  
             redirect(base_url(). 'AdminController/dashboard');
         }
        else{
            $this->session->set_flashdata('error','Unable to Create topics');
            redirect(base_url(). 'AdminController/edit_topics/$id');
             }
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
                        redirect(base_url(). 'AdminController/dashboard');
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
        $this->load->model('Admin_Model');
      $image=$this->Admin_Model->get($id);
    
	if($this->Admin_Model->delete($id,$image)){
        $this->session->set_flashdata('error','Data deleted successfully');
        $this->load->view('topics');
    }
    else{
       
        $this->load->view('topics');
    }
    }
}


       
