<?php 
if (isset($_POST['register'])){

  if (($_POST['username'] == '') || ($_POST['email'] == '') || ($_POST['password'] == '') || ($_POST['gender'] == '')){
    echo "<script>alert('Fill out form fields');</script>";
  }
  else{

    include 'config.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!$email){
      echo "<script>alert('Invalid email address');</script>";
    }
    elseif (strlen($password) < 7 || strlen($password) > 30){
      echo "<script>alert('Password length must be more than 7 characters and alphanumeric');</script>";
    }
    elseif(!ctype_alnum($password)){
      echo "<script>alert('Password must be alphanumeric');</script>";
    }
    else{
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      // Check weather a user exists!
      $sql = "INSERT INTO users (username, email, password, gender) VALUES (?,?,?,?)";
      $stmt = $conn->prepare($sql);
      if($stmt){
        $stmt->bind_param('ssss', $username, $email, $password, $gender);
        if ($stmt->execute()){
          echo "<script>alert('Registered Successfully, Now you can login to your account');</script>";         
        }
        else{
          echo "<script>alert('Email already exists in our DB choose different email address');</script>";
        }
      }      
    }
  }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
   
   <!-- Font Awsome icons -->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="css/style.css">

 <title>Final, Project</title>
</head>
<body>
  
<!-- registration Area start -->

<div class="container register">
        <h2 class="text-center mb-2 main-head">Register Yourself</h2>

    <div class="row justify-content-center my-5">
        <div class="col-md-8 col-sm-12">

          <form method="POST" action="">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
              </div>
            </div>
            
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="gender" value="male" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="gender" value="female" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Female</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="gender" value="others" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline3">Others</label>
              </div><br><br>
             

            <button type="submit" class="btn btn-primary" name="register">Register Yourself</button>
            <small class="d-flex"><a href="user/login.php" class="text-primary">Already have an account?</a></small>
          </form>
        </div>
    </div>
</div>


<!-- registration Area end -->

<!-- Link Bootstrap & JS -->
<script src="js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>