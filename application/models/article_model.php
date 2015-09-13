<?php 

class Article_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }
	
	function create_article_stat($data){
        $query = $this->db->query("select distinct(ip_address) 
            from article_stat where article_id = '".$data['article_id']."' and ip_address = '".$data['ip_address']."'");

        if($query->num_rows() > 0) return;
        else {    
            $this->db->insert('article_stat', $data);    
        }
		
	}
	
    function get_article_list($flag=0, $start, $limit, $keyword=array()) {	
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
        } else if($flag == 1 || $flag == 2){
			$this->db->select(" 
				a.article_id
				,a.article_category_id
				,a.image_id
				,a.title
				,a.tag
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
			if($keyword['category']){
				$this->db->like('ac.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(a.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(a.created_date, '%m')", $keyword['month']); 
			}
			$this->db->order_by("a.created_date", "DESC");	
			$this->db->limit($limit, $start);  
			$query = $this->db->get();
			
            if($query->num_rows() > 0) {
                return $query;
            } 
        } else if($flag == 3){
			$this->db->select(" 
				a.article_id
				,a.article_category_id
				,a.image_id
				,a.title
				,a.tag
				,a.summary
				,usr.nama_lengkap
				,DATE_FORMAT(a.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,ac.title AS category
				,DATE_FORMAT(a.created_date, '%Y') as year
				,DATE_FORMAT(a.created_date, '%m') as month
				,DATE_FORMAT(a.created_date, '%d') as day
				,COUNT(DISTINCT(astat.ip_address)) AS count_article_stat"
				,false);
			$this->db->from("article as a");
			$this->db->join('image as img', 'img.image_id = a.image_id', 'left');
			$this->db->join('user as usr', 'a.user_id = usr.user_id', 'left');
			$this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id', 'left');
			$this->db->join('article_stat as astat', 'astat.article_id = a.article_id', 'left');
			$this->db->where("a.status = 'published' AND a.image_id > 0");
			if($keyword['category']){
				$this->db->like('ac.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(a.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(a.created_date, '%m')", $keyword['month']); 
			}
			$this->db->group_by("a.article_id");
			$this->db->order_by("count_article_stat", "DESC");	
			$this->db->order_by("a.created_date", "DESC");	
			$this->db->limit($limit, $start);  
			$query = $this->db->get();
			
            if($query->num_rows() > 0) {
                return $query;
            } 
		} else{
			$this->db->select(" 
				a.article_id
				,a.article_category_id
				,a.image_id
				,a.title
				,a.tag
				,a.summary
				,usr.nama_lengkap
				,DATE_FORMAT(a.created_date, '%M %d, %Y %h:%i %p') as created_date
				,img.path AS path_image
				,ac.title AS category
				,DATE_FORMAT(a.created_date, '%Y') as year
				,DATE_FORMAT(a.created_date, '%m') as month
				,DATE_FORMAT(a.created_date, '%d') as day
				,COUNT(1) AS count_news_comment"
				,false);
			$this->db->from("article as a");
			$this->db->join('image as img', 'img.image_id = a.image_id', 'left');
			$this->db->join('user as usr', 'a.user_id = usr.user_id', 'left');
			$this->db->join('article_category as ac', 'ac.article_category_id = a.article_category_id', 'left');
			$this->db->join('article_comment as acomm', 'acomm.article_id = a.article_id', 'left');
			$this->db->where("a.status = 'published' AND a.image_id > 0");
			if($keyword['category']){
				$this->db->like('ac.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(a.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(a.created_date, '%m')", $keyword['month']); 
			}
			$this->db->group_by("a.article_id");
			$this->db->order_by("count_news_comment", "DESC");	
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
        $query = $this->db->query("
        		SELECT COLUMN_TYPE
				FROM information_schema.COLUMNS
				WHERE TABLE_NAME = 'article'
				      AND COLUMN_NAME = 'status';
        		");
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function count_article($flag=0, $keyword=array()) {
        if($flag == 0){
			if($keyword != NULL) {
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
			$this->db->from("article_category as ac");
			$this->db->join("article as a", "ac.article_category_id = a.article_category_id AND a.status = 'published' AND a.image_id > 0", "left");
			$this->db->join('image as img', 'img.image_id = a.image_id', 'left');
			$this->db->join('user as usr', 'a.user_id = usr.user_id', 'left');
			if($keyword['category']){
				$this->db->like('ac.title', $keyword['category']); 
			}
			if($keyword['year']){
				$this->db->like("DATE_FORMAT(a.created_date, '%Y')", $keyword['year']); 
			}
			if($keyword['month']){
				$this->db->like("DATE_FORMAT(a.created_date, '%m')", $keyword['month']); 
			}
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

    function get_rank() {
        $query = $this->db->query("
                    select @i:=@i+1 as i, article_id
                    from article, (select @i:=-1) r 
                    where article.status = 'published'
                    order by article_id desc");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    function get_one_row($rank) {
        $query = $this->db->query("
                    select n.article_id, n.title
                    ,DATE_FORMAT(n.created_date, '%M %d, %Y %h:%i %p') as created_date
                    ,DATE_FORMAT(n.created_date, '%Y') as year
                    ,DATE_FORMAT(n.created_date, '%m') as month
                    ,DATE_FORMAT(n.created_date, '%d') as day
                    from article n order by n.article_id desc
                    limit ". $rank .", 1 ");

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;
    }
	
	function count_article_comment($id){
		$this->db->select("COUNT(1) AS count_article_comment");
		$this->db->from("article_comment acom");
		$this->db->where("acom.article_id", $id);
		
		$query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
	}
	
	function count_article_stat($id){
        $query = $this->db->select("count(ip_address) as count_article_stat")
                        ->from("(select distinct ip_address from article_stat where article_id = '".$id."') as d")
                        ->get();
        
        /*$this->db->select("COUNT(ip_address) AS count_article_stat");
		$this->db->from("article_stat astat");
		$this->db->where("astat.article_id", $id);
        */
		
		//$query = $this->db->get();
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return (object) array("count_article_stat" => 0);
	}
}