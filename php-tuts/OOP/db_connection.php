<?php 
class Connect{
	private $db_host = "localhost";
	private $db_user = "root";
	private $db_pwd  = "";
	private $db_name = "lms system";
	protected $connection;
	protected $query;
	private $row;
	private $data;
	// private $row;
	// protected $result;

	public function __construct(){
		 $this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pwd, $this->db_name);
		if (mysqli_connect_errno()){
			die(mysqli_connect_error());
		}
		return $this->connection;	
	}

	public function get_row_data(){
		$this->query = "SELECT * FROM `stu_register`";
		$this->row = mysqli_query($this->connection, $this->query);

		if ($this->result = mysqli_num_rows($this->row)>0){
			while ($this->data = mysqli_fetch_array($this->row)){
				return $this->data['email'];
			}
		}
		return "No result found";

	}
	// private $fname;	private $lname; private $email; private $password; private $dob; private $gender; protected $query; public $row;

	// 	public function  insert_data(){
		// $this->fname    = 'Shahid';
		// $this->lname    = 'Ali';
		// $this->email    = 'shahidali123@yahoo.com';
		// $this->password = 'shahidali123';
		// $this->dob      = '1995-03-21';
		// $this->gender   = 'male';

	// 	$this->query = "INSERT INTO `stu_register`(`fname`, `lname`, `email`, `password`, `dob`, `gender`) VALUES ('Anjum', 'Ali','anjum56@yahoo.com', 'anjumali123', '1995-03-21','male')";
	// 	$this->row = mysqli_query($this->connection, $this->query);

	// 	if (mysqli_affected_rows($this->connection) >0){
	// 		return "Data inserted successfully";
	// 	}
	// 	return "Error while inserting data";
	// }

// 	public function del_data(){
// 		$this->query = "DELETE FROM `stu_register` WHERE `id` = 11";
// 		$this->row = mysqli_query($this->connection, $this->query);

// 		if (mysqli_affected_rows($this->connection) ){
// 			return "Data deleted successfully";
// 		}
// 		return "Error while deleting data";
// 	}

	// public function update_data(){
	// 	$this->query = "UPDATE `stu_register` SET `fname` = 'Omama' ,`lname` = 'Aslam' WHERE `id` = 27";
	// 	$this->row = mysqli_query($this->connection, $this->query);
	// 	if (mysqli_affected_rows($this->connection)){
	// 		return "Data updated successfully....!!!";
	// 	}
	// 	return "Error while updating data";
	// }
 }

$conn = new Connect();
//selecting data
print_r($conn->get_row_data('lname')); 
//inserting data
// echo $conn->insert_data();
//deleting data
// echo $conn->del_data();
//update data
// echo $conn->update_data();

?>