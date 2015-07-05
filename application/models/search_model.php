<?php 

class Search_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get($type='article', $q='', $start, $limit) {
        $t = ($type != 'video') ? 'summary' : 'description'; 

        $query = $this->db->select($type."_id, title, ". $t .", created_date")
                        ->from($type)
                        ->where("MATCH(title) AGAINST('". $q ."' IN BOOLEAN MODE)")
                        ->or_where("MATCH(". $t .") AGAINST('". $q ."' IN BOOLEAN MODE)")
                        ->limit($limit, $start)->get();
		
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
