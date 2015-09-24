<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("about_model");
		$this->load->model("user_model");
		$this->load->model("image_model");
		$this->load->model("divisi_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library("global_common");
		$this->load->library("menu");
	}

	/**
	 * Index Page for this controller.
	 */
	 
	 public function index()
	{
		$data = array_merge(
			$this->get_about_detail(), 
			$this->global_header()
		);
		
		$data['title'] = 'About';
		$data['get_content_static'] = $this->get_static_content_multi(NULL, $this->about_model->get_static_content());
		$data['author'] = 'Administrator';
		$data['url'] = base_url('about');
		$data['meta_tag'] = "Kepo ".$data['title'].", kepoabis, Kepo Abis, Kepo, Abis, ".$data['site_name'].", ".$data['tagline'];
		$data['meta_description'] = strip_tags($data['site_description']);
		$data['og_image'] = base_url('assets/img/'.$data['logo_name']);
		
		$this->generate('about/about', $data);
	}
	
	public function global_header(){
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "about"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "about")
		);
		
		return $data;
	}

	function page() {
	 	if(! $this->uri->segment(3)) {
	 		redirect("about/page/history");
	 	} else {
			if(! $this->uri->segment(4)) {
				$data = array_merge(
					$this->get_about_detail(), 
					$this->global_header(),
					$this->read($this->uri->segment(3))
				);
				
				$data['author'] = 'Administrator';
				$data['url'] = base_url('about/page/' .  $this->uri->segment(3));
				$data['meta_tag'] = strip_tags($data['meta_tag']);
				$data['og_image'] = base_url('assets/img/'.$data['logo_name']);
			}
			else{
				$data = array_merge(
					$this->get_about_detail(), 
					$this->global_header(),
					$this->read_divisi($this->uri->segment(3), $this->uri->segment(4))
				);

				$data['author'] = $data['full_name'];
				$data['url'] = base_url('about/page/organization/' .  $this->uri->segment(4));
				$data['meta_tag'] = "Kepo ".$data['title'].", kepoabis, Kepo Abis, Kepo, Abis, " . $data['keyword'];
				$data['meta_description'] = strip_tags($data['body']);
				$data['get_divisi'] = $this->get_divisi($this->uri->segment(3), $this->uri->segment(4));
			}
			
			$this->generate('about/static_content', $data);
	 	}
	 }

	public function read_divisi($parameter, $divisi_id){
		$q = $this->divisi_model->get_by_id($divisi_id);
		
		if($q == null) show_404();
		else {
			$title = !isset($q->title) ? "" : $q->title;
			$tag = !isset($q->tag) ? "" : $q->tag;
			$image_id =  !isset($q->image_id) ? "" : $q->image_id;
			
			$image = $this->image_model->get_by_id($image_id) ? $this->image_model->get_by_id($image_id) : "";
			
	 		$data = array(
				"membership_list" => ($parameter != NULL) ? $this->get_list($parameter, 0, 100) : "",
				"static_content_id" => !isset($q->divisi_id) ? "" : $q->divisi_id,
				"user_id" => !isset($q->user_id) ? "" : $q->user_id,
				"image_id" => $image_id,
		 		"title" => $title, 
				"keyword" => $tag,
				"tag" => $this->global_common->get_list_tag($tag),
		 		"parameter" => "",
		 		"summary" => !isset($q->summary) ? "" : $q->summary,
		 		"body" => !isset($q->body) ? "" : $q->body,
		 		"status" => !isset($q->status) ? "" : $q->status,
		 		"created_date" => !isset($q->created_date) ? "" : $q->created_date,
		 		"modified_date" => !isset($q->modified_date) ? "" : $q->modified_date,
		 		"full_name" => !isset($q->full_name) ? "" : $q->full_name,
				"image" => "<p><img src='" . base_url($image->path) . "'</p>",
				"og_image" => base_url($image->path)
		     ); 	 
			 return $data;
		}
	}
	
	public function get_divisi($parameter, $video_id){
		$query = $this->divisi_model->get_divisi_list();
		
		if($parameter == "organization" && empty($video_id)){
			$i = 0;		
			
			foreach ($query->result() as $q){
				$divisi_id = !isset($q->divisi_id) ? "" : $q->divisi_id;
				$title = !isset($q->title) ? "" : $q->title;
				$tag = !isset($q->tag) ? "" : $q->tag;					
				$image_id =  !isset($q->image_id) ? "" : $q->image_id;
		
				$image = $this->image_model->get_by_id($image_id) ? $this->image_model->get_by_id($image_id) : "";
				
				$read_more = base_url("about/page/organization/" . $divisi_id . "/" . $this->slug($title));
				
				$data[$i] = array(
					"divisi_id" => $divisi_id,
					"sub_title" => $title,
					"sub_tag" => $tag,
					"sub_summary" => !isset($q->summary) ? "" : $q->summary,
					"sub_body" => !isset($q->body) ? "" : $q->body,
					"sub_read_more" => "<a class='btn btn-primary' href='" . $read_more . "'>Read More</a>",
					"sub_image" => "<p><img width=150px src='" . base_url($image->path) . "'</p>"
				 ); 
				 
				 $i++;
			}
		}else{
			$data[] = array(
					"divisi_id" => "",
					"sub_title" => "",
					"sub_tag" => "",
					"sub_summary" => "",
					"sub_body" => "",
					"sub_read_more" => "",
					"sub_image" => ""
				 ); 
		}

		return $data;
	}
	
	function slug($str='', $maxlen=0) {
		//$s = strtolower(preg_replace('/[\!\@\+\=\}\{\-\?\-\/\&\%\#\,\.\)\(\$]/', '', $str));
		//return strtolower(preg_replace('/[\s]/', '-', $s));
		return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($str)), '-');
	}
	
	public function read($parameter) {
		$q = $this->about_model->get_static_content($parameter);
		
		$data = $this->get_static_content_single($parameter, $q);
		
		$data['meta_tag'] = "Kepo ".$data['title'].", kepoabis, Kepo Abis, Kepo, Abis, " . $data['keyword'];
		$data['meta_description'] = strip_tags($data['body']);
		$data['get_divisi'] = $this->get_divisi($parameter, $this->uri->segment(4));
		
 		return $data;
	}
	
	public function get_static_content_single($parameter, $q){
		$title = !isset($q->title) ? "" : $q->title;
		$tag = !isset($q->tag) ? "" : $q->tag;
		
 		$data = array(
			"membership_list" => ($parameter != NULL) ? $this->get_list($parameter, 0, 100) : "",
			"static_content_id" => !isset($q->static_content_id) ? "" : $q->static_content_id,
			"user_id" => !isset($q->user_id) ? "" : $q->user_id,
			"image_id" => !isset($q->image_id) ? "" : $q->image_id,
	 		"title" => $title, 
			"keyword" => $tag,
			"tag" => $this->global_common->get_list_tag($tag),
	 		"parameter" => !isset($q->parameter) ? "" : $q->parameter,
	 		"summary" => !isset($q->summary) ? "" : $q->summary,
	 		"body" => !isset($q->body) ? "" : $q->body,
	 		"status" => !isset($q->status) ? "" : $q->status,
	 		"created_date" => !isset($q->created_date) ? "" : $q->created_date,
	 		"modified_date" => !isset($q->modified_date) ? "" : $q->modified_date,
	 		"full_name" => !isset($q->full_name) ? "" : $q->full_name,
			"image" => ""
	     ); 
		 
		 return $data;
	}
	
	public function get_static_content_multi($parameter, $query){
		$i = 0;
		
		foreach ($query->result() as $q){
			$title = !isset($q->title) ? "" : $q->title;
			$tag = !isset($q->tag) ? "" : $q->tag;
			$parameter =  !isset($q->parameter) ? "" : $q->parameter;
			
			$read_more = base_url("about/page/" . $parameter);
			
			$data[$i] = array(
				"membership_list" => ($parameter != NULL) ? $this->get_list($parameter, 0, 100) : "",
				"static_content_id" => !isset($q->static_content_id) ? "" : $q->static_content_id,
				"user_id" => !isset($q->user_id) ? "" : $q->user_id,
				"image_id" => !isset($q->image_id) ? "" : $q->image_id,
				"sub_title" => $title, 
				"keyword" => $tag,
				"tag" => $this->global_common->get_list_tag($tag),
				"parameter" => $parameter,
				"read_more" => "<a class='btn btn-primary' href='" . $read_more . "'>Read More</a>",
				"summary" => !isset($q->summary) ? "" : $q->summary,
				"body" => !isset($q->body) ? "" : $q->body,
				"status" => !isset($q->status) ? "" : $q->status,
				"created_date" => !isset($q->created_date) ? "" : $q->created_date,
				"modified_date" => !isset($q->modified_date) ? "" : $q->modified_date,
				"full_name" => !isset($q->full_name) ? "" : $q->full_name,
				"image" => ""
			 ); 
			 
			 $i++;
		}
		
		 return $data;
	}
	
	public function get_about_detail() {
		$q = $this->about_model->get_detail();
		
	    $logo = !isset($q->logo) ? "" : $q->logo;
	    $img = "<img  class='img-responsive' alt='' src='". base_url() . "assets/img/" . $logo ."'>";

		$image = !isset($q->content_image) ? "" : $q->content_image;
		$content_image = "<div class='pull-right col-lg-4 col-md-6 col-xs-6 thumb'>";
		$content_image .= "<a target='_blank' class='thumbnail' href='". base_url() . "assets/img/" . $image ."'>";
		$content_image .= "<img class='img-responsive' src='". base_url() . "assets/img/" . $image ."'>";
		$content_image .= "</a></div>";
		
		$site_name = !isset($q->title) ? "" : $q->title;
		$tagline = !isset($q->tagline) ? "" : $q->tagline;
	 	$contact_address = !isset($q->contact_address) ? "" : $q->contact_address;
	 	$contact_phone = !isset($q->contact_phone) ? "" : $q->contact_phone;
	 	$contact_email_address_first = !isset($q->contact_email_address_first) ? "" : $q->contact_email_address_first;
	 	$contact_city = !isset($q->contact_city) ? "" : $q->contact_city;
	 	$contact_zip = !isset($q->contact_zip) ? "" : $q->contact_zip;
	 	$contact_country = !isset($q->contact_country) ? "" : $q->contact_country;
	 	$created_year = !isset($q->created_year) ? "" : $q->created_year;
			
 		$data = array(
			"site_name" => $site_name,
			"tagline" => $tagline,
			"site_description" => !isset($q->description) ? "" : $q->description,
	 		"contact_address" => $contact_address,
	 		"contact_phone" => $contact_phone,
	 		"contact_phone_mobile_first" => !isset($q->contact_phone_mobile_first) ? "" : $q->contact_phone_mobile_first,
	 		"contact_phone_mobile_second" => !isset($q->contact_phone_mobile_second) ? "" : $q->contact_phone_mobile_second,
	 		"contact_email_address_first" => $contact_email_address_first,
	 		"contact_email_address_second" => !isset($q->contact_email_address_second) ? "" : $q->contact_email_address_second,
	 		"contact_fax" => !isset($q->contact_fax) ? "" : $q->contact_fax,
	 		"contact_lat" => !isset($q->contact_lat) ? "" : $q->contact_lat,
	 		"contact_long" => !isset($q->contact_long) ? "" : $q->contact_long,
	 		"contact_city" => $contact_city,
	 		"contact_state" => !isset($q->contact_state) ? "" : $q->contact_state,
	 		"contact_zip" => $contact_zip,
	 		"contact_country" => $contact_country,
	 		"contact_facebook" => !isset($q->contact_facebook) ? "" : $q->contact_facebook,
	 		"contact_twitter" => !isset($q->contact_twitter) ? "" : $q->contact_twitter,
	 		"contact_googleplus" => !isset($q->contact_googleplus) ? "" : $q->contact_googleplus,
	 		"contact_youtube" => !isset($q->contact_youtube) ? "" : $q->contact_youtube,
	 		"contact_instagram" => !isset($q->contact_instagram) ? "" : $q->contact_instagram,
	 		"contact_path" => !isset($q->contact_path) ? "" : $q->contact_path,
	 		"contact_askfm" => !isset($q->contact_askfm) ? "" : $q->contact_askfm,
	 		"content_title" => !isset($q->content_title) ? "" : $q->content_title,
	 		"content_body" => !isset($q->content_body) ? "" : $q->content_body,
	 		"content_mission" => !isset($q->content_mission) ? "" : $q->content_mission,
	 		"content_image" => $content_image,
	 		"background_color" => !isset($q->background_color) ? "" : $q->background_color,
	 		"created_year" => $created_year,
	 		"version" => !isset($q->version) ? "" : $q->version,
	 		"contact_footer" => "<a href='".base_url('home')."'>".$site_name."</a> &copy; ".$created_year." - ".date('Y')."<br>Haamill Productions<br><br><i class='glyphicon glyphicon-road'></i>&nbsp;".$contact_address.", ".$contact_city." ".$contact_zip."<br><i class='glyphicon glyphicon-map-marker'></i>&nbsp;".$contact_country."<br><br><p><i class='glyphicon glyphicon-phone'></i>&nbsp;Phone: ".$contact_phone."<br><i class='glyphicon glyphicon-envelope'></i>&nbsp;Email: <a href='mailto:#'>".$contact_email_address_first."</a></p>",
	 		"footer" => !isset($q->footer) ? "" : $q->footer, 
	 		"user_id" => !isset($q->user_id) ? "" : $q->user_id,
	 		"logo_image" => $img,
	 		"logo_name" => $logo, 
	 		"setting_id" => !isset($q->setting_id) ? "" : $q->setting_id,
	 		"team" => base_url('about/page/team'),
	 		"bts" => base_url('about/page/behind-the-scene'),
	 		"organization" => base_url('about/page/organization'),
	 		"history" => base_url('about/page/history'),
	     ); 
		
 		return $data;
	}
	
	public function generate($view, $content = array())
	{
		$data = array(
			'slider' => $this->menu->get_page_title($content['title']),
			'map' => NULL,
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}
	
	 function get_list($parameter, $start, $limit) {
	 	if($parameter == "team" || $parameter == "behind-the-scene"){
	 		$result = ($parameter == "team") ? $result = $this->user_model->get_user_list($start, $limit, 1) : $result = $this->image_model->get_bts('behindscene', 0);
			
			$count = count($result);
			
			$data_array = ""; $i = 1;
			$number = 0; $parenthesis = 1;

			if($result) {
				foreach($result as $row) {
					$number =  $start + $i;
					$open_parenthesis =  ($parenthesis % 6 == 1) ? "<div class='col-md-12'><div class='row'>" : "";
					$closing_parenthesis = ($parenthesis == $count && $count % 6 != 0) ? "</div></div>" : ($parenthesis % 6 == 0) ? "</div></div>" : "";
					
					$date_of_birth = !isset($row->date_of_birth) ? "" : $row->date_of_birth;
					$box = (substr($date_of_birth, 5, 5) == date("m-d")) ? 'background-color: #009688; border-radius: 4px; color: #fff; padding: 5px;' : 'margin-bottom: 20px;';

					$brithday =  (substr($date_of_birth, 5, 5)  == date("m-d")) ? "Friends' Birthdays" : "";
					
					$data[] = array(
						"number" => $number,
						"uid" => ($parameter == "team") ? $row->user_id : "",
						"nama_lengkap" => ($parameter == "team") ? $row->nama_lengkap : "",
						"body" => $row->body,
						"img" => ($parameter == "team") ? $row->image : base_url() . "assets/img/bts/" . $row->path,
						"position" => ($parameter == "team") ? $row->position : "",
						"thumbnail" => "thumbnail",
						"default" =>  ($parameter == "team") ? 'http://res.cloudinary.com/kepoabis-com/image/upload/v1437144062/default.jpg' : base_url('assets/img/default-image.png'),
						"open_parenthesis" => $open_parenthesis,
						"closing_parenthesis" => $closing_parenthesis,
						"box" => $box,
						"brithday" => $brithday
					);

					$i++; $parenthesis++;
				}
				return $data;
			} else return;
		} else if($parameter == "membership"){
			redirect("about/page/team", 'refresh');
		} else if ($parameter == "organization" || $parameter == "history"){
			$data[] = array(
				"number" => "",
				"uid" => "",
				"nama_lengkap" => "",
				"body" => "",
				"img" => "",
				"position" => "",
				"thumbnail" => "",
				"default" => "",
				"open_parenthesis" => "",
				"closing_parenthesis" => "",
				"box" => "",
				"brithday" => ""
			);
	
			return $data;
		}
		else{
			redirect("home", 'refresh');
		}
	 }
}