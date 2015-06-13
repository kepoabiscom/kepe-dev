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

	function get_list_article($start, $limit) {
		$result = $this->article_model->get_article_list($start, $limit);
	 	$data_array = ""; $i = 1;
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
	}

	function get_category_article() {
		$result = $this->category_article_model->get_category();
	 	$category = ""; $i = 1;
	 	foreach($result as $row) {
	 		$category .= "<option value='". $row->article_category_id ."'>" . $row->title . "</option>";
	 	}

	 	return $category;
	}

	function get_by_id() {
		return 0;
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
		return "";
	}

	function filter() {
		return "";
	}

	function page_config() {
	 	$config['base_url'] = base_url() . "admin/article/page";
		$config['per_page'] = 5;
	 	$config['total_rows'] = $this->article_model->count_article();
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = true;
			
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

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
				$notif = $t['article_title'] . " has been updated successfully.";
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