<?php
	
class Stat_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}
	
	function get_stat_dashboard($type='', $month, $year) {
		$query = $this->db->query("
				SELECT count(dstat.ip_address) as stat
				FROM ".$type."_stat, (select distinct ip_address FROM ".$type."_stat) as dstat
				WHERE MONTH(created_date) = $month
				AND YEAR(created_date) = $year");

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
	}
}
