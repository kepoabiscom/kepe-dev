<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("home_model");
		$this->load->helper(array("url", "form"));
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	public function index() {
		$this->get_header_slide();
	}

	public function get_header_slide() {
		$data['slider'] = $this->home_model->get_slider();
		$this->load->view("index", $data);
	}
}
