<?php 
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

function errors($index_name){
	$error = array(
	"Missing field"  	  => "Error: All fields required",
	"Invalid email" 	  => "Error: Invalid email", 
	"Email exists"   	  => "Error: Email already exists",
	"not matched"	 	  => "Error: Invalid email or password",
	"invalid id"	   	  => "Error: ID must be Integer"	,
	"invalid old passkey" => "Error Invalid old password",
	"new && confirm new passkey must be same" => "Error: New && Confirm new Password must be the same",
	"not updated"		  => "Error: Something went wrong while updating password"
	);
	echo "<div id='errors'>".$error[$index_name]."</div>";
}

function success($index_name){
	$success = array(
	"register"		   => "Registered successfully",
	"Password updated" => "Password Updated Successfully"						
	);
	echo "<div id='success'>".$success[$index_name]."</div>";
}

function valid_sanitize_inputs($arg){
	$fullname = filter_var($arg["fullname"], FILTER_SANITIZE_STRING);
	$email = filter_var($arg["email"], FILTER_SANITIZE_EMAIL);
	$password = password_hash($arg["password"], PASSWORD_DEFAULT);

	$email = filter_var($arg["email"], FILTER_VALIDATE_EMAIL);
	if (!$email) {
	 	return "Invalid email";
	 } 

	 return array("fullname" =>$fullname, "email" =>$email, "password" =>$password);
}

function validate_login($arg){
	$email = filter_var($arg["email"], FILTER_SANITIZE_EMAIL);
	$password = $arg["password"];

	$email = filter_var($arg["email"], FILTER_VALIDATE_EMAIL);
	if (!$email) {
	 	return "Invalid email";
	 } 
	return array("email" => $email, "password" => $password); 
}

function validate_id($arg){
	$id = $arg['id'];
	if(!filter_var($id, FILTER_VALIDATE_INT)){
		return "invalid id";
	} 
	return true;
}
?>