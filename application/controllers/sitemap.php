<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "controllers/home.php");

date_default_timezone_set("Asia/Jakarta");

class Sitemap extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('sitemap_model','', true);
		$this->load->library("parser");
	}

	function index() {
		header('Content-type: application/xml; charset="ISO-8859-1"', true);
		echo "<?xml version='1.0' encoding='UTF-8'?>";

		$this->get_all_sitemap();
	}

	function get_all_sitemap() {
		$data_1 = $this->sitemap('article');
		$data_2 = $this->sitemap('news');
		$data_3 = $this->sitemap('video');

		$d = array_merge($data_1, $data_2);
		$data = array_merge($d, $data_3);
		$r = array(
					"get_sitemap" => $data
				);
		$this->parser->parse('/sitemap', $r);
	}

	function sitemap($t) {
		$result = $this->sitemap_model->get_url_sitemap($t);
		
		$home = new Home();

		if($result != false) {
			foreach($result as $row) {
				$date = explode(" ", $row->created_date);
				$y = explode("-", $date[0]);
				$m = explode("-", $date[0]);
				$d = explode("-", $date[0]);

				if($t == 'article')
					$url = base_url("article/read/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->article_id . "/" . $home->slug($row->title) . "");
				if($t == 'news')
					$url = base_url("news/read/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->news_id . "/" . $home->slug($row->title) . "");
				if($t == 'video')
					$url = base_url("videografi/view/" .  $y[0].'/'.$m[1].'/'.$d[2].'/'.$row->video_id . "/" . $home->slug($row->title) . "");
				
				$datetime = new DateTime($row->created_date);

				$data[] = array("loc" => $url,
								"lastmod" => $datetime->format('Y-m-d\TH:i:sP'),
								"priority" => 0.5
						);
			}
		}
		return $data;
	}
}