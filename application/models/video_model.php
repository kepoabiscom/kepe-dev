<?php 

class Video_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function count_video() {
        return $this->db->count_all("video");
    }

    function get_video_list($flag=0, $start, $limit) {
        if($flag == 0) {
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
        } else {
            $q = "
                SELECT 
                  vid.video_id
                  ,vid.video_category_id
                  ,vid.image_id
                  ,vid.title
                  ,vid.description
                  ,vid.url AS path_video
                  ,vid.duration
                  ,vid.created_date
				  ,DATE_FORMAT(vid.created_date, '%Y') as year
				  ,DATE_FORMAT(vid.created_date, '%m') as month
				  ,DATE_FORMAT(vid.created_date, '%d') as day
                  ,img.path AS path_image
                  ,vid_cat.title AS category
                FROM
                    video vid
                    LEFT JOIN
                      image img
                    ON
                      vid.image_id = img.image_id
                    LEFT JOIN
                      video_category vid_cat
                    ON
                      vid.video_category_id = vid_cat.video_category_id
                WHERE 
                    vid.status = 'published'
                    AND vid.image_id > 0
                ORDER BY created_date DESC
                LIMIT ".$start.", ".$limit."
            ";

            $query = $this->db->query($q);
            
            if($query->num_rows() > 0) {
                return $query;
            } 
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
                    "image_id" => $data['image_id'],
                    "created_date" => date("Y-m-d H:i:s"),
                    "modified_date" => date("Y-m-d H:i:s")
                );
        $this->db->insert('video', $data);
    }

    function get_by_id($flag=0, $id) {
		if($flag == 0){
			$this->db->select("
				v.video_id
				,v.video_category_id
				,v.tag
				,v.title as title_video
				,vc.title as title_category
				,v.status
				,v.artist
				,v.story_ide
				,v.cameramen
				,v.url
				,v.duration
				,v.screenwriter
				,v.film_director
				,v.description
				,v.created_date
				,v.modified_date"
				,false
			);
			$this->db->from("video as v");
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id');
			$this->db->where("video_id", $id);
			$this->db->limit(1);
		}
		else{
			$this->db->select("
				v.video_id
				,v.video_category_id
				,u.nama_lengkap as full_name
				,v.tag
				,v.title as title_video
				,vc.title as title_category
				,v.status
				,v.artist
				,v.story_ide
				,v.cameramen
				,v.url
				,v.duration
				,v.screenwriter
				,v.film_director
				,v.description
				,DATE_FORMAT(v.created_date, '%M %d, %Y') as created_date
				,DATE_FORMAT(v.modified_date, '%M %d, %Y') as modified_date"
				,false
			);
			$this->db->from("video as v");
			$this->db->join('video_category as vc', 'vc.video_category_id = v.video_category_id', 'left');
			$this->db->join('user as u', 'u.user_id = v.user_id','left');
			$this->db->where("video_id", $id);
			$this->db->limit(1);
		}

        $query = $this->db->get();
		
		/*
		echo "<pre>";
		print_r($this->db);
		echo "</pre>";
		exit;
		*/
		
        if($query->num_rows() == 1) {
            return $query->row();
        } return;
    }

    function update_video($id, $data){
        $data["modified_date"] = date("Y-m-d H:i:s");
        $this->db->where('video_id', $id);
        $this->db->update('video', $data); 
    }

    function get_image($id='') {
        $this->db->select("i.path, i.image_id")
                ->from("video v")
                ->join("image i", "v.image_id = i.image_id")
                ->where("video_id", $id);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row();
        } return false;

    }
}