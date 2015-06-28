<?php
	
class Archives_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}
	
	function get_archives_list($table){
		$q = "
			SELECT 
				DATE_FORMAT(created_date, '%M') AS month
				,DATE_FORMAT(created_date, '%Y') AS year
				,COUNT(1) AS total 
			FROM 
				".$table." 
			GROUP BY DATE_FORMAT(created_date, '%M'), DATE_FORMAT(created_date, '%Y')
			ORDER BY DATE_FORMAT(created_date, '%m'), DATE_FORMAT(created_date, '%Y')
		";
		
		$query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
}
