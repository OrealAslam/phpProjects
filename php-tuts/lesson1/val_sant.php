

<?php 
/*
filter_has_var(); returns True on success and it returns flase on failure.





if (!filter_has_var(INPUT_POST, "fname")) {
    echo("Name found")."<br>";
   echo $_POST["fname"];
} else {
    echo("Oops!!.. name not found");
}
*/

if(!$_POST["firstname"]==""){
	echo $_POST["firstname"] . "<br>";
}
else{
	echo "firstname is missing<br>";
}

if(!$_POST["lastname"]==""){
	echo $_POST["lastname"]."<br>";
}
else{ echo "lastname is missing<br>";
}
if(!$_POST["password"]==""){
	echo $_POST["password"] . "<br>";
}
else{
	echo "password required!<br>";
}

if (!$_POST["re-psw"]=="") {
	echo $_POST["re-psw"]."<br>";
}
else{
	echo "re-type password<br>";
}
if($_POST["password"]!==$_POST["re-psw"]){
	echo "Password not match<br>";
}
if(!$_POST["email"]==""){

				if (filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)) {

							if(filter_input(INPUT_POST, "email" , FILTER_SANITIZE_EMAIL)){

								echo $_POST["email"] . "<br>";
							}
						}	
						else{
							echo $_POST["email"] . "is not valid<br>";
						}

}
else{
	echo "Email required<br>";
}






?>


