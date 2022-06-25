<?php

// Verify the email during SignUp (already exists or not !)

if(isset($_POST['verifyEmail'])){
    require_once 'config.php';

    $verifyEmail = mysqli_real_escape_string($conn, $_POST['verifyEmail']);

    $verifyEmail = filter_var($verifyEmail, FILTER_VALIDATE_EMAIL);
    
    if($verifyEmail){

        $verifyEmail = filter_var($verifyEmail, FILTER_SANITIZE_EMAIL);

        $SQL = "SELECT email FROM users WHERE email = ?";

        $stmt = mysqli_prepare($conn, $SQL);

        if($stmt){
            mysqli_stmt_bind_param($stmt, 's', $verifyEmail);
            if(mysqli_stmt_execute($stmt)){
                if(mysqli_stmt_fetch($stmt) > 0){
                    echo "Already taken! Choosse different email";
                }
            }
        }
    }
    else{
        echo "Invalid email address";
    }
}

?>