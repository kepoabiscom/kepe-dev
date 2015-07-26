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
		$launch_date = "2015-08-01T00:00:00+07:00"; 
		$now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
	    $future = new DateTime($launch_date);
	    $diff = $now->diff($future);

	  	$seconds = ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s; 
	    $data = array(
	    		"seconds" => $seconds
	    	);
		
		$this->load->view("maintenance", $data);
	}
}
