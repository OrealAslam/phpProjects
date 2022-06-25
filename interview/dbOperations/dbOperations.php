
<?php 

class DataBase{

	private $db_host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "dboperations";

	private $status = false;

	protected $conn;

	public function __construct(){

		if ($this->status == false){
			
			$this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

			if($this->conn->error){
				die($this->conn->error);
			}
			else{
				$this->status == true;
			}
		}
		return $this->conn;

	}

	public function __destruct(){

		if ($this->status == true){
			$this->conn->close();
			$this->status == false;	
		}
	}
}

class Operations extends DataBase{
	private $name;
	private $email;
	private $country;
	protected $sql;

	public function addRecord(Database $obj, $n, $e, $c){
		$this->name    = $n;
		$this->email   = $e;
		$this->country = $c;

		$this->sql = "INSERT INTO users(name, email, country) VALUES (?,?,?)";

		$stmt = $this->conn->prepare($this->sql);
		if ($stmt){
			$stmt->bind_param('sss', $this->name, $this->email, $this->country);
			if($stmt->execute()){echo "<div class='alert alert-success mt-3'> Added Successdully </div>";}
			else{echo "Refuse to add a new record";}
		}
		else{
			echo "Request forebidden - error occur !!.";
		}
	}

	public function stuDetail(Database $obj, $country){

			$this->sql = "SELECT country,  count(name) as total_students from users where country = '$country' GROUP BY country";
			$result = $this->conn->query($this->sql) or die($this->conn->error);
			
			if($result->num_rows > 0){
				while($count = $result->fetch_assoc()){
					
					echo "<tr>";
					echo "<td>".$count['country']."</td>";
					echo "<td>".$count['total_students']."</td>";
					echo "</tr>";
				}
			}
			else{			
				echo "<script>alert('No tudent found against country " . $country;
				echo " ')</script>";
			}
	}
}

$db = new DataBase;

$opr = new Operations();

if(isset($_POST['fv1']) AND isset($_POST['fv2']) and isset($_POST['fv3'])){

	$name    = $_POST['fv1'];
	$email   = $_POST['fv2'];
	$country = $_POST['fv3'];

	$opr->addRecord($db, $name, $email, $country);
}

if(isset($_POST['explore'])){
	$opr->stuDetail($db, $_POST['explore']);
}

?>