<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('video_model','', true);
		$this->load->model('category_video_model','', true);
		$this->load->library('form_validation');
		$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     
		     $config = $this->page_config();

		     $data = array(
		     			'list_video' => $this->get_list_video($config['uri'], $config['per_page']),
		     			'link' => $this->pagination->create_links(),
		     			'success' => $this->notification()
		     		);
		     $this->parser->parse('admin/video/video_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function create() {
		if($this->session->userdata('logged_in')) {
			$sess_data = $this->session->userdata('logged_in');
	 		$data = array("success" => false, 
	 					"error_message" => "", 
	 					"flag" => "create",
	 					"title_category" => $this->get_category_video()
	 				);

	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		$this->video_model->create_video($d);
			 		$data['success'] = true;
			 		$this->load->view("admin/video/create_video", $data);
			 	}
		 	} else {
		 		$this->load->view("admin/video/create_video", $data);	
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	 function get_list_video($start, $limit) {
	 	$result = $this->video_model->get_video_list($start, $limit);
	 	$data_array = ""; $i = 1;
	 	if($result) {
	 		foreach($result as $row) {
		 		$id = $row->video_id;
	        	$data_array .= "<tr><td>" . $id . "</td>";
	        	$data_array .= "<td>" . $row->title_category . "</td>";
	        	$data_array .= "<td>" . $row->title_video . "</td>";
	        	$data_array .= "<td>" . $row->status . "</td>";
	        	$data_array .= "<td>" . $row->created_date . "</td>";
	        	$data_array .= "<td>" . $row->modified_date . "</td>";
	        	$data_array .= "<td><a href='". base_url()."admin/video/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/video/update/".$id."'>Edit</a>&nbsp;<a href='". base_url() ."admin/video/delete/".$id."' onclick='return ConfirmDelete();'>Delete</a></td></tr>";
	        	$i++;
	        }
	        return $data_array . "</tr>";	
	 	} else return "";
	 }

	 function get_category_video($flag=1, $id='') {
		$result = $this->category_video_model->get_category();
	 	$category = "";
	 	if($flag == 1) {
	 		foreach($result as $row) {
	 			$category .= "<option value='". $row->video_category_id ."'>" . $row->title . "</option>";
	 		}	
	 	} else {
	 		foreach($result as $row) {
	 			if($id == $row->video_category_id) {
	 				$category .= "<option value='". $row->video_category_id ."'>" . $row->title . "</option>";	
	 				break;
	 			}
	 		}
	 		foreach($result as $row) {
	 			if($id != $row->video_category_id) {
	 				$category .= "<option value='". $row->video_category_id ."'>" . $row->title . "</option>";
	 			}
	 		}	
	 	}

	 	return $category;
	}

	function delete($id='') {
		if($this->session->userdata('logged_in')) {
	 		$r = $this->video_model->get_by_id($id);
	 		$this->video_model->delete_video($id);
	 		$t = array("success" => true,
	 				"video_title" => $r->title_video,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		redirect('admin/video');
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
			 		$this->video_model->update_video($d['video_id'], $d);
			 		$t = array("success" => true,
			 				"video_title" => $d['title'],
			 				"f" => "update"
			 			);
			 		$this->session->set_userdata("t", $t);
			 		redirect('admin/video');
			 	}
		 	} else {
		 		$q = $this->video_model->get_by_id($id);
		 		$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
		 		$data = array("video_id" => $q->video_id,
		 				"title_category" => $this->get_category_video(2, $q->video_category_id),
	                    "title" => $q->title_video,
	                    "tag" => $q->tag,
	                    "status" => $q->status,
	                    "description" => $q->description,
	                    "story_ide" => $q->story_ide,
	                    "screenwriter" => $q->screenwriter,
	                    "film_director" => $q->film_director,
	                    "cameramen" => $q->cameramen,
	                    "artist" => $q->artist,
	                    "url" => $q->url,
	                    "duration" => $q->duration,
		 				"flag" => "update",
		 				"error_message" => $e
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/video/video_update', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->video_model->get_by_id($id);
	 		$v = explode("v=", $q->url);
	 		$data = array("title_category" => $q->title_category,
	                    "title" => $q->title_video,
	                    "tag" => $q->tag,
	                    "status" => $q->status,
	                    "description" => $q->description,
	                    "story_ide" => $q->story_ide,
	                    "screenwriter" => $q->screenwriter,
	                    "film_director" => $q->film_director,
	                    "cameramen" => $q->cameramen,
	                    "artist" => $q->artist,
	                    "url" => "<iframe width='420' height='345'src='http://www.youtube.com/embed/". $v[1] ."'></iframe> ",
	                    "duration" => $q->duration,
	                    "created_date" => $q->created_date,
	                    "modified_date" => $q->modified_date
	                );
	 		$this->parser->parse('admin/video/detail_video', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}

	function page_config() {
	 	$config['base_url'] = base_url() . "admin/video/page";
		$config['per_page'] = 5;
	 	$config['total_rows'] = $this->video_model->count_video();
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = true;
			
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		return array("uri" => $page, "per_page" => $config['per_page']);
	}

	function page() {
	 	if(!$this->uri->segment(4)) {
	 		redirect("admin/video");
	 	} else {
	 		$this->index();	
	 	}
	}

	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = $t['video_title'] . " has been deleted successfully.";
			} else if($t['success'] && $t['f'] == 'update') {
				$notif = $t['video_title'] . " has been updated successfully.";
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
	 	$this->form_validation->set_rules('tag', 'Tag', 'required|xss_clean');
	 	$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');  
	 	$this->form_validation->set_rules('url', 'URL Youtube', 'required|xss_clean');
	 	$this->form_validation->set_rules('duration', 'Duration', 'required|xss_clean');
	 }
}