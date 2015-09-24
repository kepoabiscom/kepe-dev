<?php 

class service_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_service_list() {
    	$this->db->select('s.service_id, s.user_id, s.image_id, s.title, s.tag, s.summary, s.body');
		$this->db->from("service as s");
		$this->db->where("s.status", "published");

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query;
        } return false;
    }
	
	 function get_by_id($id) {
    	$this->db->select("s.service_id, s.image_id, s.user_id, s.title, s.tag, s.summary, s.body,
                            u.nama_lengkap as full_name, s.status, DATE_FORMAT(s.created_date, '%M %d, %Y %h:%i %p') as created_date, s.modified_date", false);
    	$this->db->from("service as s");
    	$this->db->join('user as u', 'u.user_id = s.user_id');
       	$this->db->where("s.service_id", $id);
       	$this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }
	
	function get_list_service() {
		$query = $this->db->select("*")
    		->from("service")
    		->get();

    	if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

	function get_enum_status() {
        $query = $this->db->query("
        		SELECT COLUMN_TYPE
				FROM information_schema.COLUMNS
				WHERE TABLE_NAME = 'service'
				      AND COLUMN_NAME = 'status';
        		");
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
	
	function update_service($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
		
        $this->db->where('service_id', $id);
        $this->db->update('service', $data); 
    }
	
	function get_image($id='') {
        $this->db->select("i.path")
                ->from("service s")
                ->join("image i", "s.image_id = i.image_id")
                ->where("service_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }
	
	function create_service($data) {
        $data = array("user_id" => $data['user_id'],
                    "title" => $data['title'],
                    "tag" => $data['tag'],
                    "status" => $data['status'],
                    "summary" => $data['summary'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('service', $data);
    }
	
	function delete_divisi($id) {
    	return $this->db->delete("service", array("service_id" => $id));
    }
 }