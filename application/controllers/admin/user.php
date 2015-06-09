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
		 	 $success = $this->notification('1');
		     $data = array(
		     			'username' => $session_data['username'],
		     			'data_user' => $this->get_user_list(),
		     			'success' => $success
		     		);
		     $this->parser->parse('admin/user/user_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function get_user_list() {
	 	$result = $this->user_model->get_user_list();
	 	$data_array = ""; $i = 1;
	 	foreach($result as $row) {
	 		$id = $row->user_id;
        	$data_array .= "<tr><td>" . $i . "</td>";
        	$data_array .= "<td>" . $row->nama_lengkap . "</td>";
        	$data_array .= "<td>" . $row->user_name . "</td>";
        	$data_array .= "<td>" . $row->user_role . "</td>";
        	$data_array .= "<td>" . $row->position . "</td>";
        	$data_array .= "<td>" . $row->created_date . "</td>";
        	$data_array .= "<td>" . $row->modified_date . "</td>";
        	$data_array .= "<td><a href='user/edit/".$id."'>Edit</a>&nbsp;<a href='user/delete/".$id."'>Delete</a></td></tr>";
        	$i++;
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
	 	if($this->session->userdata('logged_in')) {
	 		$data['success'] = false;
	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$data = $this->input->post(null, true);
			 		$this->user_model->update_user($id, $data);
			 		$data['success'] = true;
			 		$this->load->view("admin/user/create_user", $data);
			 	}
		 	} else {
		 		$r = $this->user_model->get_by_id($id);
			 		$data = array(
			 				
			 			);
		 		$this->load->view("admin/user/edit_user", $data);	
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	 }

	 function delete($id='') {
	 	if($this->session->userdata('logged_in')) {
	 		$r = $this->user_model->get_by_id($id);
	 		$this->user_model->delete_user($id);
	 		$t = array("success" => true,
	 				"username" => $r->user_name
	 			);
	 		$this->session->set_userdata("t", $t);
	 		redirect('admin/user');
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	 }

	 function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
	 	$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|xss_clean');
	 	$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
	    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
	    
	 }

	 function notification($flag='1') {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $flag == '1') {
				$notif = $t['username'] . "has been deleted successfully.";
			} else if($t['success'] && $flag == '2') {
				$notif = $t['username'] . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Success!</strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }


}
