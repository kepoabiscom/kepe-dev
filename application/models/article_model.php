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
			$this->db->select(" 
				a.article_id
				,a.article_category_id
				,a.image_id
				,a.title
				,a.summary
				,usr.nama_lengkap
				,DATE_FORMAT(a.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,ac.title AS category
				,DATE_FORMAT(a.created_date, '%Y') as year
				,DATE_FORMAT(a.created_date, '%m') as month
				,DATE_FORMAT(a.created_date, '%d') as day"
				,false);
			$this->db->from("article as a");
			$this->db->join('image as img', 'img.image_id = a.image_id', 'left');
			$this->db->join('user as usr', 'a.user_id = usr.user_id', 'left');
			$this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id', 'left');
			$this->db->where("a.status = 'published' AND a.image_id > 0");
			$this->db->order_by("a.created_date", "DESC");	
			$this->db->limit($limit, $start);  
			 $query = $this->db->get();
            
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

    function count_article($flag=0, $keyword='') {
        if($flag == 0){
			if($keyword != '') {
				$this->db->like('title', $keyword);
				$this->db->from('article');
				return $this->db->count_all_results();
			}
			else{
				 return $this->db->count_all("article");
			}
        }
		else{
			$this->db->select(" 
				a.article_id
				,a.article_category_id
				,a.image_id
				,a.title
				,a.summary
				,usr.nama_lengkap
				,DATE_FORMAT(a.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,ac.title AS category
				,DATE_FORMAT(a.created_date, '%Y') as year
				,DATE_FORMAT(a.created_date, '%m') as month
				,DATE_FORMAT(a.created_date, '%d') as day"
				,false);
			$this->db->from("article as a");
			$this->db->join('image as img', 'img.image_id = a.image_id', 'left');
			$this->db->join('user as usr', 'a.user_id = usr.user_id', 'left');
			$this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id', 'left');
			$this->db->where("a.status = 'published' AND a.image_id > 0");
			$this->db->order_by("a.created_date", "DESC");	
			$query = $this->db->get();
			 
			return $query->num_rows();
		}
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
    	$this->db->select("a.article_id, a.image_id, a.article_category_id, u.user_id, 
                            u.nama_lengkap, a.title as title_article, 
                            ac.title as title_category, a.status, a.summary, 
                            a.tag, DATE_FORMAT(a.created_date, '%M %d, %Y %h:%i %p') as created_date, a.modified_date", false);
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