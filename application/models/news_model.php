<?php 

class News_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_news_list($start, $limit, $keyword='') {
    	$this->db->select("a.news_id, a.title as title_news, ac.title as title_category, a.status, a.created_date, a.modified_date", false);
    	$this->db->from("news as a");
        if($keyword != '') 
            $this->db->like("a.title", $keyword);
    	$this->db->limit($limit, $start);
        $this->db->order_by("news_id", "desc");
        $this->db->join('news_category as ac', 'ac.news_category_id = a.news_category_id');
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function get_enum_status() {
        $enum = $this->db->query("SHOW COLUMNS FROM news WHERE Field = 'status' ");
        preg_match("//^enum\(\'(.*)\'\)$/", $enum, $matches);
        $result = explode("','", $matches[1]);
        return $result;
    }

    function count_news($keyword='') {
        if($keyword != '') {
            $this->db->like('title', $keyword);
            $this->db->from('news');
            return $this->db->count_all_results();
        }
        return $this->db->count_all("news");
    }

    function create_news($data) {
        $data = array("user_id" => $data['user_id'],
        			"news_category_id" => $data['news_category_id'],
                    "title" => $data['title'],
                    "tag" => $data['tag'],
                    "status" => $data['status'],
                    "summary" => $data['summary'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('news', $data);
    }

    function delete_news($id) {
    	return $this->db->delete("news", array("news_id" => $id));
    }

    function get_image($id='') {
        $this->db->select("i.path")
                ->from("news a")
                ->join("image i", "a.image_id = i.image_id")
                ->where("news_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;

    }

    function get_by_id($id) {
    	//$sql = "select * from user as u JOIN news as a on a.user_id = u.user_id JOIN news_category as ac on ac.news_category_id = a.news_category_id ";
    	$this->db->select("a.news_id, a.image_id, a.news_category_id, u.user_id, u.nama_lengkap, a.title as title_news, 
                            ac.title as title_category, a.status, a.summary, a.body, a.tag, a.created_date, a.modified_date", false);
    	$this->db->from("news as a");
    	$this->db->join('user as u', 'u.user_id = a.user_id');
        $this->db->join('news_category as ac', 'ac.news_category_id = a.news_category_id');
       	$this->db->where("news_id", $id);
       	$this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_news($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('news_id', $id);
        $this->db->update('news', $data); 
    }
}