<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model("comment_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("menu");
		$this->load->library("parser");
	}
	
	public function index() {
		return 0;
	}

	function ajax_news() {
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$d = $this->input->post(null, true);
			$this->comment_model->post_comment('news', $d);

			$status = array('status' => true, 
		  					'msg' => 'Success',
		  					'get_comment' => $this->get_comment("news", $d['news_id'], 1)
		  			);
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
}

?>	