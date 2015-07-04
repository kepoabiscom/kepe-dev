<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videografi extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('archives_model','', true);
		$this->load->model('video_model','', true);
		$this->load->model('category_video_model','', true);
		$this->load->library("parser");
		$this->load->library("pagination");
		$this->load->library("menu");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{	
		$config = $this->table_pagination();
		
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "videografi"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "videografi"),
			'get_video' => $this->get_video_list($config['start'], $config['per_page']),
			'get_video_category' => $this->get_video_category_list(),
			'get_archives_list' => $this->get_archives_list(),
			'page' => $config['page']
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);

		$this->generate('videografi/videografi', $data);
	}
	
	function get_video_image($id) {
		$r = $this->video_model->get_image($id);
		return ($r != false) ? array("image_id" => $r->image_id, "path" => $r->path) : array("image_id" => 0, "path" => "");
	}
	
	public function generate($view, $content = array())
	{
		$data = $content;
		$data['slider'] = "";
		$data['header']  = $this->parser->parse('templates/header', $content, TRUE);
		$data['content']  = $this->parser->parse($view, $content, TRUE);
		$data['footer']  = $this->parser->parse('templates/footer', $content, TRUE);
		
		$this->parser->parse('index', $data);
	}
	
	public function get_video_list($start=0, $limit=10) {
		$query = $this->video_model->get_video_list(1, $start, $limit);
		
		$i = 0;
		foreach ($query->result() as $q)
		{
			$video_id = !isset($q->video_id) ? "" : $q->video_id;
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			$year = !isset($q->year) ? 0 : $q->year;
			$month = !isset($q->month) ? 0 : $q->month;
			$day = !isset($q->day) ? 0 : $q->day;
			
			$img = "<a target='_blank' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive thumbnail' src='". base_url($path) ."' alt='".$title."' style='margin-top: 20px;'/>";
			$img .= "</a>";
			
			$view = base_url('videografi/view/'.$year.'/'.$month.'/'.$day.'/'.$video_id.'/'.$this->slug($title));
			$title = "<h5 style='min-height: 41px;'><a href='".$view."'>".$title."</a></h5>";
			

			$data[$i] = array(
				"video_id" => $video_id,
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => $title,
				"description" => !isset($q->description) ? "" : $q->description,
				"path_video" => !isset($q->path_video) ? "" : $q->path_video,
				"duration" => !isset($q->duration) ? "" : $q->duration,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"category" => !isset($q->category) ? "" : $q->category
			 );
			 
			 $i++;
		}
		
 		return $data;
	}
	
	public function get_video_category_list() {
		$query = $this->category_video_model->get_category(1);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$title = !isset($q->title) ? "" : $q->title;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='#'>".$title." (".$total.")</a></li>";
			
			$data[$i] = array(
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_archives_list() {
		$table = "video";
		
		$query = $this->archives_model->get_archives_list($table);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$month = !isset($q->month) ? "" : $q->month;
			$year = !isset($q->year) ? "" : $q->year;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='#'>".$month." ".$year." (".$total.")</a></li>";
			
			$data[$i] = array(
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}

	function view($year, $month, $day, $id, $slug = "") {
		$q = $this->video_model->get_by_id(1, $id);
		
 		$youtube_id = ""; $link = $q->url;
 		if(strpos($link, "v=")) {
 			$arr = explode("v=", $link);
 			$youtube_id = $arr[1];
 		}
		
 		$data = array_merge(
			$this->profile()->get_about_detail(),
 			array(
				"get_menu" => $this->menu->get_menu("header", "videografi"),
	 			"get_breadcrumb" => $this->menu->get_menu("breadcrumb", "videografi"),
	 			"get_video_category" => $this->get_video_category_list(),
	 			"get_archives_list" => $this->get_archives_list(),
	 			"get_video" => $this->get_video_list(0, 5),
 				"title_category" => "<a href='#'>".$q->title_category."</a>",
	            "title" => $q->title_video,
	            "tag" => $q->tag,
	            "status" => $q->status,
	            "description" => $q->description,
	            "story_ide" => $q->story_ide,
	            "screenwriter" => $q->screenwriter,
	            "film_director" => $q->film_director,
	            "cameramen" => $q->cameramen,
	            "artist" => $q->artist,
	            "url" => "<div class='embed-responsive embed-responsive-16by9' style='margin-bottom: 10px;'><iframe class=embed-responsive-item' src='//www.youtube.com/embed/".$youtube_id."?rel=0'></iframe></div>",
	            "duration" => $q->duration,
				"full_name" => $q->full_name,
	            "created_date" => $q->created_date,
	            "modified_date" => $q->modified_date
	        )
		);

 		$this->generate('videografi/view', $data);
	}
	
	function profile(){
		include ('about.php');
		
		return $obj = new about();
	}
	
	function slug($str='') {
		return strtolower(preg_replace('/\s/', '-', $str));
	}
	
	function page() {
	 	if(!$this->uri->segment(3)) {
	 		redirect("videografi");
	 	} else {
	 		$this->index();	
	 	}
	 }
	
	 function table_pagination(){
		$config['base_url'] = base_url("videografi/page/");
		$config['per_page'] = 4;
		$config['total_rows'] = $this->video_model->count_video(1);
		$config['uri_segment'] = 3;
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['first_link'] = '&lt;&lt;';
		$config['last_link'] = '&gt;&gt;';
		$config['cur_tag_open'] = '<span><b>';
		$config['cur_tag_close'] = '</b></span>';
		$config['full_tag_open'] = '<div align="center"><ul class="pagination"><li>';
		$config['full_tag_close'] = '</li></ul></div>';
		
		$this->pagination->initialize($config);

		$config['start'] = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		
		$config['page'] = $this->pagination->create_links();
		return $config;
	}
}