<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {

    public function get_menu($menu='') {

    	$data = array('home', 'news', 'article', 'videografi', 'contact');
        $active = array_fill(0, count($data), '');
        $j = 0;
        foreach($data as $i) {
            if($i == $menu) {
                $active[$j] = 'active';
                break;
            }
            $j++;
        }

    	return array(
			array("name" => "HOME", "active" => $active[0], "url" => base_url('home')),
			array("name" => "NEWS", "active" => $active[1], "url" => base_url('news')),
			array("name" => "ARTICLE", "active" => $active[2], "url" => base_url('article')),
			array("name" => "VIDEOGRAFI", "active" => $active[3], "url" => base_url('videografi')),
			array("name" => "CONTACT", "active" => $active[4], "url" => base_url('contact'))
			
		);
		
	}
}