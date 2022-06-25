	<?php 
	$conn = new mysqli("localhost", "root", "", "ajax");

	/* Match user's enter Email with DB-EMAIL

	if (isset($_POST['email']) || isset($_POST['password'])){
		$password = $_POST['password'];

		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

		if (!$email){
			echo "<div class='alert alert-danger text-center' role='alert'>Invalid 	email</div>";
		}
		else{
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);

			$sql = "SELECT email, password FROM usersignup WHERE email = '".$email."' AND password = '".$password."' LIMIT 1 ";
			$result = $conn->query($sql);

			if ($result->num_rows == 1){
				echo "<div class='alert alert-warning text-center'>Email already exists</div>";
			}
			else{
				echo "<div class='alert alert-success'>We're good to go with this email and pass</div>";
			}
		}
	}

	*/

	/* Insert Info into DB using Ajax request method wthout page reload

	if (isset($_POST['email']) || isset($_POST['password']) || isset($_POST['name'])){
		$name     = $_POST['name'];
		$email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
		$password = $_POST['password'];

		if (!$email){
			echo "<div class='alert alert-warning'>Invalid email</div>";
		}
		else{
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$sql = "INSERT INTO usersignup (username, email, password) VALUES (?,?,?)";
			$stmt = $conn->prepare($sql);

			if ($stmt){
				$stmt->bind_param('sss', $name, $email, $password);
				$exe = $stmt->execute();

				if ($exe){
					echo "<div class='alert alert-success'>data inserted successfully!!</div>";			
				}
				else{
					echo "<div class='alert alert-danger' role='alert'>email already exists</div>";
				}
			}
			else{
				echo "<div class='alert alert-danger' role='alert'>error while preparing statement object</div>";
			}

		}
	}

	*/

	//Now all the ajax technique apply in a single program

	if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['password'])){

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

		if (!$email){
			echo "<div class='text-danger'>Invalid Email </div>";
		}
		else{
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);	

			$sql = "SELECT email FROM usersignup WHERE email = '$email' LIMIT  1";
			$result = $conn->query($sql);

			if ($result->num_rows == 1){
				echo "<div class='text-danger'>Choose different email </div>";		
			}
			else{
				$ins_sql = "INSERT INTO usersignup (username, email, password) VALUES (?,?,?)";
				$stmt = $conn->prepare($ins_sql);
				if ($stmt){
					$stmt->bind_param('sss', $name, $email, $password);
					if ($stmt->execute()){
						echo "<div class='text-success'>data inserted</div>";
					}
				}
			}
		}	

	}
?>
<?php
	function show_data(){
		GLOBAL $conn;
		if (isset($_GET['ajax']) && ($_GET['ajax'] == 'show')){
			$sql = "SELECT * FROM usersignup";
			$result = $conn->query($sql);
			
			if ($result->num_rows >0){
				?>
				<table class='table table-responsive table-dark table-hover'>
					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
						</tr>
					</thead>
					<?php
				while ($data = $result->fetch_assoc()){
					?>
					
						<tbody>
							<tr>
								<td><?php echo $data['username']; ?></td>
								<td><?php echo $data['email']; ?></td>
								<td><?php echo $data['password']; ?></td>
							</tr>
						</tbody>
					<?php
					
				} //while end
				?>
				</table>
				<?php
			}
			else{
				echo "<div class='text-secondary'>No record found in the DB table</div>";
			}
		}
	}

show_data();
?>

