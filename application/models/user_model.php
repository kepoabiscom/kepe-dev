<?php

class User_model extends CI_Model {

  function __construct() {
      parent:: __construct();
  }

  function login($username, $password) {
      $this->db->select('user_id, user_name, password');
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
}
