<?php 

class Category_news_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_category($flag=0) {
        if($flag == 0) {
        	$this->db->select('news_category_id, title')
                        ->from('news_category');

            $query = $this->db->get();

            if($query->num_rows() > 0) {
            	foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
        } else {
            $q = "
                SELECT 
                    n_cat.news_category_id
                    ,n_cat.title
                    ,CASE n.news_id 
                        WHEN '' THEN 0
                        ELSE COUNT(n.news_id)
                        END AS total 
                FROM 
                    news_category n_cat
                LEFT JOIN
                    news n
                ON
                    n_cat.news_category_id = n.news_category_id
                GROUP BY n_cat.news_category_id
            ";
                
            $query = $this->db->query($q);
            
            if($query->num_rows() > 0) {
                return $query;
            } 
        }
        
        return false;
    }

    function get_list_category($start, $limit) {
        $this->db->select("news_category_id, title, body, created_date, modified_date")
                    ->from("news_category")
                    ->limit($limit, $start)
                    ->order_by("news_category_id", "desc");
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function count_category_news() {
        return $this->db->count_all("news_category");
    }

    function create_category_news($data) {
        $data = array("title" => $data['title'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('news_category', $data);
    }

    function delete_category_news($id) {
        return $this->db->delete("news_category", array("news_category_id" => $id));
    }

    function get_by_id($id) {
        $this->db->select("news_category_id, title, body, created_date, modified_date");
        $this->db->from("news_category");
        $this->db->where("news_category_id", $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_category_news($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('news_category_id', $id);
        $this->db->update('news_category', $data); 
    }

 }