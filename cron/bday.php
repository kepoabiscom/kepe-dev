<?php

require_once('config/db.php');
require_once('config/email.php');

class Bday {

	private static $db;
	private static $email;

	public function __construct() {
		$this->db = new Db();
		$this->email = new Email();
	}

	function main() {
		if(PHP_SAPI == "cli") {
			$this->run();
		}
	}

	function run() {
		try {
			$sql = "SELECT nama_lengkap as full_name, date_of_birth as bday, email FROM user";
			$result = $this->db->execute($sql);
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
				$result = $this->db->execute($sql);
				while($row = mysqli_fetch_assoc($result)) {
					$this->email->send_to_email($row['email'], $name, $age);
					sleep(2);
				}
			} else {
				echo "There's no Birthday Today!";
			}

			$this->db->close();
		} catch(Exception $e) {
			print_r($e->getMessage());
		}
	}
}
 
$t = new Bday();
$t->run();

?>