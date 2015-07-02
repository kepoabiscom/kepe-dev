<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_common {

   function table_pagination($page){
		$config['base_url'] = $page['url'];
		$config['per_page'] = $page['limit'];
		$config['total_rows'] = $page['total_rows'];
		$config['uri_segment'] = $page['uri'];
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['first_link'] = '&lt;&lt;';
		$config['last_link'] = '&gt;&gt;';
		$config['cur_tag_open'] = '<span><b>';
		$config['cur_tag_close'] = '</b></span>';
		$config['full_tag_open'] = '<div align="center"><ul class="pagination"><li>';
		$config['full_tag_close'] = '</li></ul></div>';
		
		$this->pagination->initialize($config);

		$config['start'] = ($this->uri->segment($page['uri'])) ? $this->uri->segment($page['uri']) : 0;
		
		$config['page'] = $this->pagination->create_links();
		/*
		echo "<pre>";
		print_r(htmlentities($config['page']));
		echo "</pre>";
		*/
		return $config;
	}
}