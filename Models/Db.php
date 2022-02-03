<?php 

class Db {

	private $host = "localhost";
	private $db_name = "bookcom";
	private $username = "root";
	private $password = "";

	public $conn = null;

	public function __construct() {
        $this->conn = new mysqli($this->host, $this->username,$this->password, $this->db_name);
        if ($this->conn->connect_error) {
            echo "failed to connect to database". $this->conn->connect_error;
        }
    }
}