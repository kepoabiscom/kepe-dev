<?php 

class divisi_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_divisi_list() {
    	$this->db->select('d.divisi_id, d.user_id, d.image_id, d.title, d.tag, d.summary, d.body');
		$this->db->from("divisi as d");

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query;
        } return false;
    }
	
	 function get_by_id($id) {
    	$this->db->select("d.divisi_id, d.image_id, d.user_id, d.title, d.tag, d.summary, d.body,
                            u.nama_lengkap as full_name, d.status, DATE_FORMAT(d.created_date, '%M %d, %Y %h:%i %p') as created_date, d.modified_date", false);
    	$this->db->from("divisi as d");
    	$this->db->join('user as u', 'u.user_id = d.user_id');
       	$this->db->where("divisi_id", $id);
       	$this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }
 }