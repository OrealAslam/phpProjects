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

<!-- Group Controls -->
<?php 
if (isset($_POST['group_id']) AND isset($_POST['exploreGroup'])){
?>
  <div class="row justify-content-end">
  	<button type="button" class="btn btn-primary mx-1" data-toggle="collapse" data-target="#addmem">Add <span><i class="fas fa-user-plus"></i></span></button>
    <form action="GroupSettings.php" method="POST">
      <input type="hidden" name="grouphiddenid" value="<?php if(isset($_POST['group_id'])){echo $_POST['group_id'];}?>">
      <button type="submit" name="GroupSettings" class="btn btn-primary"><span><i class="fas fa-cog"></i></span></button>
    </form>
  </div>
  <!-- Dynamic row start -->

  <div class="row">
    <!-- ADD User -->
  	<div class="collapse" id="addmem">
  		<div class="col-12">
  			<div class="row justify-content-center">
  				<form>
            <input type="hidden" id="groupID" value="<?php echo $_POST['group_id']; ?>">
  					<input type="search" id="searchUser" class="form-control" placeholder="Search a User">
  				</form>
  			</div>
  		</div>
      <!-- search result display in this div -->
      <div id="searchResult"></div>
  	</div>
  </div>

  <!-- Dynamic row end -->
<?php } ?>
<!-- Displaying Group Members -->
  <div class="row justify-content-center no-gutters mt-4">
    <div class="col-md-9 col-12 offset-md-3 offset-4">
<?php 
$sql = "SELECT * FROM group_members JOIN users ON group_members. member_id = users. id WHERE group_id = {$_POST['group_id']}";
$stmt = $conn->query($sql);
if ($stmt->num_rows > 0){
?>
<table class="table table-borderless table-hover table-striped table-responsive">
  <thead>
    <tr>
      <th>Photo</th>
      <th>Username</th>
      <th>Aactive status</th>
    </tr>
  </thead>  

  <tbody>
<?php 
    while ($info = $stmt->fetch_assoc()){
      if($info['status'] == 1){
?>
    <tr>
      <td><img src="profile_pic/<?php echo $info['picture']; ?>"></td>
      <td><?php echo $info['username']; ?></td>
      <td><button class="btn btn-success">Online</button></td>
    </tr>
<?php    
      }
      else{
?>
    <tr>
      <td><img src="profile_pic/<?php echo $info['picture']; ?>"></td>
      <td><?php echo $info['username']; ?></td>
      <td><button class="btn btn-danger">Offline</button></td>
    </tr>
<?php
      }
}
?>
  </tbody>
</table>

<?php
}
else{
  echo "<p class='text-danger mt-5 font-weight-bold'>No member</p>";
}
?>
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