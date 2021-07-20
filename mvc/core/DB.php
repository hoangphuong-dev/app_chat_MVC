<?php 
trait DB {
	public $connect;
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "app_chat_mvc";

	public function __construct() {
		$this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		mysqli_select_db($this->connect, $this->dbname);
		mysqli_query($this->connect, "SET NAMES 'utf-8'");
	}

	public function runQuery($query){
		$result = $this->connect->query($query) or 
		die($this->connect->error.__LINE__);
		if($result){
			return $result;
		} else {
			return false;
		}
		$this->connect->close();
	}
}