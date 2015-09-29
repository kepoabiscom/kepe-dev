<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "../facebook-sdk/facebook.php";

date_default_timezone_set("Asia/Jakarta");

class Comment extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model("comment_model");
		$this->load->helper(array("url", "form"));
		//$this->load->library("menu");
		$this->load->library("parser");
	}
	
	public function index() {
		include("./././facebook-sdk/config.php");
	}

	function ajax_() {
		$data_fb = $this->get_user_data_facebook();

		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$d = $this->input->post(null, true);
			$n1 = $this->random_set_captcha(0);
			$op = $this->random_set_captcha();
			$n2 = $this->random_set_captcha(0);
			if($data_fb['is_active']) {
				if(!empty($d['nick_name']) && !empty($d['body'])) { 
					if($this->get_result_captcha($d['n1'], $d['op'], $d['n2']) == $d['answer']) {
						unset($d['n1']); unset($d['n2']); unset($d['op']); unset($d['answer']);
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
				  					'get_comment' => $this->get_comment($type, $id, 1),
				  					'n1' => $n1,
				  					'op' => $op,
				  					'n2' => $n2
			  			);	
					} else {
						$status = array('status' => false, 
				  					'msg' => 'Your answer is incorrect!',
				  					'result' => $d['answer'],
				  					'n1' => $n1,
				  					'op' => $op,
				  					'n2' => $n2
				  			);	
					}			
				} else {
					$status = array('status' => false, 
				  					'msg' => 'Nick name and your comment is required!',
				  					'n1' => $n1,
				  					'op' => $op,
				  					'n2' => $n2
				  			);
				}
			} else {
				$status = array('status' => false, 
	  					'msg' => $data_fb['is_active'],
	  					'n1' => $n1,
	  					'op' => $op,
	  					'n2' => $n2
	  			);
			}
		} else {
			$status = array('status' => false, 
		  					'msg' => 'Ajax request isnt authorized .'
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

				$data .= "<div class='new-comment'><img style='margin-bottom: 10px;' class=''img-responsive' src='http://www.gravatar.com/avatar/' width='68' height='68' />";
				$data .= "<p>" . $this->get_time_elapsed_string($row->created_date) . " - " .date("d F Y", strtotime($date[0])) . "";
				$data .= ",&nbsp;";
				$data .= "Posted By " . $row->nick_name . "</p>";
				$data .= "<p>" . $row->body . "</p></div><br>";				
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

	function get_time_elapsed_string($datetime, $full=false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d/7);
	    $diff->d -= $diff->w*7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach($string as $k => &$v) {
	        if($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? "<em>" . implode(', ', $string) . " ago</em>" : "<em>Just now</em>";
	}

	function get_user_data_facebook() {
		$facebook = new Facebook(array(
	        'appId'  => '876274572459160',
	        'secret' => 'c44768470ff9f9d7a52784f6f5fbfd9a',
	        'cookie' => true,
	        'domain' => base_url()
      	));
      	Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
      	Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
      	$is_active = $facebook->getUser();
		$user_profile = ""; $lUrl = "";

		if($is_active) {
			try {
				$user_profile = $facebook->api('/me');
			} catch (FacebookApiException $e) {
				error_log($e);
				$is_active = null;
			}
		}

		if($is_active) {
			$lUrl = $facebook->getLogoutUrl();
		} else {
			$lUrl = $facebook->getLoginUrl();
		}

		return array(
				"session_data_fb" => $user_profile,
				"is_active" => $is_active,
				"login_fb_url" => $lUrl
			);
	}

}
