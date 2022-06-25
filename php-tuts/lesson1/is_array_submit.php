<?php 

function input_recieved ($arg){
	//agr $arg ki type array hoti ha tw eska mtlb ha k wo form sy data a rha ha 
	if (is_array($arg)) {
		foreach ($arg as $input) {
			if ($input == "" OR $input == null) {
				return "Missing Fields";
			}
		}
	}
	return true;
}

function errors ($index_name){
	$error = array("Missing Fields" => "Error: All fields required", "Invalid_email_format" => "Error: Incorrect email format", "email already exists" => "Error: email already exists");
	echo "<div id='error'>".$error[$index_name]."</div>";
}

function success($index_name){
	$success = array("signed_up" => "Signup successfully!!");
	echo "<div id='success'>".$success["signed_up"]."<div>";
}


function validate_sanitize($input){
	$fullname = filter_var($input["fname"], FILTER_SANITIZE_STRING);
	 $password = password_hash($input["password"], PASSWORD_DEFAULT); 
	 // pwd hashing technique ma hameesha DB ma password k size 255 ho ga 
	 $email   = filter_var($input["email"], FILTER_SANITIZE_EMAIL);

	  $email   = filter_var($input["email"], FILTER_VALIDATE_EMAIL);
	 if (!$email){
	  	return "Invalid_email_format";
	 }
return array("fname" => $fullname, "email" => $email, "password" =>$password);	 
}


?>