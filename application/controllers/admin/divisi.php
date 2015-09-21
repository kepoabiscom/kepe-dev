<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/comment_notif.php'; 

class Divisi extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('divisi_model','', true);
		$this->load->library('form_validation');
	}

	function index() {
		/* Set counter notif new comment */
		$comment_notif = new Comment_notif();
	    $t = $comment_notif->counter_comment_notif();
	    $this->session->set_userdata("counter_comment_notif",
 			array("counter" => $t)
 		);
 		
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
			 $success = $this->notification();
			 
		     if($session_data['role'] == 'superadmin' || $session_data['role'] == 'admin') {
			     $data = array(
					'data_divisi' => $this->get_list_divisi(),
					'success' => $success,
					'link' => ""
			     );
	
			     $this->parser->parse('admin/content/divisi/divisi_management', $data);
		     } else {
		     	print_r("<h1>Authorization required.</h1>");
		     }
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	}
	
	function validation() {
	 	$this->form_validation->set_error_delimiters("<div style='color:red'>", "</div>");
	 	$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	 	$this->form_validation->set_rules('tag', 'Tag', 'required|xss_clean');
	 	$this->form_validation->set_rules('summary', 'Summary', 'required|xss_clean');  
	 	//$this->form_validation->set_rules('body', 'Body', 'required|xss_clean');  
	 }
	 
	function get_list_divisi(){
		$result = $this->divisi_model->get_list_divisi();
		
	 	$data_array = ""; $i = 1;

	 	if($result) {
	 		foreach($result as $row) {				
		 		$id = $row->divisi_id;
	        	$data_array .= "<tr><td>" . $i . "</td>";
	        	$data_array .= "<td>" . $row->title . "</td>";
	        	$data_array .= "<td>" . $row->tag . "</td>";
	        	$data_array .= "<td>" . $row->status . "</td>";
	        	$data_array .= "<td>" . $row->created_date . "</td>";
	        	$data_array .= "<td>" . $row->modified_date . "</td>";
	        	$data_array .= "<td><a href='". base_url()."admin/divisi/detail/".$id."'>Detail</a>&nbsp;<a href='". base_url()."admin/divisi/update/".$id."'>Edit</a></tr>";
	        	$i++;
	        }
	        return $data_array . "</tr>";
	 	} else return "";
	}
	
	function detail($id='') {
		if($this->session->userdata('logged_in')) {
	 		$q = $this->divisi_model->get_by_id($id);
	 		$data = array("title" => $q->title,
		 				"tag" => $q->tag,
		 				"summary" => $q->summary,
		 				"body" => $q->body,
		 				"status" => $q->status,
		 				"created_date" => $q->created_date,
		 				"modified_date" => $q->modified_date
		     		);
	 		$this->parser->parse('admin/content/divisi/detail_divisi', $data);
	 	} else {
	 		direct('admin/login', 'refresh');
	 	}
	}
	
	function get_status($t=1, $s='') {
		$status = $this->divisi_model->get_enum_status();
		print_r($status);		
	}
	
	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = $t['static_content_title'] . " has been deleted successfully.";
			} else if($t['success'] && $t['f'] == 'update') {
				$notif = $t['title_static_content'] . " has been updated successfully.";
			} 
			$s = "<div class='alert alert-success fade in'>
                    <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                    <strong></strong> ". $notif ."
              </div>";
		}
		$this->session->unset_userdata("t");
        return $s;
	 }
	 
	 function update($id='') {
		if($this->session->userdata('logged_in')) {
	        $this->validation();

	        if($this->form_validation->run() == true) {
	        	$e = "";

			 	if(isset($_POST['submit'])) {
			 		$d = $this->input->post(null, true);
					unset($d['submit']);
					
					$this->divisi_model->update_divisi($d['divisi_id'], $d);
					$t = array("success" => true,
							"title_divisi" => $d['title'],
							"f" => "update"
						);
					 $this->session->set_userdata("t", $t);
					 redirect('admin/divisi');
			 	}
		 	} else {
		 		$r = $this->divisi_model->get_by_id($id);
		 		$e = $this->session->userdata("error_message") ? $this->session->userdata("error_message") : array("error_message" => "");
				$data = array("divisi_id" => $r->divisi_id,
						"title" => $r->title,
		 				"tag" => $r->tag,
		 				"summary" => $r->summary,
		 				"body" => $r->body,
		 				"status" => $r->status,
		 				"created_date" => $r->created_date,
		 				"modified_date" => $r->modified_date,
						"flag" => "update",
		 				"error_message" => $e['error_message']
		     		);
		 		$this->session->unset_userdata("error_message");
		 		$this->load->view('admin/content/divisi/update_divisi', $data);
		 	}
		} else {
			redirect('admin/login', 'refresh');
		}
	 }
}