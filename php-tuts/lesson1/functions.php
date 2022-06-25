<?php 

// Sanitization of a string
function sanitize_string($var){
	filter_var($var, FILTER_SANITIZE_STRING);
	return $var;
}
// Validation of email

function validate_email($email){
	filter_var($email, FILTER_VALIDATE_EMAIL);
	return $email;
}

// Sanitization of email
function sanitize_email($email){
	filter_var($email, FILTER_SANITIZE_EMAIL);
	return $email;
}

	
?>