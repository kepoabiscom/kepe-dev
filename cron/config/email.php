<?php 
	
require '../application/third_party/phpmailer/PHPMailerAutoload.php';

define('GUSER', 'contact@kepoabis.com');
define('GPWD', 'thebestteamever15');

class Email {
	
	private static $mail;

	public function __construct() {
		$this->mail = new PHPMailer();

		$this->mail->IsSMTP();
		$this->mail->SMTPDebug = 2;  
		$this->mail->SMTPAuth = true;  
		$this->mail->SMTPSecure = ''; 
		$this->mail->Host ='mail.kepoabis.com'; 
		$this->mail->Port = 25; 
		$this->mail->Username = GUSER; 
		$this->mail->Password = GPWD; 
		$this->mail->IsHTML(true);
	}

	function send_to_email($to, $name, $age) {
		global $error;

		$msg = $this->message($to, $name, $age);
		
		$this->mail->SetFrom(GUSER, "KepoAbis.com");
		$this->mail->Subject = $msg['subject'];
		$this->mail->Body = $msg['body'];
		$this->mail->AddAddress($msg['to']);
		if(!$this->mail->Send()) {
			$error = 'Mail error: '. $this->mail->ErrorInfo;
		} else {
			$error = 'Message sent to';
		}
		$this->mail->ClearAddresses();
		return $error . " " . $to;
	}

	function message($email, $name, $age) {
		$subject = "[KepoAbis.com] Happy Birthday " . $name;
		$to = $email; //"herman.wahyudi02@gmail.com";

		$message = "<p><strong>HAPPY BIRTHDAY ".$name." yang ke-". $age . "</strong></p>";
		$message .= "<p>Semoga tercapai segala cita-citanya :D</p><br>";
		$message .= "<strong>Best Regards,<br>
					Haamill Productions</strong>
					<br>
					<br>Jalan Pelita RT 02/09 No. 69 Kel. Tengah, Kec. Kramat Jati, Jakarta Timur 13540, Indonesia
					<br><a href='http://kepoabis.com'>KepoAbis.com</a> by Haamill Productions
					<br>Phone: 085697309204
					<br>Email: hi@kepoabis.com or contact@kepoabis.com";
        $body =
        	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=null" />
			    <title>'.$subject.'</title>
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

		return array(
				"subject" => $subject,
				"to" => $to,
				"body" => $body
			);
	}
}

?>