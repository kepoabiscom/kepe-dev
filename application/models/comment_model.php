<?php 

date_default_timezone_set("Asia/Jakarta");

class Comment_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function post_comment($type='', $data) {
    	$data["created_date"] = date("Y-m-d H:i:s");
        $this->db->insert($type.'_comment', $data);
    }

    function get_comment($type='', $id='', $f=0) {
    	$var = ($f == 1) ? array("limit" => 1, "order_by" => "desc") : array("limit" => 50, "order_by" => "asc");

    	$query = $this->db->select($type."_comment_id, nick_name, body, created_date")
    			->from($type . "_comment")
    			->where($type."_id", $id)
    			->order_by($type."_comment_id", $var['order_by'])
    			->limit($var['limit'])->get();

    	if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

    function get_list_comment($type='') {
        $query = $this->db->select($type."_comment_id as id, nick_name, body, created_date")
                ->from($type . "_comment")
                ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

    function ban_comment($id, $type) {
        return $this->db->delete($type."_comment", array($type."_comment_id" => $id));
    }

    function count_notif($type='') {
        $query = $this->db->select("count(1) as counter_comment_notif")
                ->from($type . "_comment")
                ->where("is_read", "0")
                ->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }

    function update_is_read($type='') {
        $data['is_read'] = '1';
        $this->db->update($type."_comment", $data); 
    }
}

?>