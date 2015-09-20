<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_competition extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url"));
		$this->load->library("parser");
	}

	public function index() {
		$data = array(
					"email" => "hi@kepoabis.com",
					"facebook" => "facebook.com/kepoabiscom",
					"twitter" => "twitter.com/kepoabiscom"
				);
		$this->parser->parse('competition/vidcomp', $data);
	}
}
