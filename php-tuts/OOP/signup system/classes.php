<?php 
// Black Friday’s here early! Use code
//  UNWRAP300
//  to score
//  300 extra entries
// .
class Database{
	private $db_host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "login";
	protected $conn  = false;
	protected $sql;
	protected $stmt;
	private   $result;
	private $fname    = "";
	private $lname    = "";
	private $email    = "";
	private $password = ""; 
	private $dob      = "";
	private $gender   = "";


	public function __construct(){
		if (!$this->conn){
			$this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

			if ($this->conn->errno){
				return "Conection Failed..!!!" . $mysqli->error();
			}
			return $this->conn;
		}
	}
	// Constructor ends here

	function insert_data(){
		$this->fname    = $_POST["fname"];
		$this->lname    = $_POST["lname"];
		$this->email    = $_POST["email"];
		$this->password = $_POST["password"];
		$this->dob      = $_POST["dob"];
		$this->gender   = $_POST["gender"];

		$this->sql = "INSERT INTO `signup_oop` (`fname`, `lname`, `email`, `password`, `dob`, `gender`) VALUES (?,?,?,?,?,?)";
		$this->stmt = mysqli_prepare($this->conn, $this->sql);
		if ($this->stmt){
			mysqli_stmt_bind_param($this->stmt, 'ssssss', $this->fname, $this->lname, $this->email, $this->password, $this->dob, $this->gender);
			$this->result = mysqli_stmt_execute($this->stmt);

			if ($this->result){
				mysqli_stmt_close($this->stmt);
				mysqli_close($this->conn);
				echo "Data inserted successfully";
			}
			else{
				mysqli_stmt_close($this->stmt);
				mysqli_close($this->conn);
				echo "Error while inserting data into DB";
			}
		}
		else{
			mysqli_close($this->conn);
			echo "Unable to prepare statement";
		}
	}
}

?>