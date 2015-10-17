<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/utils.php';

define("API_KEY_WEATHER", "63af5a8f9383ad2bf890c6a938273148");

class Dashboard extends CI_Controller {

	private $utils;
	
	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('stat_model','', true);
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		$this->utils = new Utils();
		$this->utils->set_counter_comment_notif();
		$this->utils->set_counter_new_message();
		
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
		$api = "http://api.openweathermap.org/data/2.5/weather?q=" . $city ."&APPID=". API_KEY_WEATHER;
		$json = file_get_contents($api);

		$parsed_json = json_decode($json);
		$kelvin = $parsed_json->main->temp;
		$celcius = $kelvin - 273.15;
		$weather = $parsed_json->weather[0]->main;
		$celcius = ceil($celcius);
		$color = "primary";
		if($celcius >= 34) {
			$color = "red";
		}else if($celcius >= 30 && $celcius < 34) {
			$color = "green";
		} 
		
		return array("city" => $city,
					"weather" => $weather,
					"celcius" => $celcius,
					"now" => $this->get_now(),
					"color" => $color
			);
	}

	function get_now() {
		$month = array("Jan", "Feb", "March", "April", "May", "June",
					"July", "August", "Sept", "Oct", "Nov", "Dec"
			);
		$now = date("l") . ", " . date("d") . " " . $month[(int) date("m")-1] . " " . date("Y");
		return $now;
	}

	function get_region() {
		try {
			$ip = $_SERVER['REMOTE_ADDR'];
			$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
			return !isset($details->city) ? "Jakarta" : $details->city;
		} catch(Exception $e) {
			print_r($e);
		}
	}

	function get_stat($year) {		
		$stat = array("Home" => $this->get_data("home", $year),
					"Article" => $this->get_data("article", $year),
					"News" => $this->get_data("news", $year),
					"Videografi" => $this->get_data("video", $year)
			);
		echo json_encode($stat);
	}

	function get_data($type='', $year) {
		$month = array(
					array()
				);
		$length_month = 12;
		for($i = 1; $i <= $length_month; $i++) {
			if($type == "home") {
				$month[$type][$i] = 0;
			} else {
				$row = $this->stat_model->get_stat_dashboard($type, $i, $year);
				$month[$type][$i] = (int) $row->stat;
			}
		}

		return array(
			array("label" => "January", "y" => $month[$type][1]),
			array("label" => "February", "y" => $month[$type][2]),
			array("label" => "March", "y" => $month[$type][3]),
			array("label" => "April", "y" => $month[$type][4]),
			array("label" => "May", "y" => $month[$type][5]),
			array("label" => "June", "y" => $month[$type][6]),
			array("label" => "July", "y" => $month[$type][7]),
			array("label" => "August", "y" => $month[$type][8]),
			array("label" => "September", "y" => $month[$type][9]),
			array("label" => "October", "y" => $month[$type][10]),
			array("label" => "November", "y" => $month[$type][11]),
			array("label" => "December", "y" => $month[$type][12])
		);
	}

	function logout() {
	   	$this->session->unset_userdata('logged_in');
	   	//session_destroy();
	   	redirect('admin/dashboard', 'refresh');
	 }

}
