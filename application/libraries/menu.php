<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {

    public function get_menu($q='header', $menu='') {

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
        if($q == "header") {
            $d = array(
                    array("name" => "HOME", "active" => $active[0], "url" => base_url('home')),
                    array("name" => "NEWS", "active" => $active[1], "url" => base_url('news')),
                    array("name" => "ARTICLE", "active" => $active[2], "url" => base_url('article')),
                    array("name" => "VIDEOGRAFI", "active" => $active[3], "url" => base_url('videografi')),
                    array("name" => "CONTACT", "active" => $active[4], "url" => base_url('contact'))
                );
        } else {
            $d = array(
                    array(
                       "home" => base_url('home'),
                       "news" => base_url('news'),
                       "article" => base_url('article'),
                       "videografi" => base_url('videografi'),
                       "contact" => base_url('contact'),
                       "membershipform" => '#',
                       "membership" => '#',
                       "organization" => '#',
                       "history" => '#'
                   ));
        }

    	return $d; 
		
	}
}