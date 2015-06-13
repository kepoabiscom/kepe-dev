<?php 

class Article_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_article_list($start, $limit) {
    	$this->db->select("a.article_id, a.title as title_article, ac.title as title_category, a.status, a.created_date, a.modified_date", false);
    	$this->db->from("article as a");
    	$this->db->limit($limit, $start);
        $this->db->order_by("article_id", "desc");
        $this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id');
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function count_article() {
        return $this->db->count_all("article");
    }

    function create_article($data) {
        $data = array("user_id" => $data['user_id'],
        			"article_category_id" => $data['article_category_id'],
                    "title" => $data['title'],
                    "tag" => $data['tag'],
                    "status" => $data['status'],
                    "summary" => $data['summary'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('article', $data);
    }

    function delete_article($id) {
    	return $this->db->delete("article", array("article_id" => $id));
    }

    function get_by_id($id) {
    	//$sql = "select * from user as u JOIN article as a on a.user_id = u.user_id JOIN article_category as ac on ac.article_category_id = a.article_category_id ";
    	$this->db->select("a.article_id, a.article_category_id, u.user_id, u.nama_lengkap, a.title as title_article, ac.title as title_category, a.status, a.summary, a.tag, a.created_date, a.modified_date", false);
    	$this->db->from("article as a");
    	$this->db->join('user as u', 'u.user_id = a.user_id');
        $this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id');
       	$this->db->where("article_id", $id);
       	$this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_article($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('article_id', $id);
        $this->db->update('article', $data); 
    }
}