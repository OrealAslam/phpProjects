<?php 
session_start();
if (!isset($_SESSION['USEREMAIL'])){
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{

include_once '../config.php';

	if (isset($_POST['comp']) || isset($_POST['pos']) || isset($_POST['city']) || isset($_POST['desc'])){
		
		$company = mysqli_real_escape_string($conn, $_POST['comp']);
		$position = mysqli_real_escape_string($conn, $_POST['pos']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$desc = mysqli_real_escape_string($conn, $_POST['desc']);

// SANITIZE user INPUT

		$company  = filter_var($company, FILTER_SANITIZE_STRING);
		$position = filter_var($position, FILTER_SANITIZE_STRING);
		$city     = filter_var($city, FILTER_SANITIZE_STRING);
		$desc     = filter_var($desc, FILTER_SANITIZE_STRING);

		if(!$company || !$position || !$city || !$desc){
			die('Invalid value entered. Check the desired field');
		}
		$sql = "SELECT * FROM user_bio WHERE user_id = '".$_SESSION['UID']."'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1){
			// UPDATE Query
			$sql = "UPDATE user_bio SET company_name = ?, position = ?, city = ?, description = ? WHERE user_id = ?";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('ssssi', $company, $position, $city, $desc, $_SESSION['UID']);
				if ($stmt->execute()){
					echo "<div class='text-success'>Updated Successfully!!!...</div>";
				}
				else{
					echo "<div class='text-danger'>Unable to update your bio</div>";
				}
			}
			else{
				echo "<div class='text-danger'>Unable to process your request. Try again later..!!</div>";
			}
		}	
		else{
			// INSERT Query
			$sql = "INSERT INTO user_bio (user_id, company_name, position, city, description) VALUES (?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('issss', $_SESSION['UID'], $company, $position, $city, $desc);
				if ($stmt->execute()){
					echo "<div class='text-success'>Successfully update your Bio</div>";
				}
				else{
					echo "<div class='text-danger'>Unable to update your bio</div>";
				}
			}
			else{
					echo "<div class='text-danger'>Unable to process your request. Try again later..!!</div>";
			}
		}	

	}

	// Lived Places

	if (isset($_POST['c_city']) || isset($_POST['h_town'])){
		$currCity = mysqli_real_escape_string($conn, $_POST['c_city']);
		$HomeTown = mysqli_real_escape_string($conn, $_POST['h_town']);

		$currCity = filter_var($currCity, FILTER_SANITIZE_STRING);
		$HomeTown = filter_var($HomeTown, FILTER_SANITIZE_STRING);

		$sql = "SELECT * FROM user_bio WHERE user_id = '".$_SESSION['UID']."'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1){
			// UPDATE Query
			$sql = "UPDATE user_bio SET current_city = ?, hometown = ? WHERE user_id = ?";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('ssi', $currCity, $HomeTown, $_SESSION['UID']);
				if ($stmt->execute()){
					echo "<div class='text-success'>Updated Successfully!!!...</div>";
				}
				else{
					echo "<div class='text-danger'>Unable to update your bio</div>";
				}
			}
			else{
				echo "<div class='text-danger'>Unable to process your request. Try again later..!!</div>";
			}
		}	
		else{
			// INSERT Query
			$sql = "INSERT INTO user_bio (user_id, current_city, homwtown) VALUES (?,?,?)";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('iss', $_SESSION['UID'], $currCity, $HomeTown);
				if ($stmt->execute()){
					echo "<div class='text-success'>Successfully update your Bio</div>";
				}
				else{
					echo "<div class='text-danger'>Unable to update your bio</div>";
				}
			}
			else{
					echo "<div class='text-danger'>Unable to process your request. Try again later..!!</div>";
			}
		}

	}

	// contact and basic info

	if (isset($_POST['mobile']) || isset($_POST['addr']) || isset($_POST['web'])|| isset($_POST['lang'])|| isset($_POST['religion']) || isset($_POST['dob']) || isset($_POST['interested'])){
		
		$mobile     = mysqli_real_escape_string($conn, $_POST['mobile']);
		$addr       = mysqli_real_escape_string($conn, $_POST['addr']);
		$web        = mysqli_real_escape_string($conn, $_POST['web']);
		$lang       = mysqli_real_escape_string($conn, $_POST['lang']);
		$religion   = mysqli_real_escape_string($conn, $_POST['religion']);
		$dob        = mysqli_real_escape_string($conn, $_POST['dob']);
		$interested = mysqli_real_escape_string($conn, $_POST['interested']);

		$addr       = filter_var($addr, FILTER_SANITIZE_STRING);
		$web        = filter_var($web, FILTER_SANITIZE_STRING);
		$lang       = filter_var($lang, FILTER_SANITIZE_STRING);
		$religion   = filter_var($religion, FILTER_SANITIZE_STRING);
		$interested = filter_var($interested, FILTER_SANITIZE_STRING);

		$sql = "SELECT * FROM user_bio WHERE user_id = '".$_SESSION['UID']."'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1){
			// UPDATE Query
			$sql = "UPDATE user_bio SET mobile = ?, address = ?, website = ?, language = ?, religion = ?, interested_in = ?, birthdate = ? WHERE user_id = ?";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('sssssssi', $mobile, $addr, $web, $lang, $religion, $interested, $dob, $_SESSION['UID']);
				if ($stmt->execute()){
					echo "<div class='text-success'>Updated Successfully!!!...</div>";
				}
				else{
					echo "<div class='text-danger'>Unable to update your Info.</div>";
				}
			}
			else{
				echo "<div class='text-danger'>Unable to process your request. Try again later..!!</div>";
			}
		}	
		else{
			// INSERT Query
			$sql = "INSERT INTO user_bio (user_id, mobile, address, website, language, religion, interested_in, birthdate) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('isssssss',$_SESSION['UID'], $mobile, $addr, $web, $lang, $religion, $interested, $dob);
				if ($stmt->execute()){
					echo "<div class='text-success'>Successfully update your Bio</div>";
				}
				else{
					echo "<div class='text-danger'>Unable to update your bio</div>";
				}
			}
			else{
					echo "<div class='text-danger'>Unable to process your request. Try again later..!!</div>";
			}
		}
	}
	else{
		die('<div class="text-danger">Empty fields recognized</div>');
	}

}

?>