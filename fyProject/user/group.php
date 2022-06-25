<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
  include '../config.php';
  $sql = "SELECT * FROM users WHERE email = '".$_SESSION['USEREMAIL']."'";
  $result = $conn->query($sql);
  $res = $result->fetch_assoc();
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
   <link rel="stylesheet" type="text/css" href="../css/style.css">

 <title>Create Group</title>
</head>
<body>


<!-- navbar start -->

<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="profile.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="messages.php" class="nav-link px-2 link-dark">Messages</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">Explore</a></li>
      <li><a href="mygroups.php" class="nav-link px-2 link-dark">My Groups</a></li>
    </ul>

    <div class="col-md-3 text-end">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <a href="profile_setting.php" class="float-right profile" id="userDP"><img src="<?php echo 'profile_pic/'.$res['picture']; ?>"></a>
  </header>
</div>

<div class="container my-5">
  <h3 class="text-center bg-danger text-light p-2">Create Group</h3>
  <div class="row my-5">
    <div class="col-md-6 offset-md-3">
      <form id="newGroup">
        <div class="form-group my-3">
          <input type="text" class="form-control shadow shadow-sm py-4" id="GroupName" placeholder="Group name">
        </div>
        <div class="form-group">
          <label for="GroupDescription" class="form-label">Description</label>
          <textarea type="textarea" id="GroupDescription" class="form-control shadow shadow-sm mb-4" rows="3"></textarea>
        </div>
        <button type="button" id="CreateGroup" class="btn btn-block btn-info">Create Group</button>
        <div id="errormsg" class='text-danger text-center'></div>
      </form>
    </div>
  </div>
</div>


<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
