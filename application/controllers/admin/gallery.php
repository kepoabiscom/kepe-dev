<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/utils.php'; 

class Gallery extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('image_model','', true);
		//$this->load->library('form_validation');
		//$this->load->library("pagination");

		$this->utils = new Utils();
	}

	function index() {
		$this->utils->set_counter_comment_notif();
 		
		if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');

		    $data = array("images_list" => $this->get_list_image("behindscene", 0),
		    			"notif" => $this->notification()
		    		);
		    
		    $this->parser->parse("admin/gallery/gallery_management", $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function get_list_image($type, $x) {
	 	$result = $this->image_model->get_bts($type, $x);
	 	$data_array = ""; $i = 1;
	 	if($result) {
	 		foreach($result as $row) {
		 		$id = $row->image_id;
	        	$data_array .= "<div class='col-lg-2 col-md-2 col-xs-2 thumb'>";
				$data_array	.= "<a href='". base_url() ."admin/gallery/delete/".$id."' onclick='return ConfirmDelete();'><span class='close'>&times;</span></a>";
				$data_array	.= "<img class='img-responsive' src='".base_url() . "assets/img/bts/". $row->path ."'>";
				$data_array	.= "</div>";
	        	$i++;
	        }
	        return $data_array;	
	 	} else return "";
	 }

	function conf_upload(){
		$config['upload_path'] = "./assets/img/bts/";
		$config['allowed_types'] = "jpg|gif|png|jpeg";
		$config['max_size']	= '2000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1768';
		$config['encrypt_name'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	function upload(){
		$this->conf_upload();
		if(!$this->upload->do_upload("upload_img")){ 
			$status = array('status' => false, 
							'msg' => $this->upload->display_errors()
					);
		} else{
		 	$f = $this->upload->data();
		 	$data = array("title" => "Behind the Sceen",
		 			"tag" => "kepo, abis, kepo abis, di belakang layar, behind, scene",
		 			"body" => "Behind the Scene",
		 			"type" => "behindscene",
		 			"size" => $f['file_size'],
		 			"path" => $f['file_name']
		 		);
		 	$this->image_model->insert_image($data);
		 	@chmod($f['full_path'], 0777);
		 	$user = (ENVIRONMENT == 'development') ? 'hermanwahyudi' : 'kepe3788';
		 	@chown($f['full_path'], $user);
		  	$status = array('status' => true, 
		  					'msg' => 'Image uploaded.',
		  					"get_img" => $this->get_list_image("behindscene", 1)
		  			);
		} 
		echo(json_encode($status));
	}

	function delete($id='') {
		if($this->session->userdata('logged_in')) {
	 		$r = $this->image_model->get_by_id($id);
	 		$full_path = base_url() . "assets/img/bts/" . $r->path;
			
			$x = explode("//", $full_path);
			
			$y = explode("/", $x[1]);
			
			$z = array();
			
			for($i=0; $i < count($y); $i++){
				if($i > 0){
					$z[] = $y[$i];
				}
			}
			
			$path = implode("/", $z);
			
			$path = $_SERVER['DOCUMENT_ROOT'] . "/" . $path;
			
			if(! @unlink($path)){
				die ("Error deleting $path");
			} else{
				$this->image_model->delete_image($id);
			}
			
	 		$t = array("success" => true,
	 				"f" => "delete"
	 			);
	 		$this->session->set_userdata("t", $t);
	 		redirect('admin/gallery');
	 	} else {
	 		redirect('admin/login', 'refresh');
	 	}
	}

	function notification() {
	 	$notif = ""; $s = "";
	 	if($this->session->userdata("t")) {
			$t = $this->session->userdata("t");
			if($t['success'] && $t['f'] == "delete") {
				$notif = "One image has been deleted successfully.";
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