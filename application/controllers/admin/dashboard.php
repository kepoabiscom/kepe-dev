<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		//$this->load->helper(array("url", "form"));
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	public function index() {
		$this->load->view('admin/login');
	}

}
