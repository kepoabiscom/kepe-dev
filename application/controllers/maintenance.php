<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

class Maintenance extends CI_Controller {

	function __construct() {
		parent:: __construct();
	}

	/**
	  * Update on config/routes.php with var $is_maintenance = true
	  *
	  */
	public function index() {
		$launch_date = "2015-08-01 20:15:00";
		$d1 = new DateTime("now");
		$d2 = new DateTime($launch_date);
		$diff = $d1->diff($d2)->days;

	  	$seconds = $d2->format('U') - $d1->format('U');
	    $data = array(
	    		"seconds" => $seconds
	    	);
		$this->load->view("maintenance", $data);
	}
}
