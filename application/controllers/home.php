<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("home_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
	}

	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$this->generate('home');
	}
	
	public function generate($view, $content = array())
	{
		$data['header']  = $this->parser->parse('header', array(), TRUE);
		$data['slider']  = $this->parser->parse('slider', array(), TRUE);
		$data['content']  = $this->parser->parse($view, $content, TRUE);
		$data['footer']  = $this->parser->parse('footer', array(), TRUE);
		
		$this->parser->parse('index', $data);
	}
}
