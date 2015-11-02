<?php
	
class Db {
	
	private static $conn;

	public function __construct() {
		$this->connect();
	}

	public function connect() {
		$hostname = "localhost";
		$username = "root";
		$password = "123456";
		$_dbsname = "kepe3788_db";
		
		if(getHostByName(getHostName()) != '127.0.0.1') {
			$hostname = "103.247.8.138";
			$username = "kepe3788_user";
			$password = "1234_asdf";
			$_dbsname = "kepe3788_db";
		}
		
		$this->conn = new mysqli($hostname, $username, $password, $_dbsname);
		
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}

		return $this->conn;
	}

	public function execute($sql) {
		return $this->conn->query($sql);
	}

	public function close() {
		return $this->conn->close();
	}
}
?>