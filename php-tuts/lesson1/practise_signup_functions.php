<?php 

function input_recieve($arg){
	if (is_array($arg)) {
		foreach ($arg as $input) {
			if ($input == "" OR $input == null) {
				return "Missing fields";
			}
		}
	}
	return true;
}

function error($index_name){
	$error = array("Missing fields"          		=>"Error: All fields required!!",
					 "Invalid email format"  		=>"Error: Invalid Email",
					 "Email already exists"  		=>"Error: Email already taken", 
					 "incorrect credentials" 		=>"Error: Incorrect email or password",
					 "Invalid user id"       		=>"Error: Id shoukd be integer",
					 "old and new pass. must same"  =>"Error: New and Confirm new password must be same",
					 "Invalid password" 			=>"Error: Incorrect old password",
					 "problems updating password"   =>"Error: something went wrong while updating pasword"
			);
	echo "<div id='error'>".$error[$index_name]."</div>";
}

function success($index_name){
	$success = array(    "Signup"          => "Signup successfully",
					 	"password updated" => "Congradulations password updated"
				);
	echo "<div id='success'>".$success[$index_name]."</div>";
}

function valid_sanitize_signup($input){
	$username = filter_var($input["username"], FILTER_SANITIZE_STRING);
	$password = password_hash($input["passkey"], PASSWORD_DEFAULT);
	$email    = filter_var($input["email"], FILTER_SANITIZE_EMAIL);

	$email    = filter_var($input["email"], FILTER_VALIDATE_EMAIL);
	if(!$email){
		return "Invalid email format";
	}

 return array("username"=>$username, "passkey"=>$password, "email"=>$email);
}

function valid_sanitize_login($input){
	
	$password = $input["passkey"];
	$email    = filter_var($input["email"], FILTER_SANITIZE_EMAIL);

	$email    = filter_var($input["email"], FILTER_VALIDATE_EMAIL);
	if(!$email){
		return "Invalid email format";
	}

 return array("passkey"=>$password, "email"=>$email);
}

function check_password($arg){
	$id = filter_var($arg['id'], FILTER_VALIDATE_INT);
	if(!$id){
		return "Invalid user id";
	}
	elseif ($arg['new_password'] !== $arg['confirm_password']) {
		return "old and new pass. must same";
	}
return true;	
}

?>