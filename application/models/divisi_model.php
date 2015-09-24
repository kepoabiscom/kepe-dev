<?php 

class divisi_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_divisi_list() {
    	$this->db->select('d.divisi_id, d.user_id, d.image_id, d.title, d.tag, d.summary, d.body');
		$this->db->from("divisi as d");
		$this->db->where("status", "published");

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
	
	function get_list_divisi() {
		$query = $this->db->select("*")
    		->from("divisi")
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
				WHERE TABLE_NAME = 'divisi'
				      AND COLUMN_NAME = 'status';
        		");
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
	
	function update_divisi($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
		
        $this->db->where('divisi_id', $id);
        $this->db->update('divisi', $data); 
    }
	
	function get_image($id='') {
        $this->db->select("i.path")
                ->from("divisi d")
                ->join("image i", "d.image_id = i.image_id")
                ->where("divisi_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }
	
	function create_divisi($data) {
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
        $this->db->insert('divisi', $data);
    }
	
	function delete_divisi($id) {
    	return $this->db->delete("divisi", array("divisi_id" => $id));
    }
 }