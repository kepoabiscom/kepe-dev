<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_common {
	function get_list_tag($tag, $type='list'){
		$x = explode(',', $tag);
		
		$list = "";
		for($i=0; $i<count($x); $i++){
			$q = trim($x[$i]);

			$array = explode(' ', $q);

			$y = array();
			for($j=0; $j<count($array); $j++){
				$y[$j] = ucfirst(trim($array[$j]));
			}

			$t = implode(" ", $y);
			
			if($type == 'btn'){
				$z[$i] = "<a class='btn btn-primary' href='".base_url('search?q='.$q.'&type=article')."'>".$t."</a>";
			}
			else{
				$z[$i] = "<a href='".base_url('search?q='.$q.'&type=article')."'>".$t."</a>";
			}
		}
		
		$list = ($type == 'btn') ? implode(" ", $z) : implode(", ", $z);
		
		return $list;
	}
}