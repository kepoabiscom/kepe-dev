<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH . 'libraries/utils.php';

class Article extends CI_Controller {

	private $utils;

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('article_model','', true);
		$this->load->model('category_article_model','', true);
		$this->load->model('image_model','', true);
		$this->load->library("pagination");
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		$this->utils = new Utils();
		$this->utils->set_counter_comment_notif();
 		
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');

		     $config = $this->page_config();

		     $data = array(
		     			'list_article' => $this->get_list_article($config['uri'], $config['per_page']),
		     			'link' => $this->pagination->create_links(),
		     			'success' => $this->notification()
		     		);
		     $this->parser->parse('admin/content/article/article_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}

	function get_list_article($start, $limit, $keyword='') {
		$result = $this->article_model->get_article_list(0, $start, $limit, $keyword);
	 	$data_array = ""; $i = 1;
		$number = 0;

	 	if($result) {
			$session_data = $this->session->userdata('logged_in');
			
	 		foreach($result as $row) {
				$number =  $start + $i;
		 		$id = $row->article_id;

		 		$button[0] = Tb::button('Detail', array(
		            'type' => Tb::BUTTON_TYPE_LINK,
		            'url' => base_url() . "admin/article/detail/".$id,
		            'size' => Tb::BUTTON_SIZE_SMALL,
		            'color' => Tb::BUTTON_COLOR_PRIMARY
		        ));

		 		if($session_data['role'] == 'superadmin' ||  $session_data['id']== $row->user_id) {
					$button[1] = Tb::button('Edit', array(
			            'type' => Tb::BUTTON_TYPE_LINK,
			            'url' => base_url() . "admin/article/update/".$id,
			            'size' => Tb::BUTTON_SIZE_SMALL,
			            'color' => Tb::BUTTON_COLOR_SUCCESS
			        ));
					
			        $button[2] = Tb::button('Delete', array(
			            'type' => Tb::BUTTON_TYPE_LINK,
			            'onclick' => "setId(".$id.")",
			            'size' => Tb::BUTTON_SIZE_SMALL,
			            'color' => Tb::BUTTON_COLOR_DANGER,
			            'url' => '#modal_confirm',
	                    'data-toggle' => 'modal'
			        ));
		    	}
				
				if($session_data['role'] == 'superadmin') {
					$button[3] = Tb::button('Approve', array(
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
		        $url = $row->status == 'published' ? "<a target='_blank' href='".base_url("article/read/".$d2[0]."/".$d2[1]."/".$d2[2]."/". $id . "/" . $this->utils->slug($row->title_article))."'>View</a>" : "";
				$btn = implode("&nbsp;", $button);
				
	        	$data_array .= "<tr><td>" . $number . "</td>";
	        	$data_array .= "<td>" . $row->title_category . "</td>";
	        	$data_array .= "<td>" . $row->title_article . "</td>";
	        	$data_array .= "<td>" . $row->status . "</td>";
	        	$data_array .= "<td>".$url."</td>";
	        	$data_array .= "<td>".$btn."</td></tr>";
	        	$button[1] = ""; $button[2] = ""; $button[3] = ""; 
	        	$i++;
	        }
	        return $data_array . "</tr>";	
	 	} else return "";
	}

	function approve() {
		if($this->session->userdata('logged_in')) {
			$id = isset($_POST['id']) ? $_POST['id'] : 0;
	 		$r = $this->article_model->get_by_id($id);
	 		$this->article_model->update_status($id);
	 		$t = array("success" => true,
	 				"title_article" => $r->title_article,
	 				"f" => "approve"
	 			);
	 		$this->session->set_userdata("t", $t);
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}

	function get_category_article($flag=1, $id='') {
		$result = $this->category_article_model->get_category();
	 	$category = "";
	 	if($flag == 1) {
	 		foreach($result as $row) {
	 			$category .= "<option value='". $row->article_category_id ."'>" . $row->title . "</option>";
	 		}	
	 	} else {
	 		foreach($result as $row) {
	 			if($id == $row->article_category_id) {
	 				$category .= "<option value='". $row->article_category_id ."'>" . $row->title . "</option>";	
	 			}
	 		}
	 		foreach($result as $row) {
	 			if($id != $row->article_category_id) {
	 				$category .= "<option value='". $row->article_category_id ."'>" . $row->title . "</option>";
	 			}
	 		}	
	 	}

	 	return $category;
	}

	function delete($id='') {
		if($this->session->userdata('logged_in')) {
			$id = isset($_POST['id']) ? $_POST['id'] : 0;
	 		$r = $this->article_model->get_by_id($id);
	 		$this->article_model->delete_article($id);
	 		$t = array("success" => true,
	 				"article_title" => $r->title_article,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		//redirect('admin/article');
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
	 					"category" => $this->get_category_article(),
	 					"status" => $this->get_status()
	 				);

	        $this->validation();

	        if($this->form_validation->run() == true) {
	        	$t = $this->upload_config();
				$img_data = array("name" => "assets/img/article/default-image.png", 
								"size" => 0);
				if($t['is_uploaded']) {
		 			$img_data['name'] = "assets/img/article/" . $t['data']['file_name'];
		 			$img_data['size'] = $t['data']['file_size'];
		 		} else if(!$t['is_uploaded'] && !empty($t['data']['file_name'])) {
		 			$data['error_message'] = "<span style='color:red'>" . $t['error_message'] . "</span>";
		 			$this->load->view("admin/content/article/create_article", $data);	
		 			return;
		 		}

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		$d['image_id'] = $this->post_image($d, $img_data);
			 		$this->article_model->create_article($d);
			 		$data['success'] = true;
			 		$this->load->view("admin/content/article/create_article", $data);
			 	}
		 	} else {
		 		$this->load->view("admin/content/article/create_article", $data);	
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function post_image($d, $img_data) {
		$data = array("title" => $d['title'],
					"type" => "article",
					"tag" => $d['tag'],
					"size" => $img_data['size'],
					"body" => $d['summary'],
					"path" => $img_data['name']
			);
		$this->image_model->insert_image($data);
		$result = $this->image_model->get_last_image();
		return ($result != false) ? $result->image_id : 0;
	}

	function upload_config() {
		$config['upload_path'] = './assets/img/article/';
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

	function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	 	$this->form_validation->set_rules('tag', 'Tag', 'required|xss_clean');
	 	$this->form_validation->set_rules('summary', 'Summary', 'required|xss_clean');  
	 }

	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->article_model->get_by_id($id);
	 		$image = $this->get_article_image($id);
	 		$img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
			$img .= "<a target='_blank' class='thumbnail' href='". base_url() . $image ."'>";
			$img .= "<img class='img-responsive' src='". base_url() . $image ."'>";
			$img .= "</a></div>";
	 		$data = array("nama_lengkap" => $q->nama_lengkap,
		 				"title_article" => $q->title_article,
		 				"tag" => $q->tag,
		 				"category" => $q->title_category,
		 				"status" => $q->status,
		 				"summary" => $q->summary,
		 				"image" => $img, 
		 				"created_date" => $q->created_date,
		 				"modified_date" => $q->modified_date
		     		);
	 		$this->parser->parse('admin/content/article/detail_article', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}

	function filter() {
		if($this->session->userdata('logged_in')) {
		    $keyword = $this->input->get('title', true);
			$config = $this->page_config(array('filter', $keyword));

		    $data = array(
		   			'list_article' => $this->get_list_article($config['uri'], $config['per_page'], $keyword),
		   			'link' => $this->pagination->create_links(),
		   			'success' => $this->notification()
		   		);
		    $this->parser->parse('admin/content/article/article_management', $data);
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
			 		$q = $this->image_model->get_by_id($d['image_id']) ? $this->image_model->get_by_id($d['image_id']) : "";
			 		$img_data = array("name" => $q->path, 
								"size" => $q->size);
					if($t['is_uploaded']) {
			 			$img_data['name'] = "assets/img/article/" . $t['data']['file_name'];
			 			$img_data['size'] = $t['data']['file_size'];
			 		} else if(!$t['is_uploaded'] && !empty($t['data']['file_name'])) {
			 			$e['error_message'] = "<span style='color:red'>" . $t['error_message'] . "</span>";
			 			$is_success = false;
			 		}
			 		if($is_success) {
						$this->image_model->update_image((int) $d['image_id'], 
								array("title" => $d['title'],
										"type" => "article",
										"tag" => $d['tag'],
										"size" => $img_data['size'],
										"body" => $d['summary'],
										"path" => $img_data['name']
								)
							);

			 			$d['image_id'] = $d['image_id'];
				 		$this->article_model->update_article($d['article_id'], $d);
				 		$t = array("success" => true,
				 				"title_article" => $d['title'],
				 				"f" => "update"
				 			);
				 		$this->session->set_userdata("t", $t);
				 		redirect('admin/article');
			 		} else {
			 			$this->session->set_userdata("error_message", $e);
			 			redirect('admin/article/update/' . $d['article_id']);
			 		}
			 	}
		 	} else {
		 		$r = $this->article_model->get_by_id($id);
		 		$e = $this->session->userdata("error_message") ? $this->session->userdata("error_message") : array("error_message" => "");
		 		$data = array("article_id" => $r->article_id,
		 				"title" => $r->title_article,
		 				"category" => $this->get_category_article(2, $r->article_category_id),
		 				"status" => $this->get_status(2, $r->status),
		 				"tag" => $r->tag,
		 				"image" => $this->get_article_image($r->article_id), 
		 				"summary" => $r->summary,
		 				"flag" => "update",
		 				"error_message" => $e['error_message'],
		 				"user_id" => $r->user_id,
		 				"image_id" => $r->image_id
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/content/article/update_article', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	function get_article_image($id='') {
		$r = $this->article_model->get_image($id);
		return ($r != false) ? $r->path : "";
	}

	function get_status($t=1, $s='') {
		$session_data = $this->session->userdata('logged_in');
		$status = $this->article_model->get_enum_status();
		$enum = ""; $f = ""; 
		foreach($status as $r) {
			 $enum = $r->COLUMN_TYPE;
		}
		preg_match_all("/enum\(\'(.*)\'\)$/", $enum, $matches);
        $results = explode("','", $matches[1][0]);
        if($session_data['role'] == 'superadmin') {
			if($t == 1) {
		 		foreach($results as $result) {
		 			$f .= "<option value='". $result ."'>" . $result . "</option>";
		 		}	
		 	} else {
		 		foreach($results as $result) {
		 			if($s == $result) {
		 				$f .= "<option value='". $result ."'>" . $result . "</option>";	
		 			}
		 		}
		 		foreach($results as $result) {
		 			if($s != $result) {
		 				$f .= "<option value='". $result ."'>" . $result . "</option>";
		 			}
		 		}	
		 	}
	 	} else {
	 		if($s == "published") {
	 			$f = "<option value='". $s ."'>published</option>";
	 		} else {
	 			$f = "<option value='pending'>waiting</option>";
	 		}
	 	}
	 	return $f;
	}

	function page_config($flag=null) {
		if($flag[0] == 'filter') {
			$config['base_url'] = base_url() . "admin/article/filter";
			$config['per_page'] = 5;
		 	$config['total_rows'] = $this->article_model->count_article($flag[1]);
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = true;
				
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;	
		} else {
			$config['base_url'] = base_url() . "admin/article/page";
			$config['per_page'] = 5;
		 	$config['total_rows'] = $this->article_model->count_article();
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = true;
				
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;	

			if($page != 0) {
				$page = $page + (3*($page-1)+($page-2));
			}
		}
		return array("uri" => $page, "per_page" => $config['per_page']);
	 }

	 function page() {
	 	if(!$this->uri->segment(4)) {
	 		redirect("admin/article");
	 	} else {
	 		$this->index();	
	 	}
	 }

	 function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = $t['article_title'] . " has been deleted successfully.";
			} else if($t['success'] && $t['f'] == 'update') {
				$notif = $t['title_article'] . " has been updated successfully.";
			} else if($t['success'] && $t['f'] == 'approve') {
				$notif = $t['title_article'] . " has been approved successfully.";
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