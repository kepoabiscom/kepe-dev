<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->model('user_model','', true);
		//$this->load->library("pagination");
	}

	/**
	 * Index Page for this controller.
	 */
	function index() {
		if($this->session->userdata('logged_in')) {
		     $session_data = $this->session->userdata('logged_in');
		     $data = array(
		     			'username' => $session_data['username'],
		     			'data_user' => $this->get_user_list()
		     		);
		     $this->parser->parse('admin/user_management', $data);
	   	} else {
		     redirect('admin/login', 'refresh');
	   	}
	 }

	 function get_user_list() {
	 	$result = $this->user_model->get_user_list();
	 	$data_array = "";
	 	foreach($result as $row) {
        	$data_array .= "<tr><td>" . $row->user_id . "</td>";
        	$data_array .= "<td>" . $row->nama_lengkap . "</td>";
        	$data_array .= "<td>" . $row->user_name . "</td>";
        	$data_array .= "<td>" . $row->user_role . "</td>";
        	$data_array .= "<td>" . $row->position . "</td>";
        	$data_array .= "<td>" . $row->created_date . "</td>";
        	$data_array .= "<td>" . $row->modified_date . "</td>";
        	$data_array .= "<td><a href='user/edit'>Edit</a>&nbsp;<a href='user/delete'>Delete</a></td></tr>";
        }

        return $data_array . "</tr>";
	 }
 
	 function add() {
	 	$this->load->view("admin/user_form");
	 }

	 function edit($id='') {
	 	return "";
	 }

	 function delete($id='') {
	 	return "";
	 }


}
