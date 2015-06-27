<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	function __construct() {
		parent:: __construct();
	}

	/**
	  * Update on config/routes.php with var $is_maintenance = true
	  *
	  */
	public function index() {
		$this->load->view("maintenance");
	}
}
