<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {

    public function get_menu($q='header', $menu='') {

    	$data = array('home', 'news', 'article', 'video', 'contact', 'about');
        $active = array_fill(0, count($data), '');
        $j = 0;
        foreach($data as $i) {
            if($i == $menu) {
                $active[$j] = 'active';
                break;
            }
            $j++;
        }
        if($q == "header") {
            $d = array(
                    array("name" => "HOME", "active" => $active[0], "url" => base_url('home')),
                    array("name" => "NEWS", "active" => $active[1], "url" => base_url('news')),
                    array("name" => "ARTICLE", "active" => $active[2], "url" => base_url('article')),
                    array("name" => "VIDEO", "active" => $active[3], "url" => base_url('video')),
                    array("name" => "CONTACT US", "active" => $active[4], "url" => base_url('contact')),
                );
        } else {
            $d = array(
                    array(
                       "home" => base_url('home'),
                       "news" => base_url('news'),
                       "article" => base_url('article'),
                       "video" => base_url('video'),
                       "contact" => base_url('contact'),
                       "about" => base_url('about'),
                       "membershipform" => '#',
                       "team" => base_url('about/page/team'),
                       "bts" => base_url('about/page/behind-the-scene'),
                       "organization" => base_url('about/page/organization'),
                       "history" => base_url('about/page/history'),
                   ));
        }

    	return $d; 
		
	}
	
	public function get_page_title($title = "") {
    if($title != "Home" && $title != "News" && $title != "Article" && $title != "Video" && $title != "Contact Us" && $title != "About")
  		return "<div id='page-title'>
  						<div class='container'>
  						<div class='row'>
  							<div class='col-md-12'>
  								<h2 style='color:white; margin-bottom: 0px; margin-top: 0px;'>".$title."</h2>
  							</div>
  							</div>
  						</div>		
  					</div>";
    return "";
	}
}