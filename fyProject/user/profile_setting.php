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

 <title>Settings</title>
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
</div>

<!-- navbar end -->
<h3 class="text-center text-capitalize mb-5" style="font-weight: bold; text-shadow: 3px 1px 2px green; letter-spacing: 1px;">Update profile Information</h3>

<!-- edit profile area -->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Change Username
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <div class="form-row">
                <div class="col-4">
                  <input type="text" value="<?php echo $res['username']; ?>" class="form-control text-center" readonly>
                </div>
                <div class="col-7">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usernamemodal">
                    Update Username
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Change Your Password
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <div class="form-row">
                <div class="col-4">
                  <input type="password" value="<?php echo $res['password']; ?>" class="form-control text-center" readonly>
                </div>
                <div class="col-7">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Change Password
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Change your Profile picture
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Change Profile Photo
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- additional information row -->
  <h1 class="text-center mt-3" style="font-weight: bold; text-shadow: 2px 1px 2px red; letter-spacing: 2px;">Basic Info</h1>

  <div class="row py-5 justify-content-center">
    <div class="col-8">
      <form method="POST" action="BasicInfo.php">
        <div class="btn-group d-flex flex-column" role="group" aria-label="Basic example">
          <button type="submit" name="workbtn" class="btn btn-outline-danger">Work and Education</button>
          <button type="submit" name="placebtn" class="btn btn-outline-success">Places Lived</button>
          <button type="submit" name="contactbtn" class="btn btn-outline-info">Contact Info</button>
        </div>
      </form>
    </div>
  </div>

</div>



<!-- Username Modal start -->

<div class="modal fade" id="usernamemodal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Username</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for="username">Enter new username</label>
          <input type="text" class="form-control" id="username" name="username"  placeholder="change username">
        </div>
      </div>
      <div class="modal-footer">
        <span id="nameresponce"></span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="updateusername" name="updateusername" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Username Modal end -->



<!-- Password modal start -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update your Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label" for="oldpass">Old Password</label>
          <input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="enter old password">
        </div>
        <div class="form-group">
          <label class="form-label" for="newpass">New Password</label>
          <input type="password" id="newpass" name="newpass" class="form-control" placeholder="enter new password">
        </div>
        <div class="form-group">
          <label class="form-label" for="confirmpass">Confirm new Password</label>
          <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="confirm new password">
        </div>
      </div>
      <div class="modal-footer">
        <span id="passresponce"></span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="updatepassword" class="btn btn-primary">Update Password</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Password modal end -->



<!-- Picture modal start -->



<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="picture">
      <div class="modal-body">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" name="userimage" id="userimage" required>
          <label class="custom-file-label" for="userfile">Choose file...</label>
        </div>
      </div>
      <div class="modal-footer">
        <span class="show"></span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" id="updateuserprofile" class="btn btn-primary">Apply Changes</button> -->
      </div>
     </form>
    </div>
  </div>
</div>


<!-- Picture modal end -->

<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>

<script type="text/javascript">

$(document).ready(function(){

// update username code

  $('#updateusername').click(function(){
    var username = $('#username').val();
    if(username == ''){
      alert('Username required');
    }
    else{
        $.ajax({
        type: 'POST',
        url : 'operations.php',
        data : {name: username},
        success: function(responce){
          $('#nameresponce').html(responce);
        }      
      });
    }
  });

  // updating user password
 $('#updatepassword').click(function(){
    var oldpass = $('#oldpass').val();
    var newpass = $('#newpass').val();
    var confirmpass = $('#confirmpass').val();

    if ((oldpass == '') || (newpass == '') || (confirmpass == '')){
      alert('Credentials required');
    }
    else{
      $.ajax({
        type: 'POST',
        url : 'operations.php',
        data : {old: oldpass, new: newpass, cpass: confirmpass},
        success: function(responce){
          $('#passresponce').html(responce);
        }      
      });
    }
  });

});

</script> 

</body>
</html>
