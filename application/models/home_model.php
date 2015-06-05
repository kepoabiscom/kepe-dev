<?php
	
class home_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}

	function get_slider() {
		return $this->db->query("select image_id, path from image limit 0, 4");
	}
}
