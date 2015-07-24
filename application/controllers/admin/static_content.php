<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Static_content extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('static_content_model','', true);
		$this->load->library('form_validation');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
			 $success = ""; //$this->notification();
			 
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
			     $data = array(
					'data_static_content' => $this->get_list_static_content(),
					'success' => $success,
					'link' => ""
			     );
	
			     $this->parser->parse('admin/content/static_content/static_content_management', $data);
		     } else {
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
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
	        	$data_array .= "<td><a href='". base_url()."admin/static_content/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/static_content/update/".$id."'>Edit</a></tr>";
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
}