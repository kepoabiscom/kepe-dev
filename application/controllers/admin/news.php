<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('news_model','', true);
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     $data = array(
		     			'username' => $session_data['username'],
		     		);
		     //$this->parser->parse('admin/content/news/news_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }
}