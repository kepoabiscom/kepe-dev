<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('gallery_model','', true);
		//$this->load->library('form_validation');
		//$this->load->library("pagination");
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');

		    $data = array("images_list" => $this->get_list_image());
		    
		    $this->parser->parse("admin/gallery/gallery_management", $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function get_list_image() {
	 	$result = $this->gallery_model->get_image_list();
	 	$data_array = ""; $i = 1;
	 	if($result) {
	 		foreach($result as $row) {
		 		$id = $row->image_id;
	        	$data_array .= "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>";
				$data_array .= "<a targte='_blank' class='thumbnail' href='". base_url() . $row->path ."'>";
				$data_array	.= "<img class='img-responsive' src='".base_url() . $row->path ."'>";
				$data_array	.= "</a></div>";
	        	$i++;
	        }
	        return $data_array;	
	 	} else return "<strong>No Picture.</strong>";
	 }
}