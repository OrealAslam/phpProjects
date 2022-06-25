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

 <title>Final, Project</title>
</head>
<body>


<div class="container mb-4 p-0">

  <!-- navbar start -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="profile.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="messages.php" class="nav-link px-2 link-dark">Messages</a></li>
      <li><a href="moreGroups.php" class="nav-link px-2 link-dark">Explore</a></li>

    </ul>

    <div class="col-md-3 text-end">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <a href="profile_setting.php" class="float-right profile" id="userDP"><img src="<?php echo 'profile_pic/'.$res['picture']; ?>"></a>
  </header>
</div>
<!-- navbar end -->

<!-- message area start -->

<div class="container mt-md-5 mt-sm-3">
  <div class="row justify-content-center row1">
    <h3 class="py-2 messageDiv">Message the Community</h3>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="list-group list-group-flush">
        <!-- Search a User -->
        <!-- Avaliable Users start -->

        <div>
          <?php
          $sql = "SELECT id, username FROM users WHERE id != '".$_SESSION['UID']."'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($user = $result->fetch_assoc()){
          ?>
          <form action="viewmessage.php" method="GET">
            <button type="submit" id="userId" class="list-group-item list-group-item-action"><input type="hidden" name="mUid"  value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?><span class="float-right">Active</span></button>
          </form>
        <?php }} ?>
        </div>

        <!-- Avaliable Users end -->
      </div>
    </div>
  </div>
</div>
<!-- message area end -->


<!-- Message Live Search -->

</body>
<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

<?php
}
?>