<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "about.php";

define("AJAX_REQUEST", isset($_SERVER['HTTP_X_REQUESTED_WITH']));

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model("contact_model");
		$this->load->library("parser");
		$this->load->library("menu");
		$this->load->library('email');
		$this->load->library('form_validation');
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index() {
		$data = array_merge(
			array(
				'get_menu' => $this->menu->get_menu("header", "contact"),
				'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "contact"),
				'sending_message' => base_url('contact'),
				"title" => 'Contact Us'
			),
			$this->profile()->get_about_detail()
		);

		$data['author'] = 'Administrator';
		$data['url'] = base_url('contact');
		$data['meta_tag'] = "Kepo ".$data['title'].", kepoabis, Kepo Abis, Kepo, Abis, ".$data['site_name'].", ".$data['tagline'];
		$data['meta_description'] = strip_tags($data['contact_footer']);
		$data['og_image'] = base_url('assets/img/'.$data['logo_name']);
		
		$this->generate('contact', $data);
	}

	function send_message() {
		if(AJAX_REQUEST) {
			$data = $this->input->post(null, true);
			if(empty($data['from_name']) || empty($data['email']) || empty($data['subject']) || empty($data['message'])) {
				$status = array(
						"status" => false,
						"msg" => "All fields is required."
					);
			} else {
				if($this->validate_email($data['email'])) {
					$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$this->contact_model->insert_message($data);
					$status = array(
							"status" => true,
							"msg" => "Your message have been sent successfully."
						);	
				} else {
					$status = array(
							"status" => false,
							"msg" => "Invalid email format."
						);
				}
			}
			
		} else {
			$status = array(
						"status" => false,
						"msg" => "Ajax request isn't authorized."
					);
		}

		echo json_encode($status);
	}
	
	public function generate($view, $content = array()) {
		$data = array(
			'slider' => $this->menu->get_page_title($content['title']),
			'map' => NULL,
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}
	
	public function profile() {
		return $obj = new about();
	}

	function validate_email($email) {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		return true;
	}
}