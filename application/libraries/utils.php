<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/comment_notif.php'; 

class Utils extends CI_Controller {

	function __construct() {
		parent:: __construct();
	}

	function slug($str='') {
		return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($str)), '-');
	}

	function set_counter_comment_notif() {
		/* Set counter notif new comment */
		$comment_notif = new Comment_notif();
	    $t = $comment_notif->counter_comment_notif();
	    $this->session->set_userdata("counter_comment_notif",
 			array("counter" => $t)
 		);
	}
}