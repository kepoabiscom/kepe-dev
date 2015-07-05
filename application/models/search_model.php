<?php 

class Search_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get($type='article', $q='', $start, $limit) {
        $query = $this->db->query("SELECT article_id, title, summary, created_date
                            FROM article WHERE MATCH(summary) AGAINST('". $q ."' IN BOOLEAN MODE)
                            LIMIT ". $start .", ". $limit ." 
                            
            ");
     
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
