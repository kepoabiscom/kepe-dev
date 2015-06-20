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
		$city = $this->get_region();
		$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city;
		$json = file_get_contents($jsonurl);

		$parsed_json = json_decode($json);
		$kelvin = $parsed_json->main->temp;
		$celcius = $kelvin - 273.15;
		$weather = $parsed_json->weather[0]->main;
		
		return array("city" => $city,
					"weather" => $weather,
					"celcius" => floor($celcius),
					"now" => $this->get_now()
			);
	}

	function get_now() {
		$month = array("January", "February", "March", "April", "May", "June",
					"July", "August", "September", "October", "November", "December"
			);
		$now = date("l") . ", " . date("d") . " " . $month[(int) date("m")-1] . " " . date("Y");
		return $now;
	}

	function get_region() {
		try {
			$ip = $_SERVER['REMOTE_ADDR']; echo $ip;
			$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
			return !isset($details->city) ? "Jakarta" : $details->city;
		} catch(Exception $e) {
			print_r($e);
		}
	}

	function logout() {
	   	$this->session->unset_userdata('logged_in');
	   	//session_destroy();
	   	redirect('admin/dashboard', 'refresh');
	 }

}
