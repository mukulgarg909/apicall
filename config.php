<?php
	class Database
	{
	// DBO Params
	private $hostname = 'localhost';
	private $database = 'carspa';
	private $username = 'root';
	private $password = '';
	private $conn;


	// DB connect using PDO
	public function connect()
	{
		$this->conn = null;

		try
		{
			$this->conn = new PDO('mysql:host=' .$this->hostname . ';dbname=' .$this->database, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $error)
		{
			echo 'connecton error :' .$error->getMessage();
		}


		return $this->conn;


	}

} 
?>