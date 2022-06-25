<?php 

if(
     $_POST['First_name']!="" and
     $_POST['Sur_name'] !="" and
     //$_POST['Email address']!="" and
     $_POST['Password']!="" and
     $_POST['re-psw'] !="" and
     $_POST['Ph_no']!=""
){
    echo $_POST['First_name'] ."<br>";
    echo $_POST['Sur_name'] ."<br>";

    //echo $_POST['Email address'] ."<br>";

    echo $_POST['Password'] ."<br>";

    echo $_POST['re-psw'] ."<br>";
    echo $_POST['Ph_no'] ."<br>";


}

else{
	echo "You must have fill all the fields";
}

 ?>