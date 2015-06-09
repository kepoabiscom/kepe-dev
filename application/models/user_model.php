<?php

class User_model extends CI_Model {
    
    // Instance
    var $user_id = "";
    var $nama_lengkap = "";
    var $user_name = "";
    var $password = "";
    var $user_role = "";
    var $email = "";
    var $position = "";
    var $body = "";
    var $image = "";
    var $created_date = "";
    var $modified_date = "";
    var $deleted_date = "";
    var $data = array();

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

    function create_user($data) {
        $data = array("user_name" => $data['username'],
                    "password" => md5($data['password']),
                    "email" => $data['email'],
                    "nama_lengkap" => $data['nama_lengkap'],
                    "user_role" => $data['role'],
                    "position" => $data['position'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s")
                    //"image" => $data['image']
                );
        $this->db->insert('user', $data);
    }

    function update_user($id, $data){

    }

    function get_by_id($id) {
        $this->db->select('user_id, user_role, user_name, nama_lengkap, email, position, body, created_date, modified_date');
        $this->db->from('user');
        $this->db->where("user_id", $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function delete_user($id) {
        $this->db->delete("user", array("user_id" => $id));
    }
}
