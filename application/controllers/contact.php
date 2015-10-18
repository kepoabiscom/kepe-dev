<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "about.php";
require_once "././api-recaptcha/autoload.php";

define("API_KEY_RECAPTCHA", "6LdCCA8TAAAAAFGhzpgknm7n5LiADikSoHjxfHIK");
define("SECRET_KEY_RECAPTCHA", "6LdCCA8TAAAAAK4qtpc65Y2Nae_4wAFegimkwIhq");
define("AJAX_REQUEST", isset($_SERVER['HTTP_X_REQUESTED_WITH']));

class Contact extends CI_Controller {

	/**
	 * Constructor for this controller.
	 */
	function __construct() {
		parent:: __construct();
		$this->load->helper(array("url", "form"));
		$this->load->model("contact_model");
		$this->load->library("parser");
		$this->load->library("menu");
		$this->load->library('email');
	}
	
	/**
	 * Index Page for this controller.
	 */
	
	public function index() {
		$data = array_merge(
			array(
				'get_menu' => $this->menu->get_menu("header", "contact"),
				'get_breadcrumb' => $this->menu->get_menu("breadcrumb", "contact"),
				'sending_message' => base_url('contact'),
				"title" => 'Contact Us'
			),
			$this->profile()->get_about_detail()
		);

		$data['author'] = 'Administrator';
		$data['url'] = base_url('contact');
		$data['meta_tag'] = "Kepo ".$data['title'].", kepoabis, Kepo Abis, Kepo, Abis, ".$data['site_name'].", ".$data['tagline'];
		$data['meta_description'] = strip_tags($data['contact_footer']);
		$data['og_image'] = base_url('assets/img/'.$data['logo_name']);
		
		$this->generate('contact', $data);
	}

	function send_message() {
		if(AJAX_REQUEST) {
			$recaptcha_data = array(
					"is_passed" => false,
					"error_message" => ""	
			);
			if(isset($_POST['g-recaptcha-response'])){
				$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY_RECAPTCHA);

				$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
				if($resp->isSuccess()){
					$recaptcha_data['is_passed'] = true;
				} else {
					foreach($resp->getErrorCodes() as $code) {
						$recaptcha_data['error_message'] =  $code;
					}
				}
			}
			$data = $this->input->post(null, true);
			if($recaptcha_data['is_passed']) {
				if(empty($data['from_name']) || empty($data['email']) || empty($data['subject']) || empty($data['message'])) {
					$status = array(
							"status" => false,
							"msg" => "All fields is required."
						);
				} else {
					if($this->validate_email($data['email'])) {
						$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
						$is_sent = $this->send_to_email($data['email'], $data['from_name']);
						if($is_sent) {
							$this->contact_model->insert_message($data);
							$status = array(
									"status" => true,
									"msg" => "Your message has been sent successfully."
								);
						} else {
							$this->output->set_status_header('500');
							$status = array(
									"status" => false,
									"msg" => "There's an error with our mail server."
								);
						}	
					} else {
						$status = array(
								"status" => false,
								"msg" => "Invalid email format."
							);
					}
				}
			} else {
				$status = array(
							"status" => false,
							"msg" => "Re-Captcha is required." //. $recaptcha_data['error_message']
					);
			}
		} else {
			$this->output->set_status_header('401');
			$status = array(
						"status" => false,
						"msg" => "Ajax request isn't authorized."
					);
		}
		$status = array_merge(
					array("api_key_recaptcha" => API_KEY_RECAPTCHA), $status
				);
		echo json_encode($status);
	}
	
	public function generate($view, $content = array()) {
		$data = array(
			'slider' => $this->menu->get_page_title($content['title']),
			'map' => NULL,
			'header' => $this->parser->parse('templates/header', $content, TRUE),
			'content' => $this->parser->parse($view, $content, TRUE),
			'footer' => $this->parser->parse('templates/footer', $content, TRUE)
		);
		
		$data = array_merge($content, $data);
		
		$this->parser->parse('index', $data);
	}
	
	public function profile() {
		return $obj = new about();
	}

	function validate_email($email) {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		return true;
	}

	function send_to_email($to, $from_name) {
		$subject = '[KepoAbis.com] Your message has been sent to KepoAbis';
		$from = 'contact@kepoabis.com';
		$message = 'Dear '.$from_name.',
					<br>
					<br>Anda (atau seseorang) baru saja mengirimkan pesan menggunakan alamat email '.$to.' ke kontak kami,
					terima kasih telah menghubungi kami.
					<p><br>
					<strong>Best Regards,<br>
					Haamill Productions</strong>
					<br>
					<br>Jalan Pelita RT 02/09 No. 69 Kel. Tengah, Kec. Kramat Jati, Jakarta Timur 13540, Indonesia
					<br><a href="http://kepoabis.com">KepoAbis.com</a> by Haamill Productions
					<br>Phone: 085697309204
					<br>Email: hi@kepoabis.com or contact@kepoabis.com
				</p>';
        $body =
        	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset='.strtolower(config_item('charset')).'" />
			    <title>'.html_escape($subject).'</title>
			    <style type="text/css">
			        body {
			            font-family: Arial, Verdana, Helvetica, sans-serif;
			            font-size: 16px;
			        }
			    </style>
			</head>
			<body>
				<p>'.$message.'</p>
			</body>
			</html>';
        //$body = $this->email->full_html($subject, $message);

        $result = $this->email
            ->from($from)
            //->reply_to('herman.wahyudi@tokopedia.com')
            ->to($to)
            ->subject($subject)
            ->message($body)
            ->send();
		
        return $result;
        
        //echo $this->email->print_debugger(); exit("");
	}
}