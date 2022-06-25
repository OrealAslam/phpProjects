<?php

// Database Configuration

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mail_configuration');


// connect to DB
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(mysqli_connect_errno()){
    $msg = '<script>alert("DB connection error!!")</script>';
    echo $msg;
}
// else{
//     // file return DB connection variable
//     return $conn;
// }


?>