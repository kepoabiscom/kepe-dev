<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('db_model','',true);
		$this->load->library("parser");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data['get_menu'] = $this->get_menu();
		$data['get_news'] = $this->get_news_list();
		$data['get_news_category'] = $this->get_news_category_list();
		$data['get_archives_list'] = $this->get_archives_list();
		
		$this->generate('news', $data);
	}
	
	public function generate($view, $content = array())
	{
		$data['slider'] = "";
		$data['header']  = $this->parser->parse('header', $content, TRUE);
		$data['content']  = $this->parser->parse($view, $content, TRUE);
		$data['footer']  = $this->parser->parse('footer', $content, TRUE);
		
		$this->parser->parse('index', $data);
	}
	
		public function get_menu(){
		$data['menu'] = array(
			"home" => base_url('home'),
			"news" => base_url('news'),
			"article" => base_url('article'),
			"videografi" => base_url('videografi'),
			"contact" => base_url('contact'),
			"membershipform" => '#',
			"membership" => '#',
			"organization" => '#',
			"history" => '#'
		);
		
		return $data;
	}
	
	public function get_news_list($start=0, $limit=10){
		$query = $this->db_model->get_news_list($start, $limit);

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
		$query = $this->db_model->get_news_category_list();

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
		
		$query = $this->db_model->get_archives_list($table);

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
}