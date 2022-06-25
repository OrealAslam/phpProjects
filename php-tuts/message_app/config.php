<?php 
session_start();

// Parent class that establish Connection with DB
class Db_connect{
	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_name = 'msg_app';
	private $conn    = '';

	private $id = '';
	private $message = '';

	public function __construct(){
		$this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

		if (!$this->conn){
			echo "failed to connect" . die($this->conn->error());
		}
		return $this->conn;
	}


	public function insert($post, $file){


		$name = $post['username']; 
		$email = filter_var($post['email'], FILTER_VALIDATE_EMAIL); 

		if(!$emil){header("location:index.php?error:invalid");}
		$email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
		$pass = password_hash($post['password'], PASSWORD_DEFAULT);

		$filename  = $file['p_pic']['name'];

		$tmp_dir   = $file['p_pic']['tmp_name'];

		$filetype = $file['p_pic']['type'];

		$upload_folder = "user_img/".$filename;

		// checking blank input fileds

		if (($post['username'] == "") || ($post['email'] == "") || ($post['password'] == "") || ($file['p_pic'] == "")){
			header("location:index.php?error=req");
		}
		else{

			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			// CHECKING IMAGE TYPE

			if($ext =='png' OR $ext =='jpg' OR $ext =='jpeg' OR $ext =='gif'){
				$upload = move_uploaded_file($tmp_dir, $upload_folder);

				if($upload){

					$sql = "INSERT INTO users (username, email, password, profile_pic) VALUES (?,?,?,?)";

					$stmt = $this->conn->prepare($sql);

					if ($stmt){
						$stmt->bind_param('ssss', $name, $email, $pass, $upload_folder);

						if($stmt->execute()){
							header("location:login.php.php");
						}
						else{
							if (file_exists($upload_folder)){
								unlink($upload_folder);
								header("location:index.php?error=failedsignup");
							}
						}
					}
					else{
						header("location:index.php?error=stmtfail");
					}
				}
				else{
					header("location:index.php?error=failedupload");
				}	
			}
			else{
				header("location:index.php?error=notimg");
			}
		}	
	}

	public function login($post){

		$email = $post['email'];
		$pass  = $post['password']; 

		if( ($post['email'] == "") || ($post['password'] == "") ){
			header("location:login.php?error=req");
		}

		$email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);

		if (!$email){
			header("location:login.php?error=invalid_email");
		}

		$email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);

		$sql = "SELECT email, password FROM users WHERE email = ?";

		$stmt = $this->conn->prepare($sql);

		if($stmt){
			$stmt->bind_param('s', $email);
			$stmt->bind_result($db_email, $db_password);
			$stmt->execute();
			$stmt->fetch();

			if (!empty($db_email) || !empty($db_password)){
				if (password_verify($pass, $db_password)){
					$_SESSION['ulogin'] = $post;
					header("location:account_page.php");

				}
				else{
					header("location:login.php?error=invalid_cre");
				}
			}
			else{
				header("location:login.php?error=invalid_cre");
			}
		}
		else{
			header("location:login.php?error=notpre");
		}
	}


	// displaying available  users for Message

	public function displayUserForMsg(){
		$sql = "SELECT id, username FROM users";
		$result = $this->conn->query($sql);
		if ($result->num_rows >0){			
			while ($data = $result->fetch_all()){
				return $data;
			}
		}
		else{
			header("location: account_page.php?error=norec");
		}
	}


	// insert msg into DB

	public function store_msg($post){

		if (($post['to_id'] == "") || ($post['message'] == "")){
			header("location: account_page.php?error=empty");
		}
		else{

			$to_id = mysqli_real_escape_string($this->conn, $post['to_id']);
			$to_id = filter_var($post['to_id'], FILTER_VALIDATE_INT);
			$msg   = mysqli_real_escape_string($this->conn, $post['message']);
			
			// Fetching from_id from SESSION variable

			$sql = "SELECT id FROM users WHERE email = '".$_SESSION['ulogin']['email']."'";
			$res = $this->conn->query($sql);
			$id = $res->fetch_assoc();

			// default status

			$status = 0;

			$from_id = filter_var($id['id'], FILTER_VALIDATE_INT);

			// now insert Msg into DB
			$insert_query = "INSERT INTO message (to_id, from_id, message, status) VALUES (?,?,?,?)";

			$stmt = $this->conn->prepare($insert_query);

			if ($stmt){
				$stmt->bind_param('iisi', $to_id, $from_id, $msg, $status);
				if ($stmt->execute()){
					header("location: account_page.php?success=sent");
				}
				else{
					header("location: account_page.php?error=notsend");
				}
			}
		}	
	}

	// DISPLAY NOTIFICATIONS

	public function notify(){

		$sql = "SELECT id FROM users WHERE email = '".$_SESSION['ulogin']['email']."'";
			$res = $this->conn->query($sql);
			$id = $res->fetch_assoc();

		$sql_query = "SELECT msg_id FROM message WHERE to_id = {$id['id']} AND status = 0";

		$result = $this->conn->query($sql_query);
		$count = $result->num_rows;
		return $count;
	}

	// displaying unread messages

	public function displayUnreadMessages(){

		$sql = "SELECT id FROM users WHERE email = '".$_SESSION['ulogin']['email']."'";
			$res = $this->conn->query($sql);
			$id = $res->fetch_assoc();

		$msg_query = "SELECT from_id, message FROM message WHERE to_id = {$id['id']} AND status = 0";
		$msg = $this->conn->query($msg_query);
		if ($msg->num_rows>0){
			// update seen message
			$seen = "UPDATE message SET status = 1 WHERE to_id = {$id['id']}";
		 	$result = $this->conn->query($seen);
		 	while ($data = $msg->fetch_assoc()){
		 		return $data;
		 	}
		}
		else{
			return 0;
		} 
	}
}

	
?>