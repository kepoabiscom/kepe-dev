<?php
	
class Stat_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}
	
	function get_stat_dashboard($type='', $month, $year) {
		$query = $this->db->query("
				SELECT count(dstat.ip_address) as stat
				FROM (select distinct ip_address, created_date FROM ".$type."_stat) as dstat
				WHERE MONTH(dstat.created_date) = $month
				AND YEAR(dstat.created_date) = $year");

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
	}
}
