<?php 

class Search_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get($type='article', $q='', $start, $limit) {
    	$query = $this->db->select("a.article_id, a.title, a.summary, a.created_date")
        		->from("article as a")
            	->like("a.title", $q)
        		->limit($limit, $start)
            	->order_by("a.article_id", "desc")->get();
     
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

}

?>
