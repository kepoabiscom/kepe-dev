<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/utils.php';

define("AJAX_REQUEST", isset($_SERVER['HTTP_X_REQUESTED_WITH']));

class Inbox_message extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library('Datatables');
		$this->load->model("contact_model", "", true);
	}

	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     $this->utils = new Utils();
			 $this->utils->set_counter_comment_notif();
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
		     	$data = array(
		     				"success" => $this->notification()
		     			);
		     	$this->contact_model->update_has_read();
		     	$this->session->unset_userdata("counter_new_message");
		     	$count = $this->contact_model->count_notif()->counter_new_message;
		     	$this->session->set_userdata("counter_new_message",
		     				array("counter" => $count)
		     			);

		     	$this->load->view("admin/inbox/message_list", $data);
		     } else {
		     	$this->output->set_status_header('401');
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}

	function get_list_message() {
		if(AJAX_REQUEST) {
			$i = 0; $json_data = '{"data" : [ ';
		   	$result = $this->contact_model->get_all_message();
		   	foreach($result as $data) {
		   		$id = $data->contact_id;
		   		$read = Tb::button('Detail', array(
                    'type' => Tb::BUTTON_TYPE_LINK,
                    'onclick' => "detailMessage(". $data->from_name . ",". $data->subject . "," . $data->created_time.")",
                    'size' => Tb::BUTTON_SIZE_SMALL,
                    'color' => Tb::BUTTON_COLOR_PRIMARY,
                    'url' => '#modal_read',
	                'data-toggle' => 'modal'
                ));
		   		$delete = Tb::button('Delete', array(
		            'type' => Tb::BUTTON_TYPE_LINK,
		            'onclick' => "setId(".$id.")",
		            'size' => Tb::BUTTON_SIZE_SMALL,
		            'color' => Tb::BUTTON_COLOR_DANGER,
		            'url' => '#modal_confirm',
	                'data-toggle' => 'modal'
		        ));

		        $temp = (object) array_merge((array) $data, array("no" => ($i+1), "action" => $read . " " .$delete));
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

	function count_new_message() {
		return $this->contact_model->count_notif()->counter_new_message;
	}

	function delete() {
		if($this->session->userdata('logged_in')) {
			if(isset($_POST['id'])) {
				$id = $_POST['id'];	
	 			$this->contact_model->delete_message($id);
	 			$t = array("success" => true,
	 				"f" => "delete_message"
	 			);
	 			$this->session->set_userdata("t", $t);
	 		}	
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}

	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete_message") {
				$notif = "One message has been deleted successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }
}