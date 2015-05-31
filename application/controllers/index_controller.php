<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index() {
		$this->load->view('home');
	}
}
