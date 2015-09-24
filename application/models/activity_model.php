<?php 

class Activity_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function create_activity($data) {
    	$this->db->insert('activity_history', $data);
    }

    function get_last_activity($activity) {
    	$query = $this->db->select("user_name, ip_address")
    				->from("activity_history ah")
    				->join("user u", "u.user_id = ah.user_id")
    				->where("activity", $activity)
    				->order_by("activity_id", "desc")
    				->limit(1)
    				->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function get_list_activity_history() {
        $query = $this->db->select("user_name, user_agent, ip_address, activity, created_time")
                    ->from("activity_history ah")
                    ->join("user u", "u.user_id = ah.user_id")
                    ->order_by("activity_id", "desc")
                    ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}