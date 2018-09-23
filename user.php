<?php
	class User 
	{
		// DB connection
		private $conn;
		private $table = 'ct_user';

		// User table property
		public $id;
		public $user_email;
		public $user_pwd;
		public $first_name;
		public $last_name;
		public $phone;
		public $zip;
		public $address;
		public $city;
		public $state;
		public $notes;
		public $vc_status;
		public $p_status;
		public $contact_status;
		public $status;
		public $usertype;

		// Constructor with DB
		public function __construct($db)
		{
			$this->conn = $db; // setting the database class connection to $db variale
		}

		//Get the values from the ct_user table
		public function read() 
		{
			$query =  "select * from ct_users order by id asc";
			 
			// prepare statement using PDO
			$stmt = $this->conn->prepare($query);

			// execute it
			$stmt->execute();

			return $stmt;
		}

    }
?>