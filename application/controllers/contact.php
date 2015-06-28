<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data['get_menu'] = $this->get_menu();
		
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
	
		public function get_menu(){
		$data['menu'] = array(
			"home" => base_url('home'),
			"news" => base_url('news'),
			"article" => base_url('article'),
			"videografi" => base_url('videografi'),
			"contact" => base_url('contact'),
			"membershipform" => '#',
			"membership" => '#',
			"organization" => '#',
			"history" => '#'
		);
		
		return $data;
	}
}