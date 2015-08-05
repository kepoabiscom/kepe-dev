<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_notif extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library('Datatables');
		$this->load->model('comment_model','', true);
		$this->load->library("pagination");
		$this->load->library('form_validation');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {

			   $this->load->view("admin/comment/comment_list");
		     
		     } else {
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}

	function ajax_() {
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$type = "article";

		   	$result = $this->comment_model->get_list_comment($type);
		   	$jsonResult = '{"data" : [ ';
		   	$i=0;
		   	foreach($result as $data) {
		   		$temp = (object) array_merge((array) $data, array("type" => $type));
		      	if($i != 0){
		           $jsonResult .=',';
		       	}
		       	$jsonResult .=json_encode($temp);
		       	$i++;
		    }
		    $jsonResult .= ']}';
		    echo $jsonResult;
		} else {
			$data = array(
					"status" => false,
					"error_message" => "Error"
				);
		    echo json_encode($data);
		}
	}
}