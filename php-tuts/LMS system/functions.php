<?php 
function check_inputs($arg){
	if (is_array($arg)) {
		foreach ($arg AS $input) {
			if ($input == "" OR $input == null){
				return "Missing field";
			}
		}
	}
	return true;
}
function error($index_name){
	$error = array("Missing field" => "All fields required",
              "Invalid email" => "Error: Invalid email",
              "email exists" => "Error: email already exists",
              "info not found"  => "Error: Invalid email or password",
              "Unable to login" => "Error: Login failed!!",
              "button not pressed" => "Error: You cannot access without choosing a file",
              "Invalid format"		=> "Error: It's not an image file",
              "not uploaded"		=> "Unable to upload file in folder"
              
              );
	echo "<div id='error'>".$error[$index_name]."</div>";
}
function success($index_name){
	$success = array("register" => "Registered Successfully",
                     "Found"    => "Congradulation!! signedup successfully"
                );
	echo "<div id ='success'>".$success[$index_name]."</div>";
}

function input_validation($arg){
	$fname = filter_var($arg['fname'], FILTER_SANITIZE_STRING);
	$lname = filter_var($arg['lname'], FILTER_SANITIZE_STRING);
	$password = $arg['password'];
	$email = filter_var($arg['email'], FILTER_VALIDATE_EMAIL);

	if (!$email) {
		return "Invalid email";
	}	
	$email = filter_var($arg['email'], FILTER_SANITIZE_EMAIL);
	$dob = $arg['dob'];
	$gender = $arg['gender'];
	return array(
				"fname"	=>$fname,
				"lname"	=>$lname,
				"email"		=>$email,
				"password"	=>$password,
				"dob"		=>$dob,
				"gender"	=>$gender
	);
}


function validate_login_inputs($arg){
	$password = $arg['password'];
	$email = filter_var($arg['email'], FILTER_VALIDATE_EMAIL);
	if (!$email) {
		return "Invalid email";
	}
	$email = filter_var($arg['email'], FILTER_SANITIZE_EMAIL);
	return array("password" => $password,
				 "email"    => $email		        
		        );
}
?>