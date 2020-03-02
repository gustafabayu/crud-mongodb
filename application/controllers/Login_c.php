<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_m');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
    }

    public function index()
	{
		$this->load->view('Login_v');
    }
    
    public function register()
    {  
        $this->load->view('Register_v');
    }
    
    public function Add_user()
    {
        $this->form_validation->set_rules('full_name', 'Full Name','required');
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password1','Password','required');
        $this->form_validation->set_rules('password2','Confirm Password','required|matches[password1]');

        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            $this->load->view('Register_v');
        } else {
            $insert_data=$this->Login_m->Save_user();
            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully Register, Login now!');
                redirect('Login_c/register');
            }
            
        }
    }
}