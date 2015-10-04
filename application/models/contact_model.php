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

    function total_message() {
    	return $this->db->count_all("contact");
    }

    function get_all_message() {
    	$query = $this->db->select("contact_id, from_name, email, subject, message, ip_address, created_time")
        		->from("contact")
        		->get();      

        if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

    function delete_message($id) {
        return $this->db->delete("contact", array("contact_id" => $id));
    }

    function count_notif() {
        $query = $this->db->select("count(1) as counter_new_message")
                ->from("contact")
                ->where("is_read", "0")
                ->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function update_has_read() {
        $data['is_read'] = '1';
        $this->db->update("contact", $data); 
    }
}