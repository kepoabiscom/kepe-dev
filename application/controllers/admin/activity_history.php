<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH . 'libraries/utils.php';

class Activity_history extends CI_Controller {

	private $utils;

	function __construct() {
		parent:: __construct();
		$this->load->model("activity_model", "", true);
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
		     	$this->utils = new Utils();
				$this->utils->set_counter_comment_notif();
				$this->utils->set_counter_new_message();
				
			   	$this->load->view("admin/activity/activity_history_list");
		     } else {
		     	$this->output->set_status_header('401');
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}

	function set_activity($user_id, $activity='') {
		$q = $this->activity_model->get_last_activity($activity);

		$this->session->set_userdata('last_login', 
				array(
					"username" => $q->user_name,
					"ip_address" => $q->ip_address
				)
			);

		$data = array(
			'user_id' => $user_id,
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'activity' => $activity,
			'created_time' => date("Y-m-d H:i:s")
		);
		$this->activity_model->create_activity($data);
	}

	function ajax_() {
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$i = 0; $json_data = '{"data" : [ ';
		   	$result = $this->activity_model->get_list_activity_history();
		   	foreach($result as $data) {

		        $temp = (object) array_merge((array) $data, array("no" => ($i+1)));
		      	if($i != 0) {
		           $json_data .= ',';
		       	}
		       	$json_data .= json_encode($temp);
		       	$i++;
		    }
		    $json_data .= ']}';
		    echo $json_data;
		} else {
			$data = array(
					"status" => false,
					"error_message" => "Ajax request isn't required!"
				);
		    echo json_encode($data);
		}
	}
}