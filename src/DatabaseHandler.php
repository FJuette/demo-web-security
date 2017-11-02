<?php
class DatabaseHandler
{
	private $servername;
	private $username = "root";
	private $password;
	private $conn;
	private $dbName = "hackingdb";
	
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
		
		$this->CloseConnection();
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

	public function AddComment($comment) {
		$this->conn->select_db($this->dbName);
		$sql = "INSERT INTO comments (comment) VALUES ('".$comment."');";
		
		if ($this->conn->query($sql) === TRUE) {
		} else {
			die("Error inserting data: " . $this->conn->error);
		}
	}
	
	public function ReadComments() {
		$this->conn->select_db($this->dbName);
		$sql = "SELECT * FROM comments;";
		$result = $this->conn->query($sql);
		
		$comments = array();
		while($row = $result->fetch_assoc()) {
			array_push($comments, $row["comment"]);
		}
		return $comments;
	}

	private function CreateDatabase() {
		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS ".$this->dbName;
		if ($this->conn->query($sql) === TRUE) {
			echo "Database creation/reset was successful<br />";
		} else {
			echo "Error creating database: " . $this->conn->error."<br />";
		}
	}
	
	private function CreateTables() {
		$this->conn->select_db($this->dbName);
		// Create tables
		$sql = "CREATE TABLE IF NOT EXISTS `comments` (`id` int(3) NOT NULL auto_increment, `comment` varchar(250)  NOT NULL default '', PRIMARY KEY  (`id`));";
		if ($this->conn->query($sql) === TRUE) {
			echo "Table creation/reset was successful<br />";
		} else {
			echo "Error creating tables: " . $this->conn->error."<br />";
		}
	}
	
	private function ClearTables() {
		$this->conn->select_db($this->dbName);
		// Clear tables
		$sql = "DELETE FROM comments;";
		if ($this->conn->query($sql) === TRUE) {
			echo "Table clear was successful<br />";
		} else {
			echo "Error clearing the tables: " . $this->conn->error."<br />";
		}
	}
	
}
?>
