<?php 

// Function that check input fields
function check_input($arg){
	if (is_array($arg)) {
		foreach ($arg as $input) {
			if ($input =="" OR $input == null) {
				return "Missing field";
			}
		}
	}
	return true;
}

//Function that holds errors
function errors($index_name){

	$error = array( "Missing field"       => "All fields required",
				    
				    "Invalid email"       => "Error: enter a valid email address",
				    "Email exists"        => "Error: email already exists",
				    "Invalid credensials" => "Error : Invalid email or password",
				    "Invalid id"          => "Error : Invalid user id!!",
				    "Not matched"         => "Error: new and confirm new password must be same/matched",
				    "incorrect password"  => "Error : Incorrect Old Password",
				    "OOHOH!!"             => "Error : Something went wrong while updating password"
			  );

	echo "<div id='error'>" .$error[$index_name]."</div>";
}

//Function that hold success messages
function success($index_name){
	$success = array("Signin"  => "Signin successfully!!", "Updated" => "Password updated successfully!!");
	echo "<div id='success'>".$success[$index_name]."</div>";
}

//Fuction to validate inputs

function valid_inputs($arg){
	$username = filter_var($arg["username"], FILTER_SANITIZE_STRING);
	
	$password = password_hash($arg["password"], PASSWORD_DEFAULT);
	
	$email    = filter_var($arg["email"], FILTER_VALIDATE_EMAIL);
	if(!$email){
			return "Invalid email";
	}

	$email  = filter_var($arg["email"], FILTER_SANITIZE_EMAIL);
	$dob    = $arg["dob"];
	$phone  = $arg["phone"];
	$gender = $arg["gender"];
return array( "username"  		 => $username,
			  "password"  		 => $password,
			  
			  "email"      		 => $email,
			  "dob"       		 => $dob,
			  "phone"     		 => $phone, 
			  "gender"    		 => $gender
	    
	    );

}

function valid_inputs_login($arg){
	
	
	$password = $arg["password"];
	
	$email    = filter_var($arg["email"], FILTER_VALIDATE_EMAIL);
	if(!$email){
			return "Invalid email";
	}

	$email  = filter_var($arg["email"], FILTER_SANITIZE_EMAIL);
	
return array( 
			  "password" => $password, "email" => $email);

}

function check_password($arg){
	$id = filter_var($arg["id"], FILTER_VALIDATE_INT);
	if(!$id){
		return "Invalid id";
	}
	elseif ($arg["new-pass"]!== $arg["confirm-pass"]) {
		return "Not matched";
	}
	return true;
}

?>