<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_common {
	function get_list_tag($tag, $type='article', $mode='list'){
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
			
			if($mode == 'btn'){
				$z[$i] = "<a class='btn btn-primary' style='margin-bottom: 5px;' href='".base_url('search?q='.$q.'&type='.$type)."'>".$t."</a>";
			} 
			if($mode == 'list') {
				$z[$i] = "<a href='".base_url('search?q='.$q.'&type='.$type)."'>".$t."</a>";
			}
			if($mode == 'metadata') {
				return $tag;
			}
		}
		
		$list = ($mode == 'btn') ? implode(" ", $z) : implode(", ", $z);
		
		return $list;
	}
	
	function get_length_title($N, $text){
		$array = str_split($text,1);

		$length = strlen($text);
		
		$text = "";
		if($length <= $N){
			for ($i=0; $i < count($array); $i++) {
				$text .= $array[$i];
			}
		}
		else{
			for ($i=0; $i < $N; $i++) {
				$text .= $array[$i];
			}
		}

		return $text;
	}
}