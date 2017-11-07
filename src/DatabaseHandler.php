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
		$this->AddStartData();
		
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

	public function CheckUser($username, $password) {
		$this->conn->select_db($this->dbName);
		$sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."';";
		$result = $this->conn->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		return FALSE;
	}

	private function CreateDatabase() {
		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS ".$this->dbName;
		if ($this->conn->query($sql) === TRUE) {
			echo "Database creation/reset was successful<br />";
		} else {
			die("Error creating database: " . $this->conn->error);
		}
	}
	
	private function CreateTables() {
		$this->conn->select_db($this->dbName);
		// Create tables
		$sql = "CREATE TABLE IF NOT EXISTS `comments` 
		(`id` int(3) NOT NULL auto_increment, `comment` varchar(250) NOT NULL default '', PRIMARY KEY  (`id`));";

		if ($this->conn->query($sql) === FALSE) {
			die("Error creating the comment table: " . $this->conn->error);
		}


		$sql = "CREATE TABLE IF NOT EXISTS `users` 
		(`id` int(3) NOT NULL auto_increment, `username` varchar(100) NOT NULL, `password` varchar(100) NOT NULL, PRIMARY KEY  (`id`))";
		
		if ($this->conn->query($sql) === FALSE) {
			die("Error creating the users table: " . $this->conn->error);
		}
	}
	
	private function ClearTables() {
		$this->conn->select_db($this->dbName);
		// Clear tables
		$sql = "DELETE FROM comments;";
		if ($this->conn->query($sql) === FALSE) {
			die("Error clearing the comment table: " . $this->conn->error);
		}

		$sql = "DELETE FROM users;";
		if ($this->conn->query($sql) === FALSE) {
			die("Error clearing the users table: " . $this->conn->error);
		}
	}

	private function AddStartData() {
		$this->conn->select_db($this->dbName);
		// Add default data
		$sql = "INSERT INTO users (username, password) VALUES ('admin', 'password'), ('user', '123');";
		if ($this->conn->query($sql) === FALSE) {
			die("Error clearing the tables: " . $this->conn->error);
		}
	}
	
}
?>
