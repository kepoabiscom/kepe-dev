<?php 

class Sitemap_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

	function get_url_sitemap($type='') {
        $query = $this->db->select($type."_id, title, created_date")
        		->from($type)
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
 }