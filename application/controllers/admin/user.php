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
		$this->load->model('user_role_basic_model','', true);
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

		 	$config = $this->page_config();

		    $data = array(
		     			'username' => $session_data['username'],
		     			'data_user' => $this->get_user_list($config['uri'], $config['per_page']),
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
	 	if($result) {
	 		foreach($result as $row) {
		 		$id = $row->user_id;
	        	$data_array .= "<tr><td>" . $id . "</td>";
	        	$data_array .= "<td>" . $row->nama_lengkap . "</td>";
	        	$data_array .= "<td>" . $row->user_name . "</td>";
	        	$data_array .= "<td>" . $row->user_role . "</td>";
	        	$data_array .= "<td>" . $row->position . "</td>";
	        	$data_array .= "<td>" . $row->created_date . "</td>";
	        	$data_array .= "<td>" . $row->modified_date . "</td>";
	        	$data_array .= "<td><a href='". base_url()."admin/user/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/user/update/".$id."'>Edit</a>&nbsp;<a href='". base_url() ."admin/user/delete/".$id."' onclick='return ConfirmDelete();'>Delete</a></td></tr>";
	        	$i++;
	        }
	        return $data_array . "</tr>";
	 	} else return "";
	 }

	 function detail($id='') {
	 	if($this->session->userdata('logged_in')) {
	 		$q = $this->user_model->get_by_id($id);
	 		
	 		$img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
			$img .= "<a target='_blank' class='thumbnail' href='". base_url() . "assets/img/team/" . $q->image ."'>";
			$img .= "<img class='img-responsive' src='". base_url() . "assets/img/team/" . $q->image ."'>";
			$img .= "</a></div>";
	 		$data = array(
		     			"username" => $q->user_name,
		 				"nama_lengkap" => $q->nama_lengkap,
		 				"email" => $q->email,
		 				"position" => $q->position,
		 				"role" => $q->user_role,
		 				"description" => $q->body,
		 				"image" => $img
		     		);
	 		$this->parser->parse('admin/user/view_user', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	 }
 
	 function create() {
	 	if($this->session->userdata('logged_in')) {
	 		$data = array(
				"success" => false, 
				"error_message" => "", 
				"flag" => "create",
				"role_name" => $this->get_user_role_basic()
			);

	        $this->validation();
	        $this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean|min_length[3]|callback_db_check_username');
	        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

	        if($this->form_validation->run() == true) {
	        	$img_name = "default.jpg";
	 			$t = $this->upload();
		 		if($t['is_uploaded']) {
		 			$img_name = $t['data']['file_name'];
		 		} else if(!$t['is_uploaded'] && !empty($t['data']['file_name'])) {
		 			$data['error_message'] = "<span style='color:red'>" . $t['error_message'] . "</span>";
		 			$this->load->view("admin/user/create_user", $data);	
		 			return;
		 		}

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		$d['image'] = $img_name;
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
	
	function get_user_role_basic($flag=1, $id=''){
		$result = $this->user_role_basic_model->get_user_role_basic();
	 	$user_role_basic = '';
		
		if($flag == 1) {
	 		foreach($result as $row) {
	 			$user_role_basic .= "<option value='". $row->user_role_basic_id ."'>" . $row->role_name . "</option>";
	 		}	
	 	} else {
	 		foreach($result as $row) {
	 			if($id == $row->user_role_basic_id) {
	 				$user_role_basic .= "<option value='". $row->user_role_basic_id ."'>" . $row->role_name . "</option>";	
	 				break;
	 			}
	 		}
	 		foreach($result as $row) {
	 			if($id != $row->user_role_basic_id) {
	 				$user_role_basic .= "<option value='". $row->user_role_basic_id ."'>" . $row->role_name . "</option>";
	 			}
	 		}	
	 	}
		
		return $user_role_basic;
	}
	
	function db_check_username($username) {
       	$result = $this->user_model->username_check($username);

       	if($result) return true;
       	else {
            $this->form_validation->set_message('db_check_username', "<span style='color:red'>The Username is not Available.</span>");
            return false;
        }
	}

	function ajax_check_username($username='') {
	 	$result = $this->user_model->username_check($username);
	 	if($result) {
	 		$status = array("success" => true,
	 					"msg" => "Available!"
	 			);
	 	} else {
	 		$status = array("success" => false,
	 					"msg" => "Not Available!"
	 			);
	 	}	
	 	echo json_encode($status);
	 }

	 function update($id='') {
	 	if($this->session->userdata('logged_in')) {
	        $img_name = "";
	        $this->validation();

	        if($this->form_validation->run() == true) {
	 			$t = $this->upload();

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$q = $this->user_model->get_by_id($d['user_id']);
			 		if($t['is_uploaded']) {
			 			$d['image'] = $t['data']['file_name'];
			 			if($q->image != null) {
			 				//unlink(base_url() . "assets/img/team/" . $q->image);
			 			} 
			 		} else if(!$t['is_uploaded']) {
			 			if(empty($t['data']['file_name'])) {
			 				$d['image'] = $q->image == null ? "default.jpg" : $q->image;
			 			} else {
			 				$data = array("error_message" => "<span style='color:red'>" . $t['error_message'] . "</span>");
		 					$this->session->set_userdata("error_message", $data['error_message']);
		 					redirect("admin/user/update/" . $d['user_id']);	
			 			}	
			 		}

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
		 		$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
		 		$data = array("user_id" => $r->user_id,
		 				"username" => $r->user_name,
		 				"nama_lengkap" => $r->nama_lengkap,
		 				"email" => $r->email,
		 				"position" => $r->position,
		 				"role_name" => $this->get_user_role_basic(2, $r->user_role_basic_id),
		 				"description" => $r->body,
		 				"image" => $r->image,
		 				"flag" => "update",
		 				"error_message" => $e
		 			);
					
		 		$this->session->unset_userdata("error_message");
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

	 function upload() {
	 	$config['upload_path'] = './assets/img/team/';
		$config['allowed_types'] = 'jpg|gif|jpeg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$uploaded = $this->upload->do_upload();
		$data = $this->upload->data();
		if($uploaded) {
			return array("is_uploaded" => true, "data" => $data);
		} return array("is_uploaded" => false, "data"=> $data, "error_message" => $this->upload->display_errors());
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
				$notif = $t['username'] . " has been deleted successfully.";
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

	 function page_config() {
	 	$config['base_url'] = base_url() . "admin/user/page";
		$config['per_page'] = 5;
	 	$config['total_rows'] = $this->user_model->count_user();
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = true;
			
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		return array("uri" => $page, "per_page" => $config['per_page']);
	 }

	 function page() {
	 	if(!$this->uri->segment(4)) {
	 		redirect("admin/user");
	 	} else {
	 		$this->index();	
	 	}
	 	
	 }


}
