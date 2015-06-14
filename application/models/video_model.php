<?php 

class Video_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function count_video() {
        return $this->db->count_all("video");
    }

    function get_video_list($start, $limit) {
    	$this->db->select("v.video_id, v.title as title_video, vc.title as title_category, v.status, v.created_date, v.modified_date", false);
    	$this->db->from("video as v");
    	$this->db->limit($limit, $start);
        $this->db->order_by("video_id", "desc");
        $this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id');
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function delete_video($id) {
    	return $this->db->delete("video", array("video_id" => $id));
    }

    function create_video($data) {
        $data = array("video_category_id" => $data['video_category_id'],
                    "title" => $data['title'],
                    "tag" => $data['tag'],
                    "status" => $data['status'],
                    "description" => $data['description'],
                    "story_ide" => $data['story_ide'],
                    "screenwriter" => $data['screenwriter'],
                    "film_director" => $data['film_director'],
                    "cameramen" => $data['cameramen'],
                    "artist" => $data['artist'],
                    "url" => $data['url'],
                    "duration" => $data['duration'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s")
                );
        $this->db->insert('video', $data);
    }

    function get_by_id($id) {
    	$this->db->select("v.video_id, v.video_category_id, v.tag, v.title as title_video, 
    						vc.title as title_category, v.status, v.artist, v.story_ide, 
    						v.cameramen, v.url, v.duration, v.screenwriter, v.film_director,
    						v.description, v.created_date, v.modified_date", false);
    	$this->db->from("video as v");
        $this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id');
       	$this->db->where("video_id", $id);
       	$this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_video($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('video_id', $id);
        $this->db->update('video', $data); 
    }
}