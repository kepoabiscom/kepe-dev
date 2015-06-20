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
		     $data = $this->get_api_weather(); 

		     $this->parser->parse('admin/dashboard', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}
 	
	function get_api_weather() {
		$city = "Jakarta";
		$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city;
		$json = file_get_contents($jsonurl);

		$parsed_json = json_decode($json);
		$kelvin = $parsed_json->main->temp;
		$celcius = $kelvin - 273.15;
		$weather = $parsed_json->weather[0]->main;
		$month = array("January", "February", "March", "April", "May", "June",
					"July", "August", "September", "October", "November", "December"
			);
		$now = date("l") . ", " . date("d") . " " . $month[(int) date("m")-1] . " " . date("Y");
		return array("city" => $city,
					"weather" => $weather,
					"celcius" => floor($celcius),
					"now" => $now
			);
	}

	function logout() {
	   	$this->session->unset_userdata('logged_in');
	   	//session_destroy();
	   	redirect('admin/dashboard', 'refresh');
	 }

}
