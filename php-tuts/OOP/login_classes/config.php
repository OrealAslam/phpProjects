<?php 
class Db_Operation{
	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_name = 'login';
	protected $conn = '';
	protected $sql = '';
	protected $stmt = '';


	public function __construct(){

		$this->conn = new mysqli();		
		$this->conn->connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		if ($this->conn){
			return $this->conn;
		}
		else{
			die($this->conn->error());
		}
	}

	public function signup($post){
		$user = $post['name'];
		$email = $post['email'];
		$password = $post['password'];

		if (($post['name'] == "") || ($post['email'] == "") || ($post['password'] == "")) {
			header("Location: index.php?msg=required");
		}
		else{

			$this->sql = "INSERT INTO login_oop (username, email, password) VALUES (?,?,?)";
			if($this->stmt = $this->conn->prepare($this->sql)){
				$this->stmt->bind_param('sss', $user, $email, $password);

				if ($this->stmt->execute()){
					header("location:index.php?msg=signup");
				}
				else{
					header("location:index.php?msg=error");
				}
			}
		}
	}

	// Select record from DB

	public function show_data(){
		$this->sql = "SELECT * FROM login_oop";
		$this->stmt = $this->conn->query($this->sql);

		if ($this->stmt->num_rows >0){
			$arr = array();
			while ($data = $this->stmt->fetch_assoc()){
				$arr[] =  $data;				
			}
			return $arr;
		}
		else{
			header("Location: index.php?msg=empty");
			return 0;
		}
	}

	// display record by id

	public function displayRecordById($editid){

		$this->sql = "SELECT * FROM login_oop WHERE id = {$editid} ";
		$this->stmt = $this->conn->query($this->sql);

		if ($this->stmt->num_rows == 1){
			$result = $this->stmt->fetch_assoc();
			return $result;
		}
	}

	public function updateRecordById($post){

		$this->sql = "UPDATE login_oop SET username = ?, email = ?, password = ? WHERE id = ? ";
		$this->stmt = $this->conn->prepare($this->sql);

		if ($this->stmt){
			$result = $this->stmt->bind_param('sssi', $post['name'], $post['email'], $post['password'], $post['hid']);
			$execute = $this->stmt->execute();

			if ($execute){
				header("location:index.php?msg=update");
			}
			else{
				echo "Error". $this->conn->error();
			}
		}
	}

	// delete record by ID

	public function deleteRecordById($deleteid){
		$this->sql = "DELETE FROM login_oop WHERE id = ?";
		$this->stmt = $this->conn->prepare($this->sql);

		if ($this->stmt){
			$this->stmt->bind_param('i', $deleteid);
			$execute = $this->stmt->execute();

			if ($execute){
				header("location:index.php?msg=del");
			}
			else{
				header("location:index.php?msg=delerr");

			}
		}
	}

	public function __destruct(){
		$this->stmt->close();
		$this->conn->close();
	}
}

?>