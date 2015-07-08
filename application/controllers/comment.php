<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model("comment_model");
		$this->load->helper(array("url", "form"));
		//$this->load->library("menu");
		$this->load->library("parser");
	}
	
	public function index() {
		return 0;
	}

	function ajax_() {
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$d = $this->input->post(null, true);
			if(!empty($d['nick_name']) && !empty($d['body'])) { 
				//if($this->get_result_captcha($d['n1'], $d['op'], $d['n2']) == $d['answer']) {
					//unset($d['n1']); unset($d['n2']); unset($d['op']); unset($d['answer']);
				$type = $d['type']; unset($d['type']);
				$this->comment_model->post_comment($type, $d);
				if($type == "news")
					$id = $d['news_id'];
				if($type == "article")
					$id = $d['article_id'];
				if($type == "video")
					$id = $d['video_id'];

				$status = array('status' => true, 
		  					'msg' => 'Success',
		  					'get_comment' => $this->get_comment($type, $id, 1)
		  			);	
				/*} else {

					$status = array('status' => false, 
			  					'msg' => 'Invalid captcha.',
			  					'result' => $d['answer']
			  			);	
				}*/
				
			} else {
				$status = array('status' => false, 
			  					'msg' => 'Nick name and your comment is required.'
			  			);
			}
		} else {
			$status = array('status' => false, 
		  					'msg' => 'Comment not sent.'
		  			);
		}

		echo json_encode($status);
	}

	function get_comment($type='', $id='', $f=0) {
		$result = $this->comment_model->get_comment($type, $id, $f);

		if($result == false) {
			return "";
		} else {
			$data = "";
			foreach($result as $row) {
				$date = explode(" ", $row->created_date);
				$y = explode("-", $date[0]);
				$m = explode("-", $date[0]);
				$d = explode("-", $date[0]);

				$data .= "<p><strong>Date : </strong>" . $row->created_date . "</p>";
				$data .= "<p><strong>Nick Name : </strong>" . $row->nick_name . "</p>";
				$data .= "<p><strong>Comments : </strong>" . $row->body . "</p><br>";				
			}
		}
		return $data;
	}

	function random_set_captcha($op=1) {
		$n = rand(100, 999);
		if($op == 0) return $n;
		else {
			$op = rand(1, 3);
			switch($op) {
				case 1: return "+";
				case 2: return "-";
				case 3: return "*";
			}
		}
	}

	function get_result_captcha($n1, $op, $n2) {
		switch($op) {
			case $op == '+': return $n1 + $n2;
			case $op == '-': return $n1 - $n2;
			case $op == '*': return $n1 * $n2;
		}
	}


}
