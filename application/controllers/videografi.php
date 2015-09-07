<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'controllers/comment.php');

class Videografi extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{	
		$redirect = str_replace("videografi", "video", $_SERVER['REDIRECT_QUERY_STRING']);
		
		redirect($redirect, 'refresh');
	}
	
	function view() {
		$redirect = str_replace("videografi", "video", $_SERVER['REDIRECT_QUERY_STRING']);
		$redirect = str_replace("view", "watch", $redirect);
		
		redirect($redirect, 'refresh');
	}
	
	function page() {
		$redirect = str_replace("videografi", "video", $_SERVER['REDIRECT_QUERY_STRING']);
		
		redirect($redirect, 'refresh');
	}
}