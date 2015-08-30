<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_common {
	
	// Pass array as an argument to constructor function
	public function __construct($config = array()) {

		// Create associative array from the passed array
		foreach ($config as $key => $value) {
		$data[$key] = $value;
		}

		// Make instance of CodeIgniter to use its resources
		$CI = & get_instance();

		// Load data into CodeIgniter
		$CI->load->vars($data);
	}

	function get_list_tag($tag, $type='article', $mode='list'){
		
		$x = explode(',', $tag);
		
		$list = ""; $list_array = array();

		if($mode == 'btn'){
			for($i=0; $i<count($x); $i++){
				$q = trim($x[$i]);

				$array = explode(' ', $q);
				
				
				$y = array();
				for($j=0; $j<count($array); $j++){
					$y[$j] = ucfirst(trim($array[$j]));
				}

				$t = implode(" ", $y);
				
				$list_array[$i] = "<li><a href='".base_url('search?q='.$q.'&type='.$type)."'>".$t."</a></li>";			
			} 
			
			$list = implode(" ", $list_array);
			
			return "<ol class='list-inline list-inline-btn'>".$list."</ol>"; 
		}
		
		if($mode == 'list') {
			for($i=0; $i<count($x); $i++){
				$q = trim($x[$i]);
			
				$array = explode(' ', $q);
				
				$y = array();
				
				for($j=0; $j<count($array); $j++){
					$y[$j] = ucfirst(trim($array[$j]));
				}
			
				$t = implode(" ", $y);
				
				$list_array[$i] = "<li style='padding-left: 5px;padding-right: 0px;'><a href='".base_url('search?q='.$q.'&type='.$type)."'>".$t."</a></li>";
			}
			
			$list = implode(" ", array_merge(array('<li>In</li>'), $list_array));
			
			return "<ol class='list-inline'>".$list."</ol>"; 
		}
		
		if($mode == 'metadata') {
			return $tag;
		}
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
	
	function archivesx($query, $table){
		$i = 0;
		foreach ($query->result() as $q)
		{
			$month = !isset($q->month) ? "" : $q->month;
			$m = !isset($q->m) ? "" : $q->m;
			$year = !isset($q->year) ? "" : $q->year;
			$total = !isset($q->total) ? "" : $q->total;
			
			$hr = ($i == 0) ? "<hr>" : "";
			
			$list = $hr."<li><span class='glyphicon glyphicon-pushpin'></span>&nbsp;<a href='".base_url($table.'/page/'.$year.'/'.$m.'/0')."'>".$month." ".$year." (".$total.")</a><hr></li>";
			
			$data[$i] = array(
				"list" => $list
			 );
			 
			 $i++;
		}
		
		return $data;
	}
	
	function archives($query, $table){
		$i = 0; $x = 1; $y = 0; $html = "";

		$close = "</ul></div></div></div>";
		
		foreach ($query->result() as $q)
		{
			$month = !isset($q->month) ? "" : $q->month;
			$m = !isset($q->m) ? "" : $q->m;
			$year = !isset($q->year) ? "" : $q->year;
			$total = !isset($q->total) ? "" : $q->total;
			
			if($y != $year && $x > 1){
				$html .= $close;
			}
			
			if($y != $year){
				$html .= "
					<div class='panel-group'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<h4 class='panel-title'>
									<a data-toggle='collapse' href='#collapse" . $x ."'>" . $year . "</a>
								</h4>
							</div>
							<div id='collapse" . $x ."' class='panel-collapse collapse'>
								<ul class='list-group'>
				";
				
				$y = $year; $x++; 
			}

			$html .= "<li class='list-group-item'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;<a href='".base_url($table.'/page/'.$year.'/'.$m.'/0')."'>".$month." ".$year." (".$total.")</a></li>";
			
			$i++;
		}
		
		$html .= $close;
		
		return $html;
	}
}