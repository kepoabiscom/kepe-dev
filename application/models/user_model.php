<?php

class User_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function login($username, $password) {
        $this->db->select('user_id, user_role, user_name, password');
        $this->db->from('user');
        $this->db->where('user_name', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    function get_user_list() {
        $this->db->select('user_id, user_role, user_name, nama_lengkap, email, position, body, created_date, modified_date');
        $this->db->from('user');
        $this->db->limit(10);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        } return;
    }
}
