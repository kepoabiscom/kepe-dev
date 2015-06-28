<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('db_model','', true);
		$this->load->library("parser");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data['get_menu'] = $this->get_menu();
		$data['get_article'] = $this->get_article_list();
		$data['get_article_category'] = $this->get_article_category_list();
		$data['get_archives_list'] = $this->get_archives_list();
		
		$this->generate('article', $data);
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
	
	public function get_article_list($start=0, $limit=10){
		$query = $this->db_model->get_article_list($start, $limit);
		
		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$img = "<a target='_blank' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive thumbnail' src='". base_url($path) ."' alt='".$title."'/>";
			$img .= "</a>";
			
			$data[$i] = array(
				"article_id" => !isset($q->article_id) ? "" : $q->article_id,
				"article_category_id" => !isset($q->article_category_id) ? "" : $q->article_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => "<h5><a href='#'>".$title."</a></h5>",
				"summary" => !isset($q->summary) ? "" : $q->summary,
				"full_name" => !isset($q->nama_lengkap) ? "" : $q->nama_lengkap,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"category" => !isset($q->category) ? "" : $q->category,
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_article_category_list() {
		$query = $this->db_model->get_article_category_list();

		$i = 0;
		foreach ($query->result() as $q)
		{
			$title = !isset($q->title) ? "" : $q->title;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='#'>".$title." (".$total.")</a></li>";
			
			$data[$i] = array(
				"artcile_category_id" => !isset($q->artcile_category_id) ? "" : $q->artcile_category_id,
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}
	
	public function get_archives_list() {
		$table = "article";
		
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