<?php
session_start();
if(isset($_SESSION['email'])){
    header('Location: homepage.php');
}
else{
    if(isset($_POST['login'])){
        // Database Configuration
        require_once 'config.php';

        // setting value to variables
        
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));


        // signup script here
        $sql = "SELECT * FROM users WHERE `email` = ? AND `password` = ?";
        $statement = mysqli_prepare($conn, $sql);
        if($statement){
            mysqli_stmt_bind_param($statement, 'ss', $email, $password);
            $execute = mysqli_stmt_execute($statement);

            if($execute){
                $_SESSION['email'] = $email;
                define('OTP_VERIFY', mt_rand(11111, 99999));
                $_SESSION['OTP_VERIFY'] = OTP_VERIFY;
                $to = $_SESSION['email'];
                $subject = 'OTP Confirmation message';
                $body = "Yours Confirmation OTP code is :". OTP_VERIFY;
                $from = 'orealaslam@gmail.com';
                $headers = 'From: $from';
                // php mail function

                if(mail($to, $subject, $body, $from)){
                    header('Location: confirmPage.php');
                }
            }
            else{
                echo "Invalid username or password";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Authenticated Login Script PHP</title>
</head>
<body>
    <div class="container">
        <h3 class="text-center text-capitalize text-danger">SignUp for an Account</h3>
        <br><br>
        <div class="row">
            <div class="col-md-8">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" autocomplete="off" name="email" id="email" class="form-control" placeholder="Enter email">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" autocomplete="off" name="password" id="password" class="form-control" placeholder="Enter password">
                    <br><br>
                    <button class="btn btn-danger mr-2" type="submit" name="login">Login to your Account</button>
                    <a href="index.php">SignUp here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
