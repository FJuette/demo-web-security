<?php
class DatabaseHandler
{
	private $servername;
	private $username = "root";
	private $password;
	private $conn;
	public $dbName = "hackingdb";
	
	function __construct() {
		$this->servername = getenv('DB_SERVER') ?: "localhost";
		$this->password = getenv('DB_PASSWORD') ?: "";
       	// Create connection
		$this->conn = new mysqli($this->servername, $this->username, $this->password);
		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}
	
	public function GetConnection() {
		return $this->conn;
	}
	
	public function CloseConnection() {
		$this->conn->close();
	}
	
	public function ResetDatabase() {
		$this->CreateDatabase();
		$this->CreateTables();
		$this->ClearTables();
	}
	
	public function DatabaseExists() {
		$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '".$this->dbName."'";
		if ($result = $this->conn->query($sql)) {
			/* determine number of rows result set */
			$rowCount = $result->num_rows;
			if ($rowCount > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			echo "Error on checking database: " . $this->conn->error;
		}
		$this->CloseConnection();
	}	

	private function CreateDatabase() {
		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS ".$this->dbName;
		if ($this->conn->query($sql) === TRUE) {
			echo "Database creation/reset was successful";
		} else {
			echo "Error creating database: " . $this->conn->error;
		}
		$this->CloseConnection();
	}
	
	private function CreateTables() {
		
	}
	
	private function ClearTables() {
		// TODO
	}
	
}
?>
