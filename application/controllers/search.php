<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model("search_model");
		$this->load->library("parser");
		$this->load->library("menu");
		//$this->load->library("pagination");
	}

	function index() {
		$q = $this->input->get("q");
		$type = $this->input->get("type");
		$data = array(
			'get_menu' => $this->menu->get_menu("header", ""),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", ""),
			'get_search' => $this->result($type, $q),
			"q" => $q,
			"tab_search" => $this->tab_search($type),
			'page' => ""
		);
		
		$data = array_merge($this->profile()->get_about_detail(), $data);
		
		$this->generate('search', $data);	
		
	}
	
	public function generate($view, $content = array()) {
		$data = array(
			"slider" => NULL,
			"map" => NULL,
			"header" => $this->parser->parse('templates/header', $content, true), 
			"content" => $this->parser->parse($view, $content, true),
			"footer" => $this->parser->parse('templates/footer', $content, true) 
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}

	function result($type='article', $q) {
		$start = 0; $limit = 10;
		$result = $this->search_model->get($type, $q, $start, $limit);
		
		if($result == false || $q == null) {
			return array(array(	"title" => "",
				"summary" => "",
				"url" => "",
				"no_result" => "<h2>No result</h2>."
			));
		} else {
			foreach($result as $row) {
				$date = explode(" ", $row->created_date);
				$y = explode("-", $date[0]);
				$m = explode("-", $date[0]);
				$d = explode("-", $date[0]);

				if($type == 'article') 
					$url = base_url("article/read/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->article_id . "/" . $this->slug($row->title) . "");
				if($type == 'news') 
					$url = base_url("news/read/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->news_id . "/" . $this->slug($row->title) . "");
				if($type == 'video')
					$url = base_url('videografi/view/'.$y[0].'/'.$m[1].'/'.$d[2].'/'.$row->video_id.'/'. $this->slug($row->title));
				
				$data[] = array(
					"title" => $this->get_highlight($row->title, $q),
					"summary" => ($type != 'video') ? $this->get_highlight($row->summary, $q) : $this->get_highlight($row->description, $q),
					"url" => $url,
					"no_result" => ""
				);
			}
		}
		
		return $data;
	}

	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}

	function slug($str='') {
		return strtolower(preg_replace('/\s/', '-', $str));
	}

	function get_highlight($text, $q) {
    	$c = substr_count(strtolower($text), strtolower($q));
	    $new_text = $text;
	    $match = array();
	 
	    for($i=0; $i < $c; $i++) {
	        $match[$i] = stripos($text, $q, $i);
	        $match[$i] = substr($text, $match[$i], strlen($q));
	        $new_text = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($new_text));
	    }
	 
	   	$new_text = str_replace('[#]', '<span style="color:#daa732;">', $new_text);
	    $new_text = str_replace('[@]', '</span>', $new_text);
	    
	    return $new_text;
	}

	function tab_search($type='article') {
		$arr = array("Article", "News", "Video");
		$qry_str = $_SERVER['QUERY_STRING'];
		$q = explode("&", $qry_str);
		$class = array_fill(0, count($arr), '');
		$href = array_fill(0, count($arr), '');
        $j = 0;
        foreach($arr as $i) {
            if(strtolower($i) == $type) {
                $class[$j] = 'btn btn-primary';
                $href[$j] = '';
            } else {
            	$class[$j] = 'btn btn-default';
            	$href[$j] = base_url()."search?".$q[0] ."&type=". strtolower($i);
            }
            $j++;
        }
		
		$data = array(
					array("tab" => "<a href='".$href[0]."' class='".$class[0]."''>".$arr[0]."</a>"),		
		 			array("tab" => "<a href='".$href[1]."' class='".$class[1]."''>".$arr[1]."</a>"),
		 			array("tab" => "<a href='".$href[2]."' class='".$class[2]."''>".$arr[2]."</a>")
		 		);
	
		return $data;
	}
}