<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->library("parser");
		$this->load->library("menu");
		$this->load->library('email');
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{
		$data = array(
			'get_menu' => $this->menu->get_menu("header", "videografi"),
			'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "videografi"),
		);
		
		$data = array_merge(
			array('sending_message' => base_url('contact/send')),
			$this->profile()->get_about_detail(),
			$data
		);
		
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
	
	public function profile(){
		include ('about.php');
		
		return $obj = new about();
	}
	
	function send(){	
		$name = $this->input->post('name', TRUE);
		$email = $this->input->post('email', TRUE);
		$subject = $this->input->post('subject', TRUE);
		$message = $this->input->post('message', TRUE);
		
		$this->email->from($email, $name);
		$this->email->to('hi@kepoabis.com');

		$this->email->subject($subject);
		$this->email->message("<p>".$message."</p>");
		
		if($this->email->send())
		{
			echo 'Email sent<br>.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
		
		$this->email->from('hi@kepoabis.com', 'Hi');
		$this->email->to($email);

		$this->email->subject($subject);
		$this->email->message("<p>
				Dear ".$name.",
				<br>
				<br>Anda (atau seseorang) baru saja mengirimkan pesan menggunakan alamat email ".$email." ke kontak kami.
			</p>
			<p>
				Terima kasih,
				<br>
				<br>Jalan Pelita RT 02/09 No. 69 Kel. Tengah, Kec. Kramat Jati, Jakarta Timur 13540, Indonesia
				<br><a href='http://kepoabis.com'>KepoAbis.com</a> by Haamill Productions
				<br><p>Phone: 085697309204
				<br>Email: hi@kepoabis.com
			</p>");
		
		if($this->email->send())
		{
			echo 'Email sent<br>.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}