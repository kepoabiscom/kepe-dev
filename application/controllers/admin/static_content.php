<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/utils.php'; 

class Static_content extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('static_content_model','', true);
		$this->load->library('form_validation');

		$this->utils = new Utils();
	}

	function index() {
		$this->utils->set_counter_comment_notif();
 		
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
			 $success = $this->notification();
			 
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
			     $data = array(
					'data_static_content' => $this->get_list_static_content(),
					'success' => $success,
					'link' => ""
			     );
	
			     $this->parser->parse('admin/content/static_content/static_content_management', $data);
		     } else {
		     	$this->output->set_status_header('401');
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}
	
	function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	 	$this->form_validation->set_rules('tag', 'Tag', 'required|xss_clean');
	 	$this->form_validation->set_rules('summary', 'Summary', 'required|xss_clean');  
	 	//$this->form_validation->set_rules('body', 'Body', 'required|xss_clean');  
	 }
	 
	function get_list_static_content(){
		$result = $this->static_content_model->get_list_static_content();
		
	 	$data_array = ""; $i = 1;

	 	if($result) {
	 		foreach($result as $row) {				
		 		$id = $row->static_content_id;
	        	$data_array .= "<tr><td>" . $i . "</td>";
	        	$data_array .= "<td>" . $row->title . "</td>";
	        	$data_array .= "<td>" . $row->tag . "</td>";
	        	$data_array .= "<td>" . $row->status . "</td>";
	        	$data_array .= "<td>" . $row->created_date . "</td>";
	        	$data_array .= "<td>" . $row->modified_date . "</td>";
	        	$data_array .= "<td><a href='". base_url()."admin/static-content/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/static-content/update/".$id."'>Edit</a></tr>";
	        	$i++;
	        }
	        return $data_array . "</tr>";
	 	} else return "";
	}
	
	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->static_content_model->get_by_id($id);
	 		$data = array("title" => $q->title,
		 				"tag" => $q->tag,
		 				"parameter" => $q->parameter,
		 				"summary" => $q->summary,
		 				"body" => $q->body,
		 				"status" => $q->status,
		 				"created_date" => $q->created_date,
		 				"modified_date" => $q->modified_date
		     		);
	 		$this->parser->parse('admin/content/static_content/detail_static_content', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}
	
	function get_status($t=1, $s='') {
		$status = $this->static_content_model->get_enum_status();
		print_r($status);		
	}
	
	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = $t['static_content_title'] . " has been deleted successfully.";
			} else if($t['success'] && $t['f'] == 'update') {
				$notif = $t['title_static_content'] . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }
	 
	 function update($id='') {
		if($this->session->userdata('logged_in')) {
	        $this->validation();

	        if($this->form_validation->run() == true) {
	        	$is_success = true; $e = "";
				$t = $this->upload_config();

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
					unset($d['submit']);
					
					$q = $this->image_model->get_by_id($d['image_id']) ? $this->image_model->get_by_id($d['image_id']) : "";
			 		$img_data = array("name" => $q->path, 
								"size" => $q->size);
					
					if($t['is_uploaded']) {
			 			$img_data['name'] = "assets/img/" . $t['data']['file_name'];
			 			$img_data['size'] = $t['data']['file_size'];
			 		} else if(!$t['is_uploaded'] && !empty($t['data']['file_name'])) {
			 			$e['error_message'] = "<span style='color:red'>" . $t['error_message'] . "</span>";
			 			$is_success = false;
			 		}
					
					if($is_success) {
						$this->image_model->update_image((int) $d['image_id'], 
								array("title" => $d['title'],
										"type" => "static_content",
										"tag" => $d['tag'],
										"size" => $img_data['size'],
										"body" => $d['summary'],
										"path" => $img_data['name']
								)
							);
						
						$d['image_id'] = $d['image_id'];
						
						$this->static_content_model->update_static_content($d['static_content_id'], $d);
						$t = array("success" => true,
								"title_static_content" => $d['title'],
								"f" => "update"
							);
						 $this->session->set_userdata("t", $t);
						 redirect('admin/static-content');
					} else {
			 			$this->session->set_userdata("error_message", $e);
			 			redirect('admin/static-content/update/' . $d['static-content_id']);
			 		}
			 	}
		 	} else {
		 		$r = $this->static_content_model->get_by_id($id);

		 		$e = $this->session->userdata("error_message") ? $this->session->userdata("error_message") : array("error_message" => "");
				$data = array("static_content_id" => $r->static_content_id,
						"title" => $r->title,
		 				"tag" => $r->tag,
						"image" => $this->get_static_content_image($r->static_content_id), 
		 				"parameter" => $r->parameter,
		 				"summary" => $r->summary,
		 				"body" => $r->body,
		 				"status" => $r->status,
		 				"created_date" => $r->created_date,
		 				"modified_date" => $r->modified_date,
						"flag" => "update",
		 				"error_message" => $e['error_message'],
						"user_id" => $r->user_id,
		 				"image_id" => $r->image_id
		     		);
		 		
				$this->session->unset_userdata("error_message");
				
		 		$this->load->view('admin/content/static_content/update_static_content', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	 }
	 
	  function upload_config() {
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|gif|jpeg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '2024';
		$config['max_height']  = '1768';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$uploaded = $this->upload->do_upload();
		$data = $this->upload->data();
		if($uploaded) {
			chmod($data['full_path'], 0777);
			return array("is_uploaded" => true, 
					"data" => $data);
		} return array("is_uploaded" => false, 
					"data"=> $data, 
					"error_message" => $this->upload->display_errors());
	}
	
	function get_static_content_image($id='') {
		$r = $this->static_content_model->get_image($id);
		return ($r != false) ? $r->path : "";
	}
}