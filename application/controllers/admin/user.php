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
		$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');
		 	$success = $this->notification();

		 	$config['base_url'] = base_url() . "admin/user/index";
			$config['per_page'] = 5;
		 	$config['total_rows'] = $this->user_model->count_user();
			$config['uri_segment'] = 4;
				
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		    $data = array(
		     			'username' => $session_data['username'],
		     			'data_user' => $this->get_user_list($page, $config['per_page']),
		     			'success' => $success,
		     			'link' => $this->pagination->create_links()
		     		);
		    $this->parser->parse('admin/user/user_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function get_user_list($start, $limit) {
	 	$result = $this->user_model->get_user_list($start, $limit);
	 	$data_array = ""; $i = 1;
	 	foreach($result as $row) {
	 		$id = $row->user_id;
        	$data_array .= "<tr><td>" . $id . "</td>";
        	$data_array .= "<td>" . $row->nama_lengkap . "</td>";
        	$data_array .= "<td>" . $row->user_name . "</td>";
        	$data_array .= "<td>" . $row->user_role . "</td>";
        	$data_array .= "<td>" . $row->position . "</td>";
        	$data_array .= "<td>" . $row->created_date . "</td>";
        	$data_array .= "<td>" . $row->modified_date . "</td>";
        	$data_array .= "<td><a href='". base_url()."admin/user/update/".$id."'>Edit</a>&nbsp;<a href='". base_url() ."admin/user/delete/".$id."' onclick='return ConfirmDelete();'>Delete</a></td></tr>";
        	$i++;
        }

        return $data_array . "</tr>";
	 }
 
	 function create() {
	 	if($this->session->userdata('logged_in')) {
	 		$data = array("success" => false, "flag" => "create");
	        $this->validation();
	        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		$this->user_model->create_user($d);
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

	 function update($id='') {
	 	if($this->session->userdata('logged_in')) {
	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$this->user_model->update_user($d['user_id'], $d);
			 		$t = array("success" => true,
			 				"username" => $d['user_name'],
			 				"f" => "update"
			 			);
			 		$this->session->set_userdata("t", $t);
			 		redirect('admin/user');
			 	}
		 	} else {
		 		$r = $this->user_model->get_by_id($id);
		 		$data = array("user_id" => $r->user_id,
		 				"username" => $r->user_name,
		 				"nama_lengkap" => $r->nama_lengkap,
		 				"email" => $r->email,
		 				"position" => $r->position,
		 				"role" => $r->user_role,
		 				"description" => $r->body,
		 				"flag" => "update"
						//"image" => $r->image
		 			);
		 		$this->load->view('admin/user/update_user', $data);
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
	 				"username" => $r->user_name,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		redirect('admin/user');
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	 }

	 function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean');
	 	$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|xss_clean');
	 	$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
	    
	 }

	 function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = $t['username'] . "has been deleted successfully.";
			} else if($t['success'] && $t['f'] == 'update') {
				$notif = $t['username'] . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }


}
