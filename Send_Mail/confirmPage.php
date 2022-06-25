<?php
session_start();

if(!isset($_SESSION['email'])){
    header('Locatoin: login.php');
}
    // verify OTP Code

    if(isset($_POST['verifyOTP'])){
        $enterOTP = $_POST['enterOTP'];

        if($enterOTP == $_SESSION['OTP_VERIFY']){
            header('Location: homepage.php');
        }
        else{
            echo "Invalid OTP entered by the user";
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
    <title>Confirm OTP code</title>
</head>
<body>
    <div class="container mt-3">
        <h4>Enter OTP code send to your email address</h4>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="number" name="enterOTP" placeholder="Enter Code" class="form-control">
                    <button type="submit" name="verifyOTP" class="btn btn-dark">Verify OTP Code</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>