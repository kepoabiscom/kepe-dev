<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('about_model','', true);
		$this->load->library('form_validation');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		    $data = $this->get_about_detail();

	 		$this->parser->parse('admin/about/view_about', $data);
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}

	function get_about_detail() {
		$q = $this->about_model->get_detail();

	    $logo = !isset($q->logo) ? "" : $q->logo;
	    $img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
		$img .= "<a target='_blank' class='thumbnail' href='". base_url() . "assets/img/" . $logo ."'>";
		$img .= "<img class='img-responsive' src='". base_url() . "assets/img/" . $logo ."'>";
		$img .= "</a></div>";
 		$data = array("title" => !isset($q->title) ? "" : $q->title,
	 				"contact_address" => !isset($q->contact_address) ? "" : $q->contact_address,
	 				"contact_telphone_1" => !isset($q->contact_telphone_1) ? "" : $q->contact_telphone_1,
	 				"contact_telphone_2" => !isset($q->contact_telphone_2) ? "" : $q->contact_telphone_2,
	 				"contact_email_1" => !isset($q->contact_email_1) ? "" : $q->contact_email_1,
	 				"contact_email_2" => !isset($q->contact_email_2) ? "" : $q->contact_email_2,
	 				"contact_fax" => !isset($q->contact_fax) ? "" : $q->contact_fax,
	 				"contact_lat" => !isset($q->contact_lat) ? "" : $q->contact_lat,
	 				"contact_long" => !isset($q->contact_long) ? "" : $q->contact_long,
	 				"background_color" => !isset($q->background_color) ? "" : $q->background_color,
	 				"footer" => !isset($q->footer) ? "" : $q->footer, 
	 				"user_id" => !isset($q->user_id) ? "" : $q->user_id,
	 				"image" => $img,
	 				"logo_name" => $logo, 
	 				"setting_id" => !isset($q->setting_id) ? "" : $q->setting_id
	     		);
 		return $data;
	}

	function update() {
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');

		    $img_name = "";
	        $this->validation();

	        if($this->form_validation->run() == true) {
	 			$t = $this->upload();

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$q = $this->about_model->get_detail();
			 		if($t['is_uploaded']) {
			 			$d['logo'] = $t['data']['file_name'];
			 			if($q->logo != null) {
			 				//unlink(base_url() . "assets/img/team/" . $q->image);
			 			} 
			 		} else if(!$t['is_uploaded']) {
			 			if(empty($t['data']['file_name'])) {
			 				$d['logo'] = empty($q->logo) ? "logo.png" : $q->logo;
			 			} else {
			 				$data = array("error_message" => "<span style='color:red'>" . $t['error_message'] . "</span>");
		 					$this->session->set_userdata("error_message", $data['error_message']);
		 					redirect("admin/about/update");	
			 			}	
			 		}

			 		$result = (!empty($d['setting_id'])) ? $this->about_model->update_about($d['setting_id'], $d) : $this->about_model->insert_new($d);
			 		$t = array("success" => true,
			 				"about" => "About",
			 				"f" => "update"
			 			);
			 		$this->session->set_userdata("t", $t);
			 		redirect('admin/about/update');
			 	}
		 	} else {
		 		$success = $this->notification();
		 		$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
		 		$data = array_merge($this->get_about_detail(),
		 					array("error_message" => $e,
		 						"success" => $success)
		 				);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/about/update_about', $data);
		 	}

		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == 'update') {
				$link = "<strong><a href='" . base_url() . "admin/about' >" . $t['about'] . "</a></strong>"; 
				$notif = $link . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }

	function validation() {
		$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	 	$this->form_validation->set_rules('contact_address', 'Address', 'required|xss_clean');
	 	$this->form_validation->set_rules('contact_telphone_1', 'Telephone 1', 'required|xss_clean');   	
	}

	function upload() {
	 	$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|gif|jpeg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$uploaded = $this->upload->do_upload();
		$data = $this->upload->data();
		if($uploaded) {
			return array("is_uploaded" => true, 
						"data" => $data);
		} return array("is_uploaded" => false, 
						"data"=> $data, 
						"error_message" => $this->upload->display_errors());
	 }
}