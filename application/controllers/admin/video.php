<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/utils.php'; 

class Video extends CI_Controller {

	private $status = array("unpublished", "pending", "published");
	private $utils;

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('video_model','', true);
		$this->load->model('category_video_model','', true);
		$this->load->model('image_model','', true);
		$this->load->library('form_validation');
		$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		$this->utils = new Utils();
		$this->utils->set_counter_comment_notif();
 		
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
		     	 $this->utils = new Utils();
			 	 $this->utils->set_counter_comment_notif();
			 	 $this->utils->set_counter_new_message();
			     $config = $this->page_config();
			     $data = array(
			     			'list_video' => $this->get_list_video($config['uri'], $config['per_page']),
			     			'link' => $this->pagination->create_links(),
			     			'success' => $this->notification()
			     		);
			     $this->parser->parse('admin/video/video_management', $data);
			} else {
				$this->output->set_status_header('401');
				print_r("<h1>Authorization required.</h1>");
			}
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
	 					"user_id" => $sess_data['id'],
	 					"title_category" => $this->get_category_video(),
	 					"image" => "assets/img/default-image.png",
	 					"title" => "",
	                    "tag" => "",
	                    "status" => $this->get_status(),
	                    "description" => "",
	                    "producer" => "",
	                    "story_ide" => "",
	                    "screenwriter" => "",
	                    "film_director" => "",
	                    "cameramen" => "",
	                    "artist" => "",
	                    "url" => "",
	                    "host" => "",
	                    "editor" => "",
	                    "duration" => ""
	 				);

	        $this->validation();
	        if(isset($_POST['submit'])) {
	        	$is_uploaded = true;
	        	$d = $this->input->post(null, true);
	        	$t = $this->upload_config();
				$img_data = array("name" => "assets/img/video/default-image.png", 
								"size" => 0);
				if(!$t['is_uploaded'] && !empty($t['data']['file_name'])) {
			 		$data['error_message'] = "<span style='color:red'>" . $t['error_message'] . "</span>";
			 		$is_uploaded = false;
			 	}
	        	if($this->form_validation->run() == true and $is_uploaded) {	
					if($t['is_uploaded']) {
			 			$img_data['name'] = "assets/img/video/" . $t['data']['file_name'];
			 			$img_data['size'] = $t['data']['file_size'];
			 		} 
			 		$d['image_id'] = $this->post_image(array("title" => $d['title'],
							"type" => "video",
							"tag" => $d['tag'],
							"size" => $img_data['size'],
							"body" => $d['description'],
							"path" => $img_data['name']
					));
			 		$this->video_model->create_video($d);
			 		$data['success'] = true;
			 		$this->load->view("admin/video/create_video", $data);
			 	} else {
			 		if(!$data['success']) {
				 		$data = array("success" => $data['success'],
			 				"title_category" => $this->get_category_video(2, $d['video_category_id']),
		                    "title" => $d['title'],
		                    "tag" => $d['tag'],
		                    "status" => $this->get_status(2, $d['status']),
		                    "description" => $d['description'],
		                    "producer" => $d['producer'],
		                    "story_ide" => $d['story_ide'],
		                    "screenwriter" => $d['screenwriter'],
		                    "film_director" => $d['film_director'],
		                    "cameramen" => $d['cameramen'],
		                    "artist" => $d['artist'],
		                    "url" => $d['url'],
		                    "host" => $d['host'],
		                    "editor" => $d['editor'],
		                    "duration" => $d['duration'],
		                    "image" => $data['image'], 
			 				"flag" => "create",
			 				"error_message" => $data['error_message'],
			 				"user_id" => $sess_data['id']
			 			);
			 			$this->load->view("admin/video/create_video", $data);
			 		}
			 	}
		 	} else {
		 		$this->load->view("admin/video/create_video", $data);	
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function post_image($data) {
		$this->image_model->insert_image($data);
		$result = $this->image_model->get_last_image();
		return ($result != false) ? $result->image_id : 0;
	}

	function get_list_video($start, $limit, $keyword='') {
	 	$result = $this->video_model->get_video_list(0, $start, $limit, $keyword);
	 	$data_array = ""; $i = 1;
		$number = 0; $edit = ""; $delete = ""; $approve = "";
		
	 	if($result) {
	 		$session_data = $this->session->userdata('logged_in');
	 		foreach($result as $row) {
				$number =  $start + $i;
		 		$id = $row->video_id;
	        	
	        	$detail = Tb::button('Detail', array(
		            'type' => Tb::BUTTON_TYPE_LINK,
		            'url' => base_url() . "admin/video/detail/".$id,
		            'size' => Tb::BUTTON_SIZE_SMALL,
		            'color' => Tb::BUTTON_COLOR_PRIMARY
		        ));

	        	if($session_data['role'] == 'superadmin' ||  $session_data['id']== $row->user_id) {
					$edit = Tb::button('Edit', array(
			            'type' => Tb::BUTTON_TYPE_LINK,
			            'url' => base_url() . "admin/video/update/".$id,
			            'size' => Tb::BUTTON_SIZE_SMALL,
			            'color' => Tb::BUTTON_COLOR_SUCCESS
			        ));

			        $delete = Tb::button('Delete', array(
			            'type' => Tb::BUTTON_TYPE_LINK,
			            'onclick' => "setId(".$id.")",
			            'size' => Tb::BUTTON_SIZE_SMALL,
			            'color' => Tb::BUTTON_COLOR_DANGER,
			            'url' => '#modal_confirm',
	                    'data-toggle' => 'modal'
			        ));
			    }
			    if($session_data['role'] == 'superadmin') {
			    	$approve = Tb::button('Approve', array(
						'type' => Tb::BUTTON_TYPE_LINK,
						'onclick' => "setId(".$id.")",
						'size' => Tb::BUTTON_SIZE_SMALL,
						'color' => Tb::BUTTON_COLOR_WARNING,
						'url' => '#modal_approve',
						'data-toggle' => 'modal'
					));
			    }

		        $d1 = explode(" ", $row->created_date);
		        $d2 = explode("-", $d1[0]);
		        $url = $row->status == 'published' ? "<a target='_blank' href='".base_url("video/watch/".$d2[0]."/".$d2[1]."/".$d2[2]."/". $id . "/" . $this->utils->slug($row->title_video))."'>View</a>" : "";
		        
		        $data_array .= "<tr>";
	        	$data_array .= "<td>" . $number . "</td>";
	        	$data_array .= "<td>" . $row->title_category . "</td>";
	        	$data_array .= "<td>" . $row->title_video . "</td>";
	        	$data_array .= "<td>" . $row->status . "</td>";
	        	$data_array .= "<td>".$url."</td>";
	        	$data_array .= "<td>".$detail."&nbsp;".$edit."&nbsp;".$delete."&nbsp;".$approve."</td>";
	        	$data_array .= "</tr>";
	        	$edit = ""; $delete = ""; $approve = "";
	        	$i++;
	        }
	        return $data_array;	
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
			$id = isset($_POST['id']) ? $_POST['id'] : 0; 
	 		$r = $this->video_model->get_by_id(0, $id);
	 		$this->video_model->delete_video($id);
	 		$t = array("success" => true,
	 				"video_title" => $r->title_video,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		//redirect('admin/video');
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
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
			 		$q = $this->image_model->get_by_id($d['image_id']) ? $this->image_model->get_by_id($d['image_id']) : (object) array("path" => "", "size" => 0);
			 		$img_data = array("name" => $q->path, 
								"size" => $q->size);
					if($t['is_uploaded']) {
			 			$img_data['name'] = "assets/img/video/" . $t['data']['file_name'];
			 			$img_data['size'] = $t['data']['file_size'];
			 		} else if(!$t['is_uploaded'] && !empty($t['data']['file_name'])) {
			 			$e['error_message'] = "<span style='color:red'>" . $t['error_message'] . "</span>";
			 			$is_success = false;
			 		}

			 		if($is_success) {
						$this->image_model->update_image((int) $d['image_id'], 
								array("title" => $d['title'],
										"type" => "video",
										"tag" => $d['tag'],
										"size" => $img_data['size'],
										"body" => $d['description'],
										"path" => $img_data['name']
								)
							);
				 		$this->video_model->update_video($d['video_id'], $d);
				 		$t = array("success" => true,
				 				"video_title" => $d['title'],
				 				"f" => "update"
				 			);
				 		$this->session->set_userdata("t", $t);
				 		redirect('admin/video');
				 	} else {
				 		$this->session->set_userdata("error_message", $e);
			 			redirect('admin/video/update/' . $d['video_id']);
				 	}
			 	}
		 	} else {
		 		$q = $this->video_model->get_by_id(0, $id);
		 		$e = $this->session->userdata("error_message") ? $this->session->userdata("error_message") : array("error_message" => "");;
		 		$img = $this->get_video_image($q->video_id);
		 		$data = array("video_id" => $q->video_id,
		 				"title_category" => $this->get_category_video(2, $q->video_category_id),
	                    "title" => $q->title_video,
	                    "tag" => $q->tag,
	                    "status" => $this->get_status(2, $q->status),
	                    "description" => $q->description,
	                    "producer" => $q->producer,
	                    "story_ide" => $q->story_ide,
	                    "screenwriter" => $q->screenwriter,
	                    "film_director" => $q->film_director,
	                    "cameramen" => $q->cameramen,
	                    "artist" => $q->artist,
	                    "url" => $q->url,
	                    "host" => $q->host,
	                    "editor" => $q->editor,
	                    "duration" => $q->duration,
	                    "image" => $img['path'],
	                    "image_id" => $img['image_id'], 
		 				"flag" => "update",
		 				"error_message" => $e['error_message']
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/video/video_update', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function approve() {
		if($this->session->userdata('logged_in')) {
			$id = isset($_POST['id']) ? $_POST['id'] : 0;
	 		$r = $this->video_model->get_by_id(0, $id);
	 		$this->video_model->update_status($id);
	 		$t = array("success" => true,
	 				"video_title" => $r->title_video,
	 				"f" => "approve"
	 			);
	 		$this->session->set_userdata("t", $t);
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}

	function get_video_image($id) {
		$r = $this->video_model->get_image($id);
		return ($r != false) ? array("image_id" => $r->image_id, "path" => $r->path) : array("image_id" => 0, "path" => "");
	}
	
	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->video_model->get_by_id(0, $id);
	 		$youtube_id = ""; $link = $q->url;
	 		if(strpos($link, "v=")) {
	 			$arr = explode("v=", $link);
	 			$youtube_id = $arr[1];
	 		}
	 		$image = $this->get_video_image($id);
	 		$img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
			$img .= "<a target='_blank' class='thumbnail' href='". base_url() . $image['path'] ."'>";
			$img .= "<img class='img-responsive' src='". base_url() . $image['path'] ."'>";
			$img .= "</a></div>";
	 		$data = array("title_category" => $q->title_category,
	                    "title" => $q->title_video,
	                    "tag" => $q->tag,
	                    "status" => $q->status,
	                    "description" => $q->description,
	                    "producer" => $q->producer,
	                    "story_ide" => $q->story_ide,
	                    "screenwriter" => $q->screenwriter,
	                    "film_director" => $q->film_director,
	                    "cameramen" => $q->cameramen,
	                    "artist" => $q->artist,
						"host" => $q->host,
	                    "editor" => $q->editor,
	                    "url" => "<iframe width='420' height='345'src='http://www.youtube.com/embed/". $youtube_id ."'></iframe> ",
	                    "duration" => $q->duration,
	                    "image" => $img,
	                    "created_date" => $q->created_date,
	                    "modified_date" => $q->modified_date
	                );
	 		$this->parser->parse('admin/video/detail_video', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}

	function filter() {
		if($this->session->userdata('logged_in')) {
		    $keyword = $this->input->get('title', true);
			$config = $this->page_config(array('filter', $keyword));
			$this->utils = new Utils();
		    $data = array(
		   			'list_video' => $this->get_list_video($config['uri'], $config['per_page'], $keyword),
		   			'link' => $this->pagination->create_links(),
		   			'success' => $this->notification()
		   		);
		    $this->parser->parse('admin/video/video_management', $data);
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function get_status($flag=1, $st=''){
		$sess_data = $this->session->userdata('logged_in');
		$option = "";
		if($sess_data['role'] == 'superadmin') {
			if($flag == 1) {
				foreach($this->status as $s) {
					$option .= "<option value='".$s."'>".$s."</option>";
				}
			} else {
				foreach($this->status as $s) {
					if($s == $st) {
						$option .= "<option value='".$s."'>".$s."</option>";
						break;
					} 
				}
				foreach($this->status as $s) {
					if($s != $st) {
						$option .= "<option value='".$s."'>".$s."</option>";
					} 
				}
			}
		} else {
			if($st == "published") {
	 			$option = "<option value='". $st ."'>published</option>";
	 		} else {
	 			$option = "<option value='pending'>waiting</option>";
	 		}
		}

		return $option;
	}

	function page_config() {
	 	$config['base_url'] = base_url() . "admin/video/page";
		$config['per_page'] = 5;
	 	$config['total_rows'] = $this->video_model->count_video();
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = true;
			
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		if($page != 0) {
			$page = $page + (3*($page-1)+($page-2));
		}
		return array("uri" => $page, 
					"per_page" => $config['per_page']);
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
			} else if($t['success'] && $t['f'] == 'approve') {
				$notif = $t['video_title'] . " has been approved successfully.";
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
	
	function upload_config() {
		$config['upload_path'] = './assets/img/video/';
		$config['allowed_types'] = 'jpg|gif|jpeg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';
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