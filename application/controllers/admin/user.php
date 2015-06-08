<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('user_model','', true);
		$this->load->library('form_validation');
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     $data = array(
		     			'username' => $session_data['username'],
		     			'data_user' => $this->get_user_list()
		     		);
		     $this->parser->parse('admin/user/user_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function get_user_list() {
	 	$result = $this->user_model->get_user_list();
	 	$data_array = "";
	 	foreach($result as $row) {
        	$data_array .= "<tr><td>" . $row->user_id . "</td>";
        	$data_array .= "<td>" . $row->nama_lengkap . "</td>";
        	$data_array .= "<td>" . $row->user_name . "</td>";
        	$data_array .= "<td>" . $row->user_role . "</td>";
        	$data_array .= "<td>" . $row->position . "</td>";
        	$data_array .= "<td>" . $row->created_date . "</td>";
        	$data_array .= "<td>" . $row->modified_date . "</td>";
        	$data_array .= "<td><a href='user/edit'>Edit</a>&nbsp;<a href='user/delete'>Delete</a></td></tr>";
        }

        return $data_array . "</tr>";
	 }
 
	 function create() {
	 	if($this->session->userdata('logged_in')) {
	 		$data['success'] = false;
	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$data = $this->input->post(null, true);
			 		$this->user_model->create_user($data);
			 		$data['success'] = true;
			 		$this->load->view("admin/user/create_user", $data);
			 	}
		 	} else {
		 		$this->load->view("admin/user/create_user", $data);	
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	 }

	 function edit($id='') {
	 	return "";
	 }

	 function delete($id='') {
	 	return "";
	 }

	 function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
	 	$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|xss_clean');
	 	$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
	    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
	    
	 }


}
