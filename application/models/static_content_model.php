<?php 

class Static_content_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_list_static_content() {
		$query = $this->db->select("*")
    		->from("static_content")
			->where("status", "published")
    		->get();

    	if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }
	
	function get_by_id($id) {
    	$query = $this->db->select("*")
    		->from("static_content")
			->where("status", "published")
			->where("static_content_id", $id)
			->limit(1)
			->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }
}

?>