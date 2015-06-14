<?php 

class category_video_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_category() {
    	$this->db->select('video_category_id, title');
        $this->db->from('video_category');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
        	foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } return false;
    }
 }