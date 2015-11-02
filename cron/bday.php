<?php

require_once('../application/third_party/phpmailer/PHPMailerAutoload.php'); //memanggil library php mailernya

define('GUSER', 'contact@kepoabis.com');
define('GPWD', 'thebestteamever15');

class Bday {

	private $conn;

	public function __construct() {
		$this->connect();
	}

	function connect() {
		$servername = "103.247.8.138";
		$username = "kepe3788_user";
		$password = "1234_asdf";
		$dbname = "kepe3788_db";
		
		$this->conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}
	
	function send_to_email($to, $name, $age) {
		global $error;

		$msg = $this->message($to, $name, $age);

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 2;  
		$mail->SMTPAuth = true;  
		$mail->SMTPSecure = ''; 
		$mail->Host ='mail.kepoabis.com'; 
		$mail->Port = 25; 
		$mail->Username = GUSER; 
		$mail->Password = GPWD; 
		$mail->IsHTML(true);
		$mail->SetFrom(GUSER, "KepoAbis.com");
		$mail->Subject = $msg['subject'];
		$mail->Body = $msg['body'];
		$mail->AddAddress($msg['to']);
		if(!$mail->Send()) {
			$error = 'Mail error: '. $mail->ErrorInfo;
			return false;
		} else {
			$error = 'Message sent!';
			return true;
		}
	}

	function run() {
		try {
			$sql = "SELECT nama_lengkap as full_name, date_of_birth as bday, email FROM user";
			$result = $this->conn->query($sql);
			$today = (string) date("m-d");
			$is_bday = false; $name = ""; $age = 0;
			if($result->num_rows > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$bday = trim((string) $row['bday']);
					if(!strcmp(substr($bday, 5, strlen($bday)-1), $today)) {
						$age = (int) date("Y") - (int) substr($bday, 0, 4); 
						$name = $row['full_name'];
						$is_bday = true;
					}
					//echo $row['full_name'] . " " . $row['bday'] . " " . $row['email'] . PHP_EOL;
				}
			}
			if($is_bday) {
				$result = $this->conn->query($sql);
				while($row = mysqli_fetch_assoc($result)) {
					$this->send_to_email($row['email'], $name, $age);
					sleep(1);
				}
			} else {
				echo "There's no Birthday Today!";
			}

			$this->conn->close();
		} catch(Exception $e) {
			print_r($e->getMessage());
		}
	}

	function message($email, $name, $age) {
		$subject = "[KepoAbis.com] Happy Birthday " . $name;
		$to = $email; //"herman.wahyudi02@gmail.com";

		$message = "<p><strong>HAPPY BIRTHDAY ".$name." yang ke-". $age . "</strong></p>";
		$message .= "<br><p>Semoga tercapai segala cita-citanya :D</p><br><br>";
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
 
$t = new Bday();
$t->run();

?>