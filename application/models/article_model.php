<?php 

class Article_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_article_list($flag=0, $start, $limit, $keyword='') {
    	if($flag == 0) {
            $this->db->select("a.article_id, a.title as title_article, ac.title as title_category, a.status, a.created_date, a.modified_date", false);
        	$this->db->from("article as a");
            if($keyword != '') 
                $this->db->like("a.title", $keyword);
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
        } else {
            $q = "
                SELECT 
                    art.article_id
                    ,art.article_category_id
                    ,art.image_id
                    ,art.title
                    ,art.summary
                    ,usr.nama_lengkap
                    ,DATE_FORMAT(art.created_date, '%d %b %Y') as created_date
                    ,img.path AS path_image
                    ,art_cat.title AS category
                FROM
                    article art
                    LEFT JOIN
                        user usr
                    ON
                        art.user_id = usr.user_id
                    LEFT JOIN
                        image img
                    ON
                        art.image_id = img.image_id
                    LEFT JOIN
                        article_category art_cat
                    ON
                        art.article_category_id = art_cat.article_category_id
                WHERE 
                    art.status = 'published'
                    AND art.image_id > 0
                ORDER BY art.created_date DESC
                LIMIT ".$start.", ".$limit."
            ";

            $query = $this->db->query($q);
            
            if($query->num_rows() > 0) {
                return $query;
            } 
        }
        return false;
    }

    function get_enum_status() {
        $enum = $this->db->query("SHOW COLUMNS FROM article WHERE Field = 'status' ");
        preg_match("//^enum\(\'(.*)\'\)$/", $enum, $matches);
        $result = explode("','", $matches[1]);
        return $result;
    }

    function count_article($keyword='') {
        if($keyword != '') {
            $this->db->like('title', $keyword);
            $this->db->from('article');
            return $this->db->count_all_results();
        }
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

    function get_image($id='') {
        $this->db->select("i.path")
                ->from("article a")
                ->join("image i", "a.image_id = i.image_id")
                ->where("article_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;

    }

    function get_by_id($id) {
    	//$sql = "select * from user as u JOIN article as a on a.user_id = u.user_id JOIN article_category as ac on ac.article_category_id = a.article_category_id ";
    	$this->db->select("a.article_id, a.image_id, a.article_category_id, u.user_id, 
                            u.nama_lengkap, a.title as title_article, 
                            ac.title as title_category, a.status, a.summary, 
                            a.tag, DATE_FORMAT(a.created_date, '%d %b %Y') as created_date, a.modified_date", false);
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