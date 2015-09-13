<?php 

class category_article_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function get_category($flag=0) {
        if($flag == 0) {
        	$this->db->select('article_category_id, title')
                        ->from('article_category');

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
                    art_cat.article_category_id
                        ,art_cat.title
                        ,CASE art.article_id 
                            WHEN '' THEN 0
                            ELSE COUNT(art.article_id)
                            END AS total 
                    FROM 
                        article_category art_cat
                    LEFT JOIN
                        article art
                    ON
                        art_cat.article_category_id = art.article_category_id
						AND art.status = 'published'
                    GROUP BY art_cat.article_category_id
                ";
                
            $query = $this->db->query($q);
            
            if($query->num_rows() > 0) {
                return $query;
            } 
        }
        return false;
    }

    function get_list_category($start, $limit) {
        $this->db->select("article_category_id, title, body, created_date, modified_date")
                    ->from("article_category")
                    ->limit($limit, $start)
                    ->order_by("article_category_id", "desc");
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function count_category_article() {
        return $this->db->count_all("article_category");
    }

    function create_category_article($data) {
        $data = array("title" => $data['title'],
                    "body" => $data['body'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s"),
                    "image_id" => $data['image_id']
                );
        $this->db->insert('article_category', $data);
    }

    function delete_category_article($id) {
        return $this->db->delete("article_category", array("article_category_id" => $id));
    }

    function get_by_id($id) {
        $this->db->select("article_category_id, title, body, created_date, modified_date");
        $this->db->from("article_category");
        $this->db->where("article_category_id", $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_category_article($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('article_category_id', $id);
        $this->db->update('article_category', $data); 
    }

 }