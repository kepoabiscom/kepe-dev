<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     $data['username'] = $session_data['username'];
		     $this->load->view('admin/dashboard', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }
 
	 function logout() {
	   	$this->session->unset_userdata('logged_in');
	   	session_destroy();
	   	redirect('admin/dashboard', 'refresh');
	 }

}
