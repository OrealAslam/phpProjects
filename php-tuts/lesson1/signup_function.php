<?php 
function get_input($arg){
	if (is_array($arg)) {
		foreach ($arg as $input) {
			if ($input == "" OR $input == NULL) {
				return "Missing Fields";
			}
		}
	}
return true;	
}

function failed($index){
	$array = array("Missing Fields" => "All fields required", "Invalid email"=> "Invalid email address", "Email exists" => "Email already exists");
	echo "<div id='error'>" .$array[$index]. "</div>";
	return $array;
}

function execute($index){
	$array = array("signup" => "Congradulation signup successfully");
	echo "<div id='success'>" .$array[$index]. "</div>";
	return $array;
}

function val_san($input){
	$username = filter_var($input["fname"] ,FILTER_SANITIZE_STRING);	
	$password = password_hash($input["password"], PASSWORD_DEFAULT);
	$email    = filter_var($input["email"] ,FILTER_SANITIZE_EMAIL);

	$email    = filter_var($input["email"], FILTER_VALIDATE_EMAIL);

	if(!$email){
		return "Invalid email";
	} 
return array("fname" =>$username, "password" =>$password, "email" =>$email);	
}

?>