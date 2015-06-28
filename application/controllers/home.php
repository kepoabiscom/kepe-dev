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
	}

	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data['get_menu'] = $this->menu->get_menu("header", "home");
		$data['get_breadcrumb'] = $this->menu->get_menu("breadcrumb", "home");
		$data['get_video'] = $this->get_video();
		$data['get_article'] = $this->get_article();
		$data['get_news'] = $this->get_news();

		$this->generate('home', $data);
	}
	
	public function generate($view, $content = array())
	{
		$data['header']  = $this->parser->parse('templates/header', $content, TRUE);
		$data['slider']  = $this->parser->parse('templates/slider', $content, TRUE);
		$data['content']  = $this->parser->parse($view, $content, TRUE);
		$data['footer']  = $this->parser->parse('templates/footer', $content, TRUE);
		
		$this->parser->parse('index', $data);
	}
	
	
	public function get_news(){
		$query = $this->home_model->get_recent_news();

		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$img = "<a target='_blank' class='thumbnail' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."'/>";
			$img .= "</a>";
			
			$data[$i] = array(
				"article_id" => !isset($q->news_id) ? "" : $q->news_id,
				"article_category_id" => !isset($q->news_category_id) ? "" : $q->news_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => "<a href='#'>".$title."</a>",
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
	
	public function get_article(){
		$query = $this->home_model->get_recent_article();
		
		$i = 0;
		if ($query != false) {
			foreach ($query->result() as $q)
			{
				$path = !isset($q->path_image) ? "" : $q->path_image;
				$title = !isset($q->title) ? "" : $q->title;
				
				$img = "<a target='_blank' class='thumbnail' href='". base_url($path) ."'>";
				$img .= "<img class='img-responsive' src='". base_url($path) ."' alt='".$title."'/>";
				$img .= "</a>";
				
				$data[$i] = array(
					"article_id" => !isset($q->article_id) ? "" : $q->article_id,
					"article_category_id" => !isset($q->article_category_id) ? "" : $q->article_category_id,
					"image_id" => !isset($q->image_id) ? "" : $q->image_id,
					"title" => "<a href='#'>".$title."</a>",
					"summary" => !isset($q->summary) ? "" : $q->summary,
					"full_name" => !isset($q->nama_lengkap) ? "" : "By <a href='#''>" . $q->nama_lengkap . "</a>",
					"created_date" => !isset($q->created_date) ? "" : $q->created_date,
					"image" => $img,
					"category" => !isset($q->category) ? "" : "Category : " . $q->category,
					"no_recent_art" => ""
				 );
				 
				 $i++;
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
		
		$i = 0;
		foreach ($query->result() as $q)
		{
			$path = !isset($q->path_image) ? "" : $q->path_image;
			$title = !isset($q->title) ? "" : $q->title;
			
			$img = "<a target='_blank' href='". base_url($path) ."'>";
			$img .= "<img class='img-responsive' width='536px' src='". base_url($path) ."' alt='".$title."' style='float: right; margin-top: 20px;'/>";
			$img .= "</a>";
			
			$data[$i] = array(
				"video_id" => !isset($q->video_id) ? "" : $q->video_id,
				"video_category_id" => !isset($q->video_category_id) ? "" : $q->video_category_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"title" => $title,
				"description" => !isset($q->description) ? "" : $q->description,
				"path_video" => !isset($q->path_video) ? "" : $q->path_video,
				"duration" => !isset($q->duration) ? "" : $q->duration,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"image" => $img,
				"category" => !isset($q->category) ? "" : $q->category,
			 );
			 
			 $i++;
		}

 		return $data;
	}
}
