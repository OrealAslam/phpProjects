<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}
else{

include_once '../config.php';
// Search a User

	if (isset($_POST['Asearch'])){
		$like = mysqli_real_escape_string($conn, $_POST['Asearch']);

		$sql = "SELECT * FROM users WHERE username LIKE '%{$like}%'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			$like = $result->fetch_assoc();
			
			echo '<table class="table table-bordered table-hover" id="SearchUser">';
			echo'<thead>
					<tr>
						<th>Id</th>
						<th>Username</th>
						<th>Email</th>
						<th>Password</th>
						<th>Picture</th>
						<th>Action</th>
					</tr>
				</thead>
			<tbody>';

			echo '
				<tr>
					<td>'.$like["id"].'</td>
					<td>'.$like["username"].'</td>
					<td>'.$like["email"].'</td>
					<td>'.$like["password"].'</td>
					<td><img class="img-fluid" style="max-width:50px;" src=../user/profile_pic/'.$like["picture"].'></td>
					<td>
						<form method="POST" action="edituser.php">
							<input type="hidden" name="UserId" value='.$like["id"].'>
							<div class="btn-group btn-block" role="group" aria-label="Basic example">
											  <button type="submit" name="EditUser" class="btn btn-success"><i class="fas fa-user-edit"></i></button>
											  <button type="submit" name="DelUser" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
											</div>
						</form>
					</td>
				</tr>
			';
		}
		else{
			echo "<p class='text-danger text-center'>No matched found</p>";
		}
	}

}

// Group Count

function GroupCount(){
	GLOBAL $conn;

	if (isset($_GET['sum']) AND $_GET['sum'] == 'group'){
		$sql = "SELECT * FROM groups";
		$res = $conn->query($sql);
		$count = $res->num_rows;
		echo $count;
	}
}
GroupCount();

// function update Password

function UpdatePassword(){
	GLOBAL $conn;
	if (isset($_POST['old']) && isset($_POST['new']) && isset($_POST['cpass'])){

		$oldpass = mysqli_real_escape_string($conn, $_POST['old']);
		$newpass = mysqli_real_escape_string($conn, $_POST['new']);
		$confirmpass = mysqli_real_escape_string($conn, $_POST['cpass']);

		if ($newpass !== $confirmpass){
			die("<p class='text-danger'>New and confirm new password must be same</p>");
		}
		if (strlen($newpass)<= 7 || strlen($newpass) >30){
			die("<p class='text-info'>Password length must be > 7 or <= 30 characters</p>");
		}
		if (!ctype_alnum($newpass)){
			die("<p class='text-warning'>Password must be alphanumeric</p>");
		}
		else{
			$sql = "SELECT password FROM admin_details WHERE email = '".$_SESSION['ADMINEMAIL']."' ";
			$result = $conn->query($sql);
			if ($result->num_rows == 1){
				$data = $result->fetch_assoc();

				if ($oldpass !== $data['password']){
					echo "<p class='text-danger'>Invalid Old password</p>";
				}
				else{
					// password matched now change user password

					$sql = "UPDATE admin_details SET password = ? WHERE email = ?";
					$stmt = $conn->prepare($sql);
					if ($stmt){
						$stmt->bind_param('ss', $confirmpass, $_SESSION['ADMINEMAIL']);
						if ($stmt->execute()){
							echo "<p class='text-info'>Password Updated Successfully</p>";
						}
						else{
							echo "<p class='text-danger'>Error occur while updating password</p>";
						}
					}
				}
			}
			else{
				echo "Invalid Old password";
				die();
			}
		}
	}
}
UpdatePassword();

?>