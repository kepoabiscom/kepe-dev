<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library("menu");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data['get_menu'] = $this->menu->get_menu("header", "contact");
		$data['get_breadcrumb'] = $this->menu->get_menu("breadcrumb", "contact");
		
		$this->generate('contact', $data);
	}
	
	public function generate($view, $content = array())
	{
		$data['slider'] = "";
		$data['header']  = $this->parser->parse('templates/header', $content, TRUE);
		$data['content']  = $this->parser->parse($view, $content, TRUE);
		$data['footer']  = $this->parser->parse('templates/footer', $content, TRUE);
		
		$this->parser->parse('index', $data);
	}
	
}