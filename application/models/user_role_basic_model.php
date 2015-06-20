<?php 

class user_role_basic_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_user_role_basic() {
    	$this->db->select('user_role_basic_id, role_name');
        $this->db->from('user_role_basic');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
        	foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } return false;
    }
 }