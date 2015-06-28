<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->model("about_model");
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library("menu");
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data = $this->get_about_detail();
		$data['get_menu'] = $this->menu->get_menu("header", "contact");
		$data['get_breadcrumb'] = $this->menu->get_menu("breadcrumb", "contact");
		
		$this->generate('contact', $data);
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
	
	function get_about_detail() {
		$q = $this->about_model->get_detail();
		
	    $logo = !isset($q->logo) ? "" : $q->logo;
	    $img = "<div class='col-lg-4 col-md-6 col-xs-6 thumb'>";
		$img .= "<a target='_blank' class='thumbnail' href='". base_url() . "assets/img/" . $logo ."'>";
		$img .= "<img class='img-responsive' src='". base_url() . "assets/img/" . $logo ."'>";
		$img .= "</a></div>";
		
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
			"description" => !isset($q->description) ? "" : $q->description,
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
	 		"background_color" => !isset($q->background_color) ? "" : $q->background_color,
	 		"created_year" => $created_year,
	 		"version" => !isset($q->version) ? "" : $q->version,
	 		"contact_footer" => "<a href='".base_url('home')."'>".$site_name."</a> &copy; ".$created_year." - ".date('Y')."<br>Haamill Productions<br>".$contact_address.", ".$contact_city." ".$contact_zip."<br>".$contact_country."<br><p>Phone: ".$contact_phone."<br>Email: <a href='mailto:#'>".$contact_email_address_first."</a></p>",
	 		"footer" => !isset($q->footer) ? "" : $q->footer, 
	 		"user_id" => !isset($q->user_id) ? "" : $q->user_id,
	 		"logo_image" => $img,
	 		"logo_name" => $logo, 
	 		"setting_id" => !isset($q->setting_id) ? "" : $q->setting_id
	     );
		 
 		return $data;
	}
}