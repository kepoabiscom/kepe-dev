<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     $data = array(
		     			'username' => $session_data['username']
		     		);
		     $this->parser->parse('admin/dashboard', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}
 	
	function get_api_weather() {
		$api_weather = "http://api.openweathermap.org/data/2.5/find?q=Jakarta";
		$json_string = file_get_contents($api_weather);
		$parsed_json = json_decode($json_string);

		echo $parsed_json->{'list'}[0]->{'name'};

	}

	function logout() {
	   	$this->session->unset_userdata('logged_in');
	   	//session_destroy();
	   	redirect('admin/dashboard', 'refresh');
	 }

}
