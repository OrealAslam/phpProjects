<?php 
// inheritance in DB CRUD operation PHP Plus POLYMORPHISM concept
class Connect{
	private $query;
	private $result;
	private $data = [];
	private $row;
	private $var;
	protected $connection;
	private $dbhost = "localhost";
	private $dbuser = "root";
	private $dbpwd  = "";
	private $dbname = "project";

	public function __construct(){
		$this->connection = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpwd, $this->dbname);

		if(mysqli_connect_errno()){
			die(mysqli_connect_error());
		}
		return $this->connection;
	}
}
class Select_data extends Connect{	
	public function retrieve_data(){
		$this->query  = "SELECT * FROM `student_info`";
		$this->result = mysqli_query($this->connection, $this->query);
		if ($this->rows = mysqli_num_rows($this->result) >0) {
			if (!empty($this->rows)) {
				while ($this->var = mysqli_fetch_assoc($this->result)){
					echo "<pre>";
					print_r($this->var);
					echo "</pre>";
				}
			}
			return false;
		}
		else{
		echo "No data found in table";}
		
	}
}
class Insert extends Connect{
	public function __construct(){parent::__construct();}

	public function insert_data(){
		$this->query = "INSERT INTO `student_info`(`username`, `password`, `email`, `dob`, `phone`, `gender`) VALUES('OmamaChohan', 'omamachohan', ' omamachohan@gmail.com', '1998-12-02', '03130464365', 'male')";
		$this->result = mysqli_query($this->connection, $this->query);
		if ($this->result){
	 		return "Data inserted successfully";
		}
	 	return "Error while inserting data";
	 }

}

class Delete_data extends Connect{
	private $id;
	public function __construct($id){
		$this->id = $id;
		parent:: __construct();
	}

	public function delete_record(){
		$this->query = "DELETE FROM `student_info` WHERE `id` = $this->id";
		$this->result = mysqli_query($this->connection, $this->query);

		if (mysqli_affected_rows($this->connection)){
			return "Data deleted from DB";
		}
		return "Error while deleting data from DB";
	}
}

class Update_data extends Connect{
	protected $id;
	protected $username;
	protected $email;
	public function __construct(){
			
		parent:: __construct();
	}

	public function update_record(){
		$this->query = "UPDATE `student_info` SET `username` = 'Aslam Chohan' , `password` = 'aslamchohan',`email` = 'aslamchohan@gmail.com' WHERE `id` = 42";
		$this->result = mysqli_query($this->connection, $this->query);

		if (mysqli_affected_rows($this->connection)){
			return "Data updated successfully!!!..";
		}
		return "Error while updating data in DB Table";
	}
}

$conn = new Connect;
echo "<h2>Selecting all data from DB Table</h2>";
$select = new Select_data;
print_r($select->retrieve_data());

echo "<h2>Inserting data into DB Table</h2>";

$insert = new Insert();
echo $insert->insert_data();

echo "<h2>Deleting specific record from DB Table</h2>";
$delete = new Delete_data(23);
$delete->delete_record();
$delete = new Delete_data(93);
echo $delete->delete_record();

echo "<h2>Updating DB table record</h2>";
$update = new Update_data(42);
echo $update->update_record();
?>