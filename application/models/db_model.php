<?php
	
class db_model extends CI_Model {
	
	function __construct() {
		parent:: __construct();
	}
	
	function get_archives_list($table){
		$q = "
			SELECT 
				DATE_FORMAT(created_date, '%M') AS month
				,DATE_FORMAT(created_date, '%Y') AS year
				,COUNT(1) AS total 
			FROM 
				".$table." 
			GROUP BY DATE_FORMAT(created_date, '%M'), DATE_FORMAT(created_date, '%Y')
			ORDER BY DATE_FORMAT(created_date, '%m'), DATE_FORMAT(created_date, '%Y')
		";
		
		$query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
	
	function get_video_category_list(){
		$q = "
			SELECT 
				vid_cat.video_category_id
				,vid_cat.title
				,CASE vid.video_id 
					WHEN '' THEN 0
					ELSE COUNT(vid.video_id)
					END AS total 
			FROM 
				video_category vid_cat
 			LEFT JOIN
				video vid
			ON
				vid_cat.video_category_id = vid.video_category_id
			GROUP BY vid_cat.video_category_id
			ORDER BY vid_cat.title ASC
		";
			
		$query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
	
	function get_video_list($start, $limit) {
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
		else{
			return false;
		}
	}
	
	function get_news_category_list(){
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
		else{
			return false;
		}
	}
	
	function get_news_list($start, $limit) {
		$q = "
			SELECT 
				n.news_id
				,n.news_category_id
				,n.image_id
				,n.title
				,n.summary
				,n.body
				,usr.nama_lengkap
				,DATE_FORMAT(n.created_date, '%M %d, %Y') as created_date
				,img.path AS path_image
				,n_cat.title AS category
			FROM
				news n
				LEFT JOIN
					user usr
				ON
					n.user_id = usr.user_id
				LEFT JOIN
					image img
				ON
					n.image_id = img.image_id
				LEFT JOIN
					news_category n_cat
				ON
					n.news_category_id = n_cat.news_category_id
			WHERE 
				n.status = 'published'
				AND n.image_id > 0
			ORDER BY n.created_date DESC
			LIMIT ".$start.", ".$limit."
		";

        $query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
	
	function get_article_category_list(){
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
			GROUP BY art_cat.article_category_id
		";
			
		$query = $this->db->query($q);
		
        if($query->num_rows() > 0) {
            return $query;
        } 
		else{
			return false;
		}
	}
	
	function get_article_list($start, $limit) {
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
		else{
			return false;
		}
	}
}
