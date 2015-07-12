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
	
	function get_title($N, $text) {
		$array = str_split($text,1);
		
		$x = "";
		
		$length = strlen($text);
		
		if($length <= $N){
			for ($i=0; $i < count($array); $i++) {
				$x .= $array[$i];
			}
		}
		else{
			for ($i=0; $i < $N; $i++) {
				$x .= $array[$i];
			}
		}
		
		$word1 = explode(" ", $text);
		$word2 = explode(" ", $x);
		
		$text = "";
		for ($i=0; $i < count($word2); $i++) {
			if($word1[$i] == $word2[$i]){
				$text .= $word2[$i]." ";
			}
		}
		
		$length = strlen($x);
		
		$text = ($length >= $N) ? $text." ..." : $text;		
		return $text;
	}
	
	function stat($type_id, $id){
		$data = array(
			$type_id => $id,
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'request_time' => $_SERVER['REQUEST_TIME'],
			'memory_usage' => memory_get_usage(true),
			'created_date' => date("Y-m-d H:i:s")
		);
		
		return $data;
	}
	
	function memory_usage($memory) {
        $mem_usage = $memory;
       
        if ($mem_usage < 1024)
            $memory_usage = $mem_usage." bytes";
        elseif ($mem_usage < 1048576)
            $memory_usage = round($mem_usage/1024,2)." kilobytes";
        else
            $memory_usage = round($mem_usage/1048576,2)." megabytes";
           
        return $memory_usage;
    } 
}