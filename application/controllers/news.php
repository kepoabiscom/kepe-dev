<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("about_model");
		$this->load->helper(array("url", "form"));
		$this->load->model('archives_model','', true);
		$this->load->model('news_model','', true);
		$this->load->model('category_news_model','',true);
		$this->load->library("parser");
		$this->load->library("menu");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data = $this->profile()->get_about_detail();
		$data['get_menu'] = $this->menu->get_menu("header", "news");
		$data['get_breadcrumb'] = $this->menu->get_menu("breadcrumb", "news");
		$data['get_news'] = $this->get_news_list();
		$data['get_news_category'] = $this->get_news_category_list();
		$data['get_archives_list'] = $this->get_archives_list();
		
		$this->generate('news/news', $data);
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
	
	public function get_news_list($start=0, $limit=10){
		$query = $this->news_model->get_news_list(1, $start, $limit);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$img = "<p><a target='_blank' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive thumbnail' width='480px' src='". base_url($path) ."' alt='".$title."'/>";
			$img .= "</a></p>";
			
			$data[$i] = array(
				"article_id" => !isset($q->news_id) ? "" : $q->news_id,
				"article_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => "<a href='#'>".$title."</a>",
				"summary" => !isset($q->summary) ? "" : $q->summary,
				"body" => !isset($q->body) ? "" : $q->body,
				"full_name" => !isset($q->nama_lengkap) ? "" : $q->nama_lengkap,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"category" => !isset($q->category) ? "" : $q->category,
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_news_category_list() {
		$query = $this->category_news_model->get_category(1);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$title = !isset($q->title) ? "" : $q->title;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='#'>".$title." (".$total.")</a></li>";
			
			$data[$i] = array(
				"news_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_archives_list() {
		$table = "news";
		
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
	
	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}

	function read($id, $slug) {
		$q = $this->news_model->get_by_id($id);
		$r = $this->news_model->get_image($id);
		$title = $q->title_news;
		if(strtolower(preg_replace('/\s/', '_', $title)) === $slug) {
			$image = ($r != false) ? $r->path : "";
	 		$img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
			$img .= "<a target='_blank' class='thumbnail' href='". base_url() . $image ."'>";
			$img .= "<img class='img-responsive' src='". base_url() . $image ."'>";
			$img .= "</a></div>";
	 		$data = array_merge($this->profile()->get_about_detail(), 
	 					array("get_menu" => $this->menu->get_menu("header", "news"),
		 					"get_breadcrumb" => $this->menu->get_menu("breadcrumb", "news"),
		 					"get_news_category" => $this->get_news_category_list(),
		 					"get_archives_list" => $this->get_archives_list(),
		 					"nama_lengkap" => $q->nama_lengkap,
			 				"title" => $title,
			 				"tag" => $q->tag,
			 				"category" => $q->title_category,
			 				"status" => $q->status,
			 				"summary" => $q->summary,
			 				"image" => $img, 
			 				"created_date" => $q->created_date
		     		));

	 		$this->generate('news/read_news', $data);
		} 
	}
}