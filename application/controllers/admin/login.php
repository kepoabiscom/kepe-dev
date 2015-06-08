<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()	{
   		parent::__construct();
   		$this->load->helper(array('form'));
   		$this->load->model('user_model','', true);
      $this->load->library('form_validation');
 	}

 	function index() {
 		if(!$this->session->userdata('logged_in')) {
	   		  $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_db');

	        if($this->form_validation->run() == false) {
	            $this->load->view('admin/login');
	        }
	        else {
	            redirect('admin/dashboard', 'refresh');
	        }
	    } else {
	    	redirect('admin/dashboard', 'refresh');
	    }
 	}

 	function check_db($password) {
         $username = $this->input->post('username');
         
         $result = $this->user_model->login($username, $password);

         if($result) {
             $sess_array = array();
             foreach($result as $row) {
               $sess_array = array(
                 'id' => $row->user_id,
                 'role' => $row->user_role,
                 'username' => $row->user_name
               );
               $this->session->set_userdata('logged_in', $sess_array);
             }
             return true;
         }
         else {
             $this->form_validation->set_message('check_db', "<span style='color:red'>Invalid username or password</span>");
             return false;
         }
     }

}