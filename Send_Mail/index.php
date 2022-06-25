<?php
session_start();
if(!isset($_SESSION['email'])){

    if(isset($_POST['signup'])){
        // Database Configuration
        require_once 'config.php';

        // setting value to variables
        $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
        $dob = trim(mysqli_real_escape_string($conn, $_POST['dob']));

        // signup script here
        $sql = "INSERT INTO users(`username`, `email`, `password`, `date of birth`) VALUES (?,?,?,?)";
        $statement = mysqli_prepare($conn, $sql);
        if($statement){
            mysqli_stmt_bind_param($statement, 'ssss', $username, $email, $password, $dob);
            $execute = mysqli_stmt_execute($statement);

            if($execute){
                echo '<script>';
                echo alert("SignUp successfully");
                echo '</script>';  
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
                <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" autocomplete="off" name="username" id="username" class="form-control" placeholder="Enter Username">

                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" autocomplete="off" name="email" id="email" class="form-control" placeholder="Enter email">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" autocomplete="off" name="password" id="password" class="form-control" placeholder="Enter password">

                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" autocomplete="off" name="dob" id="dob" class="form-control">
                    <br><br>
                    <button class="btn btn-primary" type="submit" name="signup">SignUp</button>
                    <a href="login.php">Already have an account?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>