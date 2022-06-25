<?php

session_start();

if(isset($_SESSION['id'])){
    header("Location: home.php");
}

    require_once 'config.php';

    if (isset($_POST['registerBtn'])){
        
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $email    = mysqli_real_escape_string($conn, $_POST['remail']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $gender   = mysqli_real_escape_string($conn, $_POST['gender']);

        $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password, gender) VALUES (?,?,?,?)");

        mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $password, $gender);

        if(mysqli_stmt_execute($stmt)){
            // $_SESSION['id'] = mysqli_insert_id($conn);
            header("Location: index.php?success=SignedUp");
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
                <a href="index.php" class="btn btn-danger text-light">Login</a>
            </nav>
        </div>
        <!-- loign Row -->
        <div class="row mt-5 justify-content-center bg-info p-5">
            <div class="col-md-7 col-10">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group row">
                        <label for="name" class="form-label text-light">Username</label>                    
                        <input type="text" required class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>

                    <div class="form-group row">
                        <label for="remail" required class="form-label text-light">Email</label>                    
                        <input type="email" class="form-control" id="remail" name="remail" placeholder="email@example.com">
                    </div>
                    <!-- verify email address -->
                    <div id="validate" class="text-danger mt-0"></div>
                    <div class="form-group row mb-0">
                        <label for="password" class="form-label text-light">Password</label>                    
                        <input type="password" required class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>

                    <div class="my-3 text-light">
                        <div class="custom-control d-inline custom-radio mr-4">
                            <input type="radio" class="custom-control-input" id="male" name="gender" value="male" required>
                            <label class="custom-control-label" for="male">Male</label>
                        </div>

                        <div class="custom-control d-inline  custom-radio mr-4">
                            <input type="radio" class="custom-control-input" id="female" value="female" name="gender">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>

                        <div class="custom-control d-inline custom-radio">
                            <input type="radio" class="custom-control-input" id="other" value="other" name="gender" required>
                            <label class="custom-control-label" for="other">Other</label>
                            <div class="invalid-feedback">More example invalid feedback text</div>
                        </div>
                    </div>

                    <button type="submit" id="registerBtn" name="registerBtn" class="btn btn-success btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>


<!-- link jQuery  -->
<script src="js/jquery.js"></script>

<!-- Link custom jQuery file -->

<script src="js/script.js"></script>

</body>
</html>