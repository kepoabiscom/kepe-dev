<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("home_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("menu");
		$this->load->library("parser");
		$this->load->library("global_common");
	}

	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{	
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "home"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "home"),
			'get_video' => $this->get_video(),
			'get_article' => $this->get_article(),
			'get_news' => $this->get_news(),
			'get_all' => $this->get_all(),
			'title' => 'Home'
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$data['meta_tag'] = "Kepo ".$data['title'].", KepoAbis, Kepo, Abis, ".$data['site_name'].", ".$data['tagline'];
		$data['meta_description'] = $data['site_description'];
		$data['og_image'] = base_url('assets/img/'.$data['logo_name']);
		
		$this->generate('home', $data);
	}
	
	public function generate($view, $content = array())
	{
		$data = array(
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			/* 'slider' => $this->parser->parse('templates/slider', $content, TRUE), */
			'slider' => $this->menu->get_page_title($content['title']),
			'content' => $this->parser->parse($view, $content, TRUE),
			'map' => $this->parser->parse('map', $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		if(ENVIRONMENT == 'production') 
			$this->output->cache(15);
		
		$this->parser->parse('/index', $data);
	}
	
	public function get_all(){
		$query = $this->home_model->get_recent_all();

		$i = 0;
		foreach ($query->result() as $q)
		{	
			$title = $this->global_common->get_title(28, !isset($q->title) ? "" : $q->title);
			
			$data[$i] = array(
				"id" => !isset($q->id) ? "" : $q->id,
				"title" => $title,
				"summary" => !isset($q->summary) ? "" : $q->summary,
				"type" => !isset($q->type) ? "" : $q->type,
				"path_image" => !isset($q->path_image) ? "" : base_url($q->path_image),
				"category" => !isset($q->category) ? "" : $q->category,
				"nama_lengkap" =>! isset($q->nama_lengkap) ? "" : $q->nama_lengkap,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"created_date_style" => !isset($q->created_date_style) ? "" : $q->created_date_style,
				"year" => !!isset($q->year) ? "" : $q->year,
				"month" => !!isset($q->month) ? "" : $q->month,
				"day" => !!isset($q->day) ? "" : $q->day,
				"status" => ($i == 0) ? "item active" : "item"
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_news(){
		$query = $this->home_model->get_recent_news();

		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$year = !isset($q->year) ? 0 : $q->year;
			$month = !isset($q->month) ? 0 : $q->month;
			$day = !isset($q->day) ? 0 : $q->day;
			$default = base_url('assets/img/news/default-image.png');
			
			$news_id = !isset($q->news_id) ? "" : $q->news_id;
			$read_more = base_url("news/read/" .  $year.'/'.$month.'/'.$day.'/'.$news_id . "/" . $this->slug($title) . "");
			//$img = "<a target='_blank' class='thumbnail' href='". base_url($path) ."'>";
			//$img = "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."'/>";
			$img = "<img class='img-responsive lazy' src='".$default."' data-original='". base_url($path) ."'  alt='".$title."'>";
			//$img .= "</a>";
			
			$data[$i] = array(
				"article_id" => !isset($q->news_id) ? "" : $q->news_id,
				"article_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				//"title" => "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='" . $read_more . "'>".$this->global_common->get_title(28, $title)."</a>",
				"title" => "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='" . $read_more . "'>".$title."</a>",
				"summary" => !isset($q->summary) ? "" : $this->get_preview_summary($q->summary, $read_more, "x"),
				"full_name" => !isset($q->nama_lengkap) ? "" : "By ".$q->nama_lengkap,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"img" => "<img src='". base_url($path) ."' alt='".$title."'/>",
				"category" => !isset($q->category) ? "" : "In <a href='".base_url('news/page/0/0/'.$q->category)."'>".$q->category."</a>"
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_article(){
		$query = $this->home_model->get_recent_article();
		
		if ($query != false) {
			$i = 0; $parenthesis = 1;
			
			foreach ($query->result() as $q) {
				$path = !isset($q->path_image) ? "" : $q->path_image;
				$title = !isset($q->title) ? "" : $q->title;
				
				$year = !isset($q->year) ? 0 : $q->year;
				$month = !isset($q->month) ? 0 : $q->month;
				$day = !isset($q->day) ? 0 : $q->day;
				$default = base_url('assets/img/article/default-image.png');
				
				$article_id = !isset($q->article_id) ? "" : $q->article_id;
				$read_more = base_url("article/read/" .  $year.'/'.$month.'/'.$day.'/'.$article_id . "/" . $this->slug($title) . "");
				
				//$img = "<a target='_blank' class='thumbnail' href='". base_url($path) ."'>";
				//$img = "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."'/>";
				$img = "<img class='img-responsive lazy' src='".$default."' data-original='". base_url($path) ."'  alt='".$title."'>";
				//$img .= "</a>";
				
				$open_parenthesis =  ($parenthesis % 2 == 1) ? "<div class='col-md-12'><div class='row' style='margin-bottom: 20px;'>" : "";
				$closing_parenthesis = ($parenthesis % 2 == 0) ? "</div></div>" : "";
				
				$data[$i] = array(
					"article_id" => $article_id,
					"article_category_id" => !isset($q->article_category_id) ? "" : $q->article_category_id,
					"image_id" => !isset($q->image_id) ? "" : $q->image_id,
					//"title" => "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='". $read_more ."'>".$this->global_common->get_title(28, $title)."</a>",
					"title" => "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='". $read_more ."'>".$title."</a>",
					"summary" => !isset($q->summary) ? "" : $this->get_preview_summary($q->summary, $read_more, "x"),
					"full_name" => !isset($q->nama_lengkap) ? "" : "By " . $q->nama_lengkap,
					"created_date" => !isset($q->created_date) ? "" : $q->created_date,
					"image" => $img,
					"img" => "<img src='". base_url($path) ."' alt='".$title."'/>",
					"category" => !isset($q->category) ? "" : "In <a href='".base_url('article/page/0/0/'.$q->category)."'>".$q->category."</a>",
					"no_recent_art" => "",
					"open_parenthesis" => $open_parenthesis,
					"closing_parenthesis" => $closing_parenthesis
				 );
				 
				 $i++; $parenthesis++;
			}

	 		return $data;
		} return array(array("no_recent_art"=> "No recent Articles.",
					"title" => "",
					"created_date" => "",
					"summary" => "",
					"full_name" => "",
					"category" => "",
					"image" => ""

			));	
	}
	
	public function get_video(){
		$query = $this->home_model->get_recent_video();
		
		$i = 0; $parenthesis = 1;

		foreach ($query->result() as $q)
		{
			$video_id= !isset($q->video_id) ? "" : $q->video_id;
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			$year = !isset($q->year) ? 0 : $q->year;
			$month = !isset($q->month) ? 0 : $q->month;
			$day = !isset($q->day) ? 0 : $q->day;
			$default = base_url('assets/img/video/default-image.png');
			
			$img = "<a target='_blank' href='". base_url('videografi/view/'.$year.'/'.$month.'/'.$day.'/'.$video_id.'/'. $this->slug($title)) ."'>";
			//$img .= "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."' style='margin-top: 20px;'/>";
			$img .= "<img class='img-responsive lazy' src='".$default."' data-original='". base_url($path) ."'  alt='".$title."' style='margin-top: 15px;'>";
			$img .= "</a>";
			$view_more = "<a href='".base_url('videografi/view/'.$year.'/'.$month.'/'.$day.'/'.$video_id.'/'. $this->slug($title))."' class='button medium yellow'>View</a>";
			$title = "<a data-toggle='tooltip' data-placement='top' title='".$title."' href='".base_url('videografi/view/'.$year.'/'.$month.'/'.$day.'/'.$video_id.'/'. $this->slug($title))."'>".$this->global_common->get_title(28, $title)."</a>";
			
			$open_parenthesis =  ($parenthesis % 3 == 1) ? "<div class='col-md-12'><div class='row'>" : "";
			$closing_parenthesis = ($parenthesis % 3 == 0) ? "</div></div>" : "";
				
			$data[$i] = array(
				"video_id" => $video_id,
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => $title,
				"description" => !isset($q->description) ? "" : $this->get_preview_summary($q->description, $view_more),
				"path_video" => !isset($q->path_video) ? "" : $q->path_video,
				"duration" => !isset($q->duration) ? "" : $q->duration,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"url" => $view_more,
				"full_name" => !isset($q->full_name) ? "" : $q->full_name,
				"category" => !isset($q->category) ? "" : $q->category,
				"open_parenthesis" => $open_parenthesis,
				"closing_parenthesis" => $closing_parenthesis,
			 );
			 
			 $i++; $parenthesis++;
		}

 		return $data;
	}
	
	public function profile() {
		include ('about.php');
		
		return $obj = new about();
	}

	function slug($str='') {
		$s = strtolower(preg_replace('/[\!\@\+\=\}\{\:\?\-\/\&\%\#\,\.\)\(\$]/', '', $str));
		return strtolower(preg_replace('/[\s]/', '-', $s));
	}

	function get_preview_summary($text, $see_more, $f='video') {
		$words = explode(" ", $text);
		$N = 50;
		if(count($words) > $N) {
			$text = "";
			for($i=0; $i < $N; $i++) {
				$text .= $words[$i] . " ";
			}
			$link = ($f != 'video') ? "<br><a href='".$see_more."'>Read more</a>" : "";
			$text .= "[...] " . $link;
		}

		return $text;
	}
}
