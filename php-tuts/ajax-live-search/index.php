<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location: home.php");
}

if (isset($_POST['login'])){
    require_once 'config.php';

    $email    = mysqli_real_escape_string($conn, $_POST['Lemail']);
    $password = mysqli_real_escape_string($conn, $_POST['Lpassword']);

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
    if($stmt){
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_bind_result($stmt, $db_id, $db_username, $db_email, $db_password, $db_gender);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_fetch($stmt);

        if(!empty($db_email)){
            if (password_verify($password, $db_password)) {
                $_SESSION['id'] = $db_id;
                header("Location: home.php?success=loggedIn");
            }
            else{
                header("Location: index.php?error=failed");
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
    <!-- link Bootstrap CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ajax Live Search</title>
</head>
<body>


    <div class="container">
        <!-- navbar row -->
        <div class="row my-3">
            <nav class="navbar navbar-dark w-100 bg-danger">
                <span class="navbar-brand mb-0 h1">Live Search Project</span>
                <?php
                if(isset($_GET['success']) AND $_GET['success'] == 'SignedUp'){
                    echo '<a href="registration.php" class="text-light btn btn-danger d-none">SignUp Here</a>';
                }
                else{
                    echo '<a href="registration.php" class="text-light btn btn-danger">SignUp Here</a>';

                }
                ?>
            </nav>
        </div>
        <!-- loign Row -->
        <div class="row mt-5 justify-content-center bg-primary p-5">
            <div class="col-md-7 col-10">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group row">
                        <label for="email" class="form-label text-light">Email</label>                    
                        <input type="email" class="form-control" id="Lemail" name="Lemail" required placeholder="email@example.com">
                    </div>
                    <span class="Lemail"></span>
                    <div class="form-group row">
                        <label for="password" class="form-label text-light">Password</label>                    
                        <input type="password" class="form-control" id="Lpassword" name="Lpassword" placeholder="Enter Password">
                    </div>
                    <span class="Lpass"></span>

                    <button type="submit" name="login" class="btn btn-outline-warning btn-block">Login</button>
                </form>
                <?php
                if(isset($_GET['error']) and $_GET['error'] == 'failed'){echo "<div class='text-center alert alert-info p-2 mt-2'>Invalid email or password</div>";}
                if(isset($_GET['error']) and $_GET['error'] == 'nlogin'){echo "<div class='text-center alert alert-warning p-2 mt-2'>Login first</div>";}
                ?>
            </div>
        </div>
    </div>


<!-- link jQuery  -->
<script src="js/jquery.js"></script>

<script src="js/script.js"></script>   


</body>
</html>