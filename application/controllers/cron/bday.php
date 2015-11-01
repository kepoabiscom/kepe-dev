<?php 

date_default_timezone_set("UTC");

class Bday extends CI_Controller {

	//private static $instance;

	public function __construct() {
		parent::__construct();
		$this->load->library("input");
		$this->load->library("email");
		$this->load->model("user_model", "", true);
	}

	public function index() {
		if($this->input->is_cli_request()) {
			$this->run();
		}
	}

	public function run() {
		try {
			$result = $this->user_model->get_bday_user();
			$today = date("m-d");
			$is_bday = false;
			$name = "";
			$age = 0;
			foreach($result as $row) {
				if(substr($row->bday, 5, strlen($row->bday)-1) == $today) {
					$age = (int) date("Y") - (int) substr($row->bday, 0, 4); 
					$name = $row->full_name;
					$is_bday = true;
				}
				echo $row->full_name . " " . $row->bday . " " . $row->email . PHP_EOL;
			}

			if($is_bday) {
				foreach($result as $r) {
					$this->send_to_email($name, $age, $r->email);
					sleep(1);
				}
			} else {
				echo "There's no Birthday Today!";
			}
		} catch(Exception $e) {
			print_r($e->getMessage());
		}
	}

	public function send_to_email($name, $age, $email) {
		try {
			$subject = "[KepoAbis.com] Happy Birthday " . $name;
			$from = "contact@kepoabis.com";
			$to = "herman.wahyudi02@gmail.com";

			$message = "<p><strong>HAPPY BIRTHDAY ".$name." yang ke-". $age . "</strong></p>";
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

	        $result = $this->email->from($from)
				            ->to($to)
				            ->subject($subject)
				            ->message($body)
				            ->send();
			
	        echo $result . "<br>" .$message;
	    } catch(Exception $e) {
	    	print_r($e->getMessage());
	    }
	}
}