<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_competition extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->library("parser");
	}

	function index() {
		$data = array(
					"email" => "hi@kepoabis.com"
				);
		$this->parser->parse('competition/vidcomp', $data);
	}
}
