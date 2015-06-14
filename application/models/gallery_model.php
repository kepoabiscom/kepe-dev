<?php 

class Gallery_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_image_list() {
    	$this->db->select("image_id, title, path")
    	->from("image")
        ->order_by("image_id", "desc");

        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}