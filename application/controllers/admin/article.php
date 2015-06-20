<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('article_model','', true);
		$this->load->model('category_article_model','', true);
		$this->load->library("pagination");
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
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
		$result = $this->article_model->get_article_list($start, $limit, $keyword);
	 	$data_array = ""; $i = 1;
	 	if($result) {
	 		foreach($result as $row) {
		 		$id = $row->article_id;
	        	$data_array .= "<tr><td>" . $id . "</td>";
	        	$data_array .= "<td>" . $row->title_category . "</td>";
	        	$data_array .= "<td>" . $row->title_article . "</td>";
	        	$data_array .= "<td>" . $row->status . "</td>";
	        	$data_array .= "<td>" . $row->created_date . "</td>";
	        	$data_array .= "<td>" . $row->modified_date . "</td>";
	        	$data_array .= "<td><a href='". base_url()."admin/article/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/article/update/".$id."'>Edit</a>&nbsp;<a href='". base_url() ."admin/article/delete/".$id."' onclick='return ConfirmDelete();'>Delete</a></td></tr>";
	        	$i++;
	        }
	        return $data_array . "</tr>";	
	 	} else return "";
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
	 		$r = $this->article_model->get_by_id($id);
	 		$this->article_model->delete_article($id);
	 		$t = array("success" => true,
	 				"article_title" => $r->title_article,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		redirect('admin/article');
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
	 					"category" => $this->get_category_article()
	 				);

	        $this->validation();

	        if($this->form_validation->run() == true) {
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		$d['image_id'] = 0;
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

	function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	 	$this->form_validation->set_rules('tag', 'Tag', 'required|xss_clean');
	 	$this->form_validation->set_rules('summary', 'Summary', 'required|xss_clean');  
	 }

	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->article_model->get_by_id($id);
	 		$data = array("nama_lengkap" => $q->nama_lengkap,
		 				"title_article" => $q->title_article,
		 				"tag" => $q->tag,
		 				"category" => $q->title_category,
		 				"status" => $q->status,
		 				"summary" => $q->summary, 
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
			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
			 		unset($d['submit']);
			 		$this->article_model->update_article($d['article_id'], $d);
			 		$t = array("success" => true,
			 				"title_article" => $d['title'],
			 				"f" => "update"
			 			);
			 		$this->session->set_userdata("t", $t);
			 		redirect('admin/article');
			 	}
		 	} else {
		 		$r = $this->article_model->get_by_id($id);
		 		$e = $this->session->userdata("error_message") ?  $this->session->userdata("error_message") : "";
		 		$data = array("article_id" => $r->article_id,
		 				"title" => $r->title_article,
		 				"category" => $this->get_category_article(2, $r->article_category_id),
		 				"status" => $r->status,
		 				"tag" => $r->tag,
		 				"summary" => $r->summary,
		 				"flag" => "update",
		 				"error_message" => $e,
		 				"user_id" => $r->user_id
		 			);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/content/article/update_article', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
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