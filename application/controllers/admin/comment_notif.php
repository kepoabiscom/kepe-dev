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

		     	$data = array(
		     				"success" => $this->notification()
		     			);
		     	$types = array("article", "news", "video");
		     	foreach($types as $type) {
		     		$this->comment_model->update_is_read($type);
		     	}
		     	$this->session->unset_userdata("counter_comment_notif");
		     	$t = $this->counter_comment_notif();
		     	$this->session->set_userdata("counter_comment_notif",
		     			array("counter" => $t)
		     		);

			   	$this->load->view("admin/comment/comment_list", $data);
		     
		     } else {
		     	$this->output->set_status_header('401');
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}

	function ajax_() {
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			$types = array("article", "news", "video");
			$i = 0; $json_data = '{"data" : [ ';
			foreach($types as $type) {
			   	$result = $this->comment_model->get_list_comment($type);
			   	foreach($result as $data) {
			   		$ban_id = $data->id . "-" . $type;
			   		$ban = Tb::button('Ban', array(
			            'type' => Tb::BUTTON_TYPE_LINK,
			            'onclick' => "setId('".$ban_id."')",
			            'size' => Tb::BUTTON_SIZE_SMALL,
			            'color' => Tb::BUTTON_COLOR_DANGER,
			            'url' => '#modal_confirm',
	                    'data-toggle' => 'modal'
			        ));

			        $temp = (object) array_merge((array) $data, array("no" => ($i+1), "type" => $type, "action" => $ban));
			      	if($i != 0) {
			           $json_data .= ',';
			       	}
			       	$json_data .= json_encode($temp);
			       	$i++;
			    }
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

	function banned() {
		if($this->session->userdata('logged_in')) {
			if(isset($_POST['id'])) {
				$id = $_POST['id'];	
				$ar = explode("-", $id);
	 			
	 			$this->comment_model->ban_comment($ar[0], $ar[1]);
	 			$t = array("success" => true,
	 				"f" => "ban"
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
			if($t['success'] && $t['f'] == "ban") {
				$notif = "One comment has been banned successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }

	function counter_comment_notif() {
	 	$types = array("article", "news", "video");
	 	$counter = 0;
	 	foreach($types as $type) {
	 		$counter += $this->comment_model->count_notif($type)->counter_comment_notif;
	 	}
		return $counter; 	
	}
}