<?php 

class Insert_Data{
	private $sql;
	private $stmt;
	protected $conn;
	private $username;
	private $email;
	private $password;
	private $dob;
	private $gender;

	public function __construct(){
		$this->sql        = "";    
		$this->username   = "";
		$this->email 	  = "";
		$this->password   = "";
		$this->dob 		  = "";
		$this->gender 	  = "";
		$this->stmt       = false;

		if (!isset($this->conn)){
			$this->conn = new mysqli ("localhost", "root", "", "project");
			return $this->conn;
		}
	}

	public function Insert_info($arg){
		$password = password_hash($arg['password'], PASSWORD_DEFAULT);
		$this->sql = "INSERT INTO oop_signup (username, email, password, dob, gender) VALUES (?,?,?,?,?)";
		$this->stmt = $this->conn->prepare($this->sql);

		if ($this->stmt){
			$this->stmt->bind_param('sssss', $arg['username'], $arg['email'],$password, $arg['dob'], $arg['gender']);
			$this->stmt->execute();

			if ($this->stmt->execute()){
				return "<div class='alert alert-success text=capitalize text-center' role='alert'>signup successfully!!</div>";
			}
			else{
				return "<div class='alert alert-danger text=capitalize text-center' role='alert'>unable to signup!!!</div>";
			}
		}
		else{
			return "<div class='alert alert-warning text=capitalize text-center' role='alert'>statement object error!!!!!</div>";
		}

	}


}


?>