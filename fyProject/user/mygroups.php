  <?php 
  session_start();

  if (!isset($_SESSION['USEREMAIL'])){
    echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
  }
  else{
    include_once '../config.php';
    $sql = "SELECT * FROM users WHERE email = '".$_SESSION['USEREMAIL']."'";
    $result = $conn->query($sql);
    $res = $result->fetch_assoc();
  }
  // JOIN GROUP

    if(isset($_POST['JoinGroup'])){

      $group_id = mysqli_real_escape_string($conn, $_POST['GRPID']);
      $mem_id = mysqli_real_escape_string($conn, $_POST['member_id']);
      $mem_name = mysqli_real_escape_string($conn, $_SESSION['NAME']);

      $sql = "SELECT * FROM joingrouprequest WHERE group_id = '$group_id' AND member_id = '$mem_id' AND name = '$mem_name'";
      $result = $conn->query($sql);
      if ($result->num_rows == 1){
        echo "<script>alert('Alreay Requested')</script>";
      }
      else{    
        $sql = "INSERT INTO joingrouprequest (group_id, member_id, name) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt){
          $stmt->bind_param('iis', $group_id, $mem_id, $mem_name);
          if ($stmt->execute()){
            echo "<script>alert('Requested')</script>";
          }
          else{
            echo "<script>alert('request later!!')</script>";
          }
        }
        else{
          echo "<script>alert('Unable to request!!')</script>";
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
     <link rel="stylesheet" type="text/css" href="../css/style.css">

   <title>My Groups</title>
  </head>
  <style type="text/css">
    .card-button{ border: none;}
  </style>
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

  <!-- DISPLAYNING MY GROUPS  and explore more-->

    <!-- 1st row start (SEARCH-BOX) -->
    <button class="btn btn-dark" data-target="#GroupOwner" data-toggle="collapse">My Groups</button><br><br>

    <div class="collapse" id="GroupOwner">
    <div class="row">
      <div class="col-12">
        <form id="SearchGroupByName">
          <input type="search" id="searchGroup" placeholder="Search Groups" class="form-control">
        </form>
      </div>
    <!-- 1st row end -->
  <?php 
  // Select all of my groups
  $sql = "SELECT * FROM groups WHERE admin_id = '".$_SESSION['UID']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
  ?>
  <!-- Dynamic group row start -->
  <!--  DISPLAYNING MY GROUPS -->
  <div class="w-100 justify-content-center" id="search">
   <?php while ($group = $result->fetch_assoc()){ ?>
    <form class="w-100" method="POST" action="exploreGroup.php">
      <input type="hidden" name="group_id" value="<?php echo $group['g_id']; ?>">
      <button type="submit" name="exploreGroup" class="btn w-100">
        <div class="card w-100 mb-0">
          <div class="row no-gutters">
            <div class="col-md-2 col-3 p-md-2 p-2 justify-content-center align-self-center">
              <img src="<?php echo $group['g_profile']; ?>" class="img-fluid rounded-circle " alt="group profile" style="width: 60px;">
            </div>
            <div class="col-md-10 col-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $group['g_name']; ?></h5>
                <p class="card-text"><?php echo $group['g_desc']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </button>
    </form>
  <?php } // while loop ends here ?>
    </div>
  <!-- Dynamic group row end -->
  <?php
  }
  else{
     echo "<p class='text-center text-danger'>You have no group</p>";
  }

  ?>
        </div>
      </div>
      <div class="row row-cols-md-4">
          <?php joinedGroups(); ?>
      </div>
    </div>  <!--container end-->
  <!-- Link Bootstrap & JS -->
  <script src="../js/jquery-3.6.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    // Search for a Group

    $("#searchGroup").on('keyup', function(){
       
      var search = $("#searchGroup").val();
      if($.trim(search.length) == 0){
        $("#search").html("no suggestion");
      }
      else{

        $.ajax({
          type  : 'post',
          url   : 'searchGroup.php',
          data  : {searchGroup: search},
          success : function(responce){
            $("#search").html(responce);
          } 
        });
      }
    });



  </script>

  </body>
  </html>


  <?php 
  // View Joined Groups for POST
  function joinedGroups(){
    GLOBAL $conn;
    $sql = "SELECT * from group_members join groups WHERE member_id ={$_SESSION['UID']}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      while($data = $result->fetch_assoc()){
        echo '
        <form method="POST" action="enterGroup.php">
          <div class="col">
            <input type="hidden" name="group_id" value="'.$data["g_id"].'">
            <button class="btn" name="enterGroup" type="submit">
              <div class="card p-2 card-button">
                <div class="row no-gutters">
                  <div class="col-4">
                    <img src="'.$data["g_profile"].'" class="img-fluid rounded-circle" style="max-width:50px;">
                  </div>
                  <div class="col-md-8">'.$data["g_name"].'</div>
                </div>
              </div>
            </button>
          </div>
        </form>
        ';
      }
    }
    else{
        echo "<p class='mx-auto text-info'>You Haven't join any Group Yet</p>";
      }
  }

  ?>