<?php 

class Search_model extends CI_Model {
    
    var $count_search = 0;

    function __construct() {
        parent:: __construct();
    }

    function get($type='article', $q='', $start=0, $limit=0) {
        $t = ($type != 'video') ? 'summary' : 'description'; 

        $this->db->select($type . "." . $type . "_id, " . $type . ".title, " . $type . ".status, ". $type . ".". $t .", " . $type . ".created_date, COUNT(" . $type . "." .$type. "_id) as stat")
                    ->from($type)
                    ->where("MATCH(title) AGAINST('". $q ."' IN BOOLEAN MODE)")
                    ->or_where("MATCH(". $t .") AGAINST('". $q ."' IN BOOLEAN MODE)")
					->join($type.'_stat as vstat', 'vstat.' . $type . '_id = ' . $type . '.' . $type . '_id', 'left')
					->group_by($type . "." . $type . "_id")
                    ->order_by("stat", "desc");
        $query = ($limit != 0) ? $this->db->limit($limit, $start)->get() : $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            $this->count_search = count($data);
            return array("data" => $data, "count" => count($data));
        }

        return false;
    }

    function count_search() {
		
        return $this->count_search;
    }

}

?>
