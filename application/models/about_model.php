<?php 

class About_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_detail() {
        $this->db->select('setting_id, title, logo, contact_address, contact_telphone_1, contact_telphone_2,
						contact_fax, contact_email_1, contact_email_2, contact_lat, contact_long, contact_facebook, contact_twitter, contact_googleplus, footer');
        $this->db->from('setting');
        $this->db->limit(1);

        $query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function update_about($id, $data){
        $this->db->where('setting_id', $id);
        $this->db->update('setting', $data);
        return 0;
    }

    function insert_new($data) {
    	$this->db->insert('setting', $data);
    	return 1;
    }
}