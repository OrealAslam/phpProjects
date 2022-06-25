<?php
define('TITLE', 'User Profile');
define('PAGE', 'Profile');

session_start();
include 'include/header.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}
else{
	
	$sql = "SELECT * FROM user_login WHERE email = '".$_SESSION['userlogin']['useremail']."'";
	require '../connection.php';
	$stmt = $conn->query($sql);
	$row = $stmt->fetch_assoc();
	$stmt->close();
	$conn->close();
}
?>

<!-- PHP update query code-->

<?php 
	if(isset($_POST['update'])){

		$username = $_POST['newusername'];
		$useremail = filter_var($_POST['newuseremail'], FILTER_VALIDATE_EMAIL);
		if(!$useremail){$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>Invalid email<div>";}
		$useremail = filter_var($_POST['newuseremail'], FILTER_SANITIZE_EMAIL);
		$userpasskey = $_POST['newphone'];

		if(($_POST['newusername'] == "") || ($_POST['newuseremail'] == "") || ($_POST['newphone'] == "")){
			$msg = "<div class='alert alert-warning text-center text-capitalize' role='alert'>All fields required<div>";
		}
		else{
			require '../connection.php';
			$sql = "UPDATE user_login SET username = '$username', email = '$useremail', phone = '$userpasskey' WHERE email = '$useremail' ";
			$stmt = $conn->query($sql);

			if ($stmt){
				$conn->close();
				$msg = "<div class='alert alert-success text-center text-capitalize' role='alert'>profile updated successfully<div>";
			}
			else{
				$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>unable to  prepare stmt object!!!!<div>";
			}			
		}		
	}
?>

<!-- include sidebar 1st column -->
<?php include 'sidebar.php'; ?>

<!-- main area 2nd column start -->

<div class="col-md-9 mx-md-2 mt-md-3 mt-4 text-white">
	<div class="card text-white py-4 bg-success">
		<div class="card-img">
			<div class="card-header">
				<div class="card-title">
					<h3 class="text-center">Personal Details</h3>
				</div>
				<div style="max-width: 950px; height: 0.5px; margin:0 auto; background-color: #fff;"></div>   <!-- just display a border line-->
			</div>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="row row-cols-3 justify-content-center">
					<div class="col-md-3">
						<label for="name">Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" id="name" readonly>
					</div>

					<div class="col-md-3">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" name="useremail" value="<?php echo $row['email']; ?>" id="email" readonly>
					</div>

					<div class="col-md-3">
						<label for="phone">Ph no.</label>
						<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" id="phone" readonly>
					</div>
				</div>

				<div class="row row-cols-3 justify-content-center mt-5">
					<div class="col-md-3">
						<label for="name">New Username</label>
						<input type="text" class="form-control" name="newusername" id="name">
					</div>

					<div class="col-md-3">
						<label for="email">New Email Address</label>
						<input type="email" class="form-control" name="newuseremail" id="email">
					</div>

					<div class="col-md-3">
						<label for="phone">New Ph no.</label>
						<input type="text" class="form-control" name="newphone" id="phone">
					</div>
				</div>
				<br>
				
				<div class="btn-group mt-3 float-right mr-5" role="group" aria-label="Basic example">
				  <button type="submit" name="update" class="btn btn-danger">Submit</button>
				  <button type="reset" class="btn btn-warning">Reset</button>
				</div>	

			</form><br><br><br>
			<?php if(isset($msg)){echo $msg;} ?>	
			</div>
		</div>
	</div>
</div>
<!-- main area 2nd column end -->


</div>  <!-- row end-->
</div>	<!-- container-fluid end-->





<!-- footer included -->
<?php
include 'include/footer.php';
?>