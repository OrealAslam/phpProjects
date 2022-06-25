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


function likecount($id){
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
              WHERE post_id = '$id' AND rating_action ='like'";
      $rs = $conn->query($sql);
      $result = $rs->fetch_array();
      echo $result[0];
}

function dislikecount($id){
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
              WHERE post_id = '$id' AND rating_action ='dislike'";
      $rs = $conn->query($sql);
      $result = $rs->fetch_array();
      echo $result[0];
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

 <title>Final, Project</title>
</head>
<body>

<div class="container mb-4 p-0">

  <!-- navbar start -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="profile.php" class="nav-link px-2 link-secondary">Home <span id="postnotifications" class="badge badge-pills"></span></a></li>
      <li><a href="messages.php" class="nav-link px-2 link-dark">Messages</a></li>
      <li><a href="moreGroups.php" class="nav-link px-2 link-dark">Explore</a></li>

    </ul>

    <div class="col-md-3 text-end">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <a href="profile_setting.php" class="float-right profile" id="userDP"><img src="<?php echo 'profile_pic/'.$res['picture']; ?>"></a>
  </header>
  <!-- navbar end -->

  <div class="card bg-danger">
  <div class="card-header">
    <h4 class="card-title text-center text-light post-header">Whats on your Mind <?php echo "<b>".$res['username']."</b>"; ?>?</h4>
    <div class="card-body">
      <div class="row justify-content-around justify-content-center">
        <button class="btn btn-outline-success" data-toggle="modal" data-target="#userpost">Create Post</button>
         <button class="btn btn-outline-warning" data-toggle="modal" data-target="#mediaModal">Image or Video</button>
      </div>      
    </div>
  </div>
</div>

</div>

<!-- Dynamic POSTS start -->

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-10">
      <?php 
        $query = "SELECT * FROM `userpost` INNER JOIN users ON userpost. user_id = users. id ORDER BY post_id DESC";
        $result = $conn->query($query);
        if ($result->num_rows > 0){
          while ($post = $result->fetch_assoc()){
      ?>
      <div class="card mb-3">
        <?php if($post['user_id'] == $_SESSION['UID']){ ?>
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <img src="<?php echo 'profile_pic/'. $post['picture']; ?>" class="userpostimg mr-2"><span><?php echo "<b>".$post['username']."</b>"; ?></span>
              <span class="d-block ml-5"><?php echo $post['postdate']; ?></span>
            </div>
            <div class="col-4">
              <!-- edit button -->
              <form method="POST" action="editpost.php">
                <input type="hidden" name="pidentity" value="<?php echo $post['post_id']; ?>">
                <button type="submit" name="editpost" class="btn btn-default float-right"><i class="fas fa-edit"></i></button>
                <!-- delete button -->
                <button type="submit" name="deletepost" class="btn btn-default float-right"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>         
          </div>
        </div>
      <?php }else{?>
        <div class="card-header">
          <div class="row">
            <div class="col-8">
             <img src="<?php echo 'profile_pic/'. $post['picture']; ?>" class="userpostimg mr-2"><span><?php echo "<b>".$post['username']."</b>"; ?></span>
              <span class="d-block ml-5"><?php echo $post['postdate']; ?></span>
            </div>
            <div class="col-4">
              <!-- not your post that's why no option available -->
            </div>
          </div> 
        </div>
      <?php 

      } ?>
        <div class="card-body">
          <!-- diplaing text if set -->
          <?php 
            if (!$post['postText'] == ''){
             echo "<p>".$post['postText']."</p>";
            }
          ?>
          <!-- diplaing Img if set -->
          <?php 
            if (!$post['postImg'] == ''){
              echo "<img src='".$post['postImg']."' class='img-fluid w-100' height='350'>";
            }
          ?>
          <!-- diplaing Vid if set -->
          <?php if(!$post['postVid']==''){
            echo "<video class='w-100' height='350' controls>";
            echo "<source src='".$post['postVid']. "' type='video/mp4'";
            echo "</video>";
          }
          ?>
        </div>
        <div class="card-footer">
          <a href="javascript:void(0)" class="btn btn-default">
            <span onclick="like_update(<?php echo $post['post_id']; ?>)"><i class="far fa-thumbs-up"></i>(<span><?php likecount($post['post_id']); ?></span>)</span>
          </a>

          <a href="javascript:void(0)" class="btn btn-default">
            <span onclick="dislike_update(<?php echo $post['post_id']; ?>)"><i class="far fa-thumbs-down"></i> (<span><?php dislikecount($post['post_id']); ?></span>)</span>
          </a>

        </div>
      </div> 
    <?php }} ?>
  </div>  
</div>
</div>
<!-- Dynamic POSTS end -->


<!-- Post modal start -->

<div class="modal fade" id="userpost" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create a Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="badge">&times;</span>
        </button>
      </div>
      <form action="">
        <div class="modal-body">
          <textarea type="text" class="form-control" placeholder="Write something" name="postInput" id="postInput"></textarea>
        </div>
        <div class="modal-footer">
          <p id="postresponce"></p>
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="button" id="postbutton" class="btn btn-block btn-primary">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Post modal end -->

<!-- Image / Video start -->

<div class="modal fade" id="mediaModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">POST a media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="MediaPost">
        <div class="modal-body">
          <div class="form-group">
            <textarea type="textarea" class="form-control" id="mediaText" name="mediaText" placeholder="Write suggestions"></textarea>
          </div>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" name="postamedia" id="postamedia" required>
            <label class="custom-file-label" for="postamedia">Choose file...</label>
          </div>
        </div>
        <div class="modal-footer">
          <span id="show"></span>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
     </form>
    </div>
  </div>
</div>

<!-- Image / Video end -->

<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#postbutton').click(function(){
      var userPost = $('#postInput').val();
      if (userPost == ''){
        alert('Post area could not be empty');
      }
      else{
        $.ajax({
          type: 'POST',
          url: 'post.php',
          data: {text: userPost},
          success: function(feedback){
            $('#postresponce').html(feedback);
          }
        });
      }
    });
  });


// upload Users Media POST

$(document).ready(function(){
  $(document).on('change', '#postamedia', function(){
    $.ajax({
     type: 'POST',
     url: 'upload_media.php',
     data: new FormData($('#MediaPost')[0]),
     contentType: false,
     processData: false,
     success: function(result){
       $('#show').html(result);
     }
    });
  });
});

// like dislike functionality
function like_update(id){
  // var cur_count = $("#like_loop_"+id).html();
  // cur_count++;
  // $("#like_loop_"+id).html(cur_count);

  $.ajax({
    method: 'POST',
    url: 'reactionCount.php',
    data: 'type=like&id='+id,
    success:function(responce){
  
    }
  });
}

// like dislike functionality
 function dislike_update(id){
//   var cur_count = $("#dislike_loop_"+id).html();
//   cur_count++;
//   $("#dislike_loop_"+id).html(cur_count);

  $.ajax({
    method: 'POST',
    url: 'reactionCount.php',
    data: 'type=dislike&id='+id,
    success:function(responce){

    }
  });
 }
</script>

</body>
</html>
<?php
}
?>