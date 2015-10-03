<?php 

date_default_timezone_set("Asia/Jakarta");

class Contact_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function insert_message($data) {
    	$data["created_time"] = date("Y-m-d H:i:s");
        $data["updated_time"] = date("Y-m-d H:i:s");

    	$this->db->insert("contact", $data);
    }

}