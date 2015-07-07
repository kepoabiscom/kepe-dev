<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'controllers/comment.php'); 

class Article extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('archives_model','', true);
		$this->load->model('article_model','', true);
		$this->load->model('category_article_model','', true);
		$this->load->library("parser");
		$this->load->library("menu");
		$this->load->library("pagination");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$keyword = array(
			'year' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'month' => $this->uri->segment(4) ? $this->uri->segment(4) : 0,
			'category' => $this->uri->segment(5) ? $this->uri->segment(5) : 0
		);
		
		$config = $this->table_pagination($keyword);
		
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "article"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "article"),
			'get_article' => $this->get_article_list($config['start'], $config['per_page'], $keyword),
			'get_article_category' => $this->get_article_category_list(),
			'get_archives_list' => $this->get_archives_list(),
			'page' => $config['page']
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$this->generate('article/article', $data);
	}

	public function generate($view, $content = array())
	{
		$data = array(
			'slider' => NULL,
			'map' => NULL,
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}
	
	public function get_article_list($start=0, $limit=10, $keyword=array()){
		include("home.php");
		
		$obj = new Home();

		$query = $this->article_model->get_article_list(1, $start, $limit, $keyword);
		
		if($query != NULL){
			$i = 0;
			foreach ($query->result() as $q)
			{
				$path = !isset($q->path_image) ? "" : $q->path_image;
				$title = !isset($q->title) ? "" : $q->title;
				$article_id = !isset($q->article_id) ? "" : $q->article_id;
				$read_more = base_url("article/read/" .  $article_id . "/" . $obj->slug($title) . "");
				
				$year = !isset($q->year) ? 0 : $q->year;
				$month = !isset($q->month) ? 0 : $q->month;
				$day = !isset($q->day) ? 0 : $q->day;
				
				$article_id = !isset($q->article_id) ? "" : $q->article_id;
				$read_more = base_url("article/read/" .  $year.'/'.$month.'/'.$day.'/'.$article_id . "/" . $this->slug($title) . "");
					
				$img = "<a target='_blank' href='". base_url($path) ."'>";
				$img .= "<img class='img-responsive thumbnail' src='". base_url($path) ."' alt='".$title."'/>";
				$img .= "</a>";
				
				$data[$i] = array(
					"article_id" => $article_id,
					"article_category_id" => !isset($q->article_category_id) ? "" : $q->article_category_id,
					"image_id" => !isset($q->image_id) ? "" : $q->image_id,
					"title" => "<h5><a href='" . $read_more . "'>".$title."</a></h5>",
					"summary" => !isset($q->summary) ? "" : $q->summary,
					"full_name" => !isset($q->nama_lengkap) ? "" : $q->nama_lengkap,
					"created_date" => !isset($q->created_date) ? "" : $q->created_date,
					"image" => $img,
					"category" => !isset($q->category) ? "" : $q->category,
				 );
				 
				 $i++;
			}
		}
		else{
			$data = NULL;
		}
		
 		return $data;
	}
	
	public function get_article_category_list() {
		$query = $this->category_article_model->get_category(1);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$title = !isset($q->title) ? "" : $q->title;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='".base_url('article/page/0/0/'.$title)."'>".$title." (".$total.")</a></li>";
			
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
		
		$query = $this->archives_model->get_archives_list($table);

		$i = 0;
		foreach ($query->result() as $q)
		{
			$month = !isset($q->month) ? "" : $q->month;
			$m = !isset($q->m) ? "" : $q->m;
			$year = !isset($q->year) ? "" : $q->year;
			$total = !isset($q->total) ? "" : $q->total;
			
			$list = "<li><a href='".base_url('article/page/'.$year.'/'.$m.'/0')."'>".$month." ".$year." (".$total.")</a></li>";
			
			$data[$i] = array(
				"list" => $list
			 );
			 
			 $i++;
		}

 		return $data;
	}

	function read($year, $month, $day, $id, $slug) {
		$q = $this->article_model->get_by_id($id);
		$r = $this->article_model->get_image($id);
		
		$comment = new Comment();

		$title = $q->title_article;
		if(strtolower(preg_replace('/\s/', '_', $title)) === $slug) {
			$image = ($r != false) ? $r->path : "";
			
			$url_share = base_url("article/read/" .  $year.'/'.$month.'/'.$day.'/'.$id . "/" . $this->slug($title) . "");
			$img = "<a target='_blank' class='thumbnail' href='". base_url() . $image ."'>";
			$img .= "<img class='img-responsive' src='". base_url() . $image ."'>";
			$img .= "</a>";
	 		$data = array_merge($this->profile()->get_about_detail(), 
	 					array("get_menu" => $this->menu->get_menu("header", "article"),
		 					"get_breadcrumb" => $this->menu->get_menu("breadcrumb", "article"),
		 					"get_article_category" => $this->get_article_category_list(),
		 					"get_archives_list" => $this->get_archives_list(),
		 					"full_name" => $q->nama_lengkap,
			 				"title" => $title,
			 				"tag" => $q->tag,
			 				"title_category" => "<a href='#'>".$q->title_category."</a>",
			 				"status" => $q->status,
			 				"summary" => $q->summary,
			 				"image" => $img, 
			 				"url" => $url_share,
			 				"og_image" => base_url($image),
			 				"created_date" => $q->created_date,
			 				"get_comment" => $comment->get_comment("article", $id),
			 				"n1" => $comment->random_set_captcha(0),
			 				"op" => $comment->random_set_captcha(),
			 				"n2" => $comment->random_set_captcha(0),
			 				"article_id" => $id
		     		));

	 		$this->generate('article/read_article', $data);
		} 
	}

	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}

	function slug($str='') {
		return strtolower(preg_replace('/\s/', '-', $str));
	}
	
	function page() {
	 	$this->index();	
	 }
	 
	function table_pagination($keyword){
		$config['base_url'] = base_url("article/page/".$keyword['year'] ."/".$keyword['month'].'/'.$keyword['category']);
		$config['per_page'] = 2;
		$config['total_rows'] = $this->article_model->count_article(1, $keyword);
		$config['uri_segment'] = 6;
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
		
		$this->pagination->create_links();
		return $config;
	}
}