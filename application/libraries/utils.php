<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/comment_notif.php';
require_once APPPATH . 'controllers/admin/inbox_message.php'; 

class Utils {

	private static $ins;

	public function __construct() {
		$this->ins =& get_instance();
	}

	function slug($str='') {
		return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($str)), '-');
	}

	function set_counter_comment_notif() {
		/* Set counter notif new comment */
		$comment_notif = new Comment_notif();
	    $t = $comment_notif->counter_comment_notif();
	    $this->ins->session->set_userdata("counter_comment_notif",
 			array("counter" => $t)
 		);
	}

	function set_counter_new_message() {
		$obj = new Inbox_message();
		$count_new_message = $obj->count_new_message();
	    $this->ins->session->set_userdata("counter_new_message",
 			array("counter" => $count_new_message)
 		);
	}
}