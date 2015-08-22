<?php 

class Image_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_image_list($type='') {
    	$this->db->select("image_id, title, path")
    	->from("image")
        ->where("type", $type)
        ->order_by("image_id", "desc");

        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function insert_image($data) {
        $data["created_date"] = date("Y-m-d H:i:s");
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->insert('image', $data);
    }

    function update_image($id, $data) {
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('image_id', $id);
        $this->db->update('image', $data); 
	}

    function get_last_image() {
        $this->db->select("image_id")
                ->from("image")
                ->order_by("image_id", "desc")
                ->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function delete_image($id) {
        return $this->db->delete("image", array("image_id" => $id));
    }

    function get_by_id($id='') {
        $this->db->select("image_id, path, size")
                ->from("image")
                ->where("image_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function get_bts($type='', $x=0) {
        $var = ($x == 1) ? array("limit" => 1, "order_by" => "desc") : array("limit" => 50, "order_by" => "desc");

        $this->db->select("image_id, title, path")
        ->from("image")
        ->where("type", $type)
        ->order_by("image_id", $var['order_by'])
        ->limit($var['limit']);

        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}