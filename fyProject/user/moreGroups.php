<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
	include '../config.php';
  	$sql = "SELECT * FROM users WHERE  email = '".$_SESSION['USEREMAIL']."'";
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

 <title>Group Name</title>
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
      <li><a href="moreGroups.php" class="nav-link px-2 link-dark">Explore</a></li>
      <li>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="mygroups.php" class="nav-link">Groups</a>
          <abbr title="Create a Group"><a href="group.php" ><i class="fas fa-plus"></i></a></abbr>
        </div>
      </li>
    </ul>

    <div class="col-md-3 text-end">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <a href="profile_setting.php" class="float-right profile" id="userDP"><img src="<?php echo 'profile_pic/'.$res['picture']; ?>"></a>
  </header>


		<input type="text" name="moreGroup" placeholder="Search for Group" class="form-control mb-md-4 mb-3">

		<div class="row row-cols-md-3 justify-content-around">
			<?php moreGroup(); ?>
		</div>  

<!-- container end -->
</div>


<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>


<?php 
function moreGroup(){
	GLOBAL $conn;

	$sql = "SELECT * FROM groups WHERE admin_id != {$_SESSION["UID"]}";
	$res = $conn->query($sql);

	if ($res->num_rows > 0){
		while ($data = $res->fetch_assoc()){
			echo '
				  <div class="card bg-transparent shadow shadow-sm">
				    <span class="p-3"><img src="'.$data["g_profile"].'" class="d-block mx-auto img-fluid" style="max-width: 80px;"></span>
				    <div class="card-body">
				      <h5 class="card-title">'.$data["g_name"].'</h5>
				      <p class="card-text">'.$data["g_desc"].'</p>
				    </div>
				    <div class="card-footer">
				    	<button type="button" class="btn btn-primary btn-block">Join</button>
				    </div>
				  </div>
			';
		}
	}
}

?>