	<?php 
	session_start();

	if (!isset($_SESSION['USEREMAIL'])) {
	  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
	}
	else{
	  include_once '../config.php';
	  $sql = "SELECT * FROM users WHERE email = '".$_SESSION['USEREMAIL']."'";
	  $result = $conn->query($sql);
	  $res = $result->fetch_assoc();

// comment on a POST

if(isset($_POST['comment'])){

	if(isset($_GET['postID'])){
		print_r($_GET);
		print_r($_POST);
	}
	die();
}

	if (isset($_POST['enterGroup']) AND isset($_POST['group_id'])){
		
		$group_id = mysqli_real_escape_string($conn, $_POST['group_id']);

		$group_id = filter_var($group_id, FILTER_VALIDATE_INT);

		$_SESSION['CURR_GID'] = $group_id;

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

	 <title></title>
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

		<div class="row justify-content-around justify-content-center fixed">
	        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add Post</button>
	         <button class="btn btn-dark" data-toggle="modal" data-target="#mediaModal">Image or Video</button>
	    </div> 

	    <!-- dynamic row for posts -->

	    <div class="row mt-3">
	    	<div class="col-12">
	    		
<?php 
$sql = "SELECT * FROM group_posts JOIN users ON group_posts. user_id = users. id WHERE group_id = {$_SESSION['CURR_GID']} ORDER BY post_id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while ($gpost = $result->fetch_assoc()){
			$hidden_id =  $gpost["post_id"];
?>
			<div class="card mb-3">
				<div class="card-header">
					<img src="profile_pic/<?php echo $gpost['picture']; ?>" class="img-fluid rounded-circle mr-2" style="max-width: 40px;">
					<span><?php echo $gpost["username"]; ?></span>
					<small class="ml-3"><?php echo $gpost["date/time"];?></small>
				</div>

				<div class="card-body">
					<?php if(!$gpost['postText'] == ''){
					echo '<p class="card-text">'.$gpost["postText"].'</p>';
					} ?>
					<?php if (!$gpost['postIMG'] == ''){
						echo '
							<img src="'.$gpost["postIMG"].'" class="img-fluid w-100">
						';
					} ?>
					<?php if (!$gpost['postVID'] == ''){
							echo '
							<video class="w-100" height="350" controls>
				            	<source src="'.$gpost["postVID"].'" type="video/mp4">;
				            </video>';
						} ?>
				</div>
				<div class="card-footer">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#comment-<?php echo $gpost["post_id"]; ?>">Comment</button>
					<!-- showing comments -->
					<div class="mt-3" style="max-height: 120px; overflow-y:auto;">
						<!-- previous comments show here -->
						<?php require_once 'previous_comments.php'; 
							previousComments($_SESSION['CURR_GID'], $hidden_id);
						?>
					</div>
					<div class="modal fade" tabindex="-1" id="comment-<?php echo $gpost["post_id"]; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Comment Down</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
								</div>
								<div class="modal-body" class="preComments" style="max-height: 170px; overflow-y: auto;">
									<!-- previous comments -->

								</div>
								<div class="modal-footer">
									<input type="text" class="form-control d-inline-block w-80" id="comment<?php echo $gpost["post_id"]; ?>" placeholder="Add a comment">
									<button type="button" class="btn btn-primary d-inline-block" onclick="addComment(<?php echo $gpost["post_id"]; ?>,<?php echo $_SESSION['CURR_GID']; ?>)">Add Comment</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
		}
	}
?>
	    	</div>
	    </div>

	</div>  <!--container end-->



	<!-- POST(text only) modal -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add new Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<input type="hidden" id="groupID" value="<?php if(isset($_SESSION['CURR_GID'])){echo $_SESSION['CURR_GID'];} ?>">
	        <textarea class="form-control" placeholder="Create a Post" id="GroupPost" rows="2" cols="20">
	        </textarea>
	      </div>
	      <div class="modal-footer">
	      	<span class="responce"></span>
	      	<span id="result" class="text-left"></span>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button id="textonly" type="button" class="btn btn-primary">POST</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- POST(media + text) modal -->

	<!-- Modal -->
	<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Media Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form  enctype="multipart/form-data" method="POST" action="">
	      <div class="modal-body">
		    	<input type="hidden" name="groupID" value="<?php if(isset($_SESSION['CURR_GID'])){echo $_SESSION['CURR_GID'];} ?>">
		    	<input type="text" class="form-control mb-2" placeholder="Description" name="GMediaText">

			    <abbr title="Post photo or video">
						<label for="GMediaPost" class="form-label">
						<i class="fas fa-photo-video fa-3x text-danger"></i>
					</label>
					</abbr>
					<input type="file" name="GMediaPost" id="GMediaPost" style="visibility: hidden;">	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="postInGroup" class="btn btn-primary">POST</button>
	      </div>
	  </form>
	    </div>
	  </div>
	</div>


<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
// Add comment to POST
function addComment($postID, $groupID){
	var postID  = $postID;
	var groupID = $groupID;
	var comment = document.getElementById("comment"+postID).value;
	var comment = $.trim(comment);

	if (comment.length == 0){
		alert("Couldn't add empty comment");
	}
	else{
		$.ajax({
			type: 'post',
			url: 'enterGroup.php',
			data: {pid: postID, gid: groupID, c: comment},
			success: function(responce){
				$(".preComments").html(responce)

			}
		});
	}
}

//Text only POST
$(document).ready(function(){

	$("#textonly").click(function(){
		var post = $("#GroupPost").val();
		var post = $.trim(post);
		var groupID = $("#groupID").val();
		if (post.length == 0){
			$(".responce").text("Couldn't be empty");
		}
		else{
			$(".responce").hide();
	
			$.ajax({
				type: 'post',
				url: 'operations.php?textonly=group',
				data: {post: post, groupID: groupID},
				success : function(responce){
					$("#result").html(responce);
				}
			});
		}
	});
});
</script>

</body>
</html>
<?php 

// POST media in group

if(isset($_POST['postInGroup']) AND isset($_SESSION['CURR_GID'])){
	
	if (isset($_FILES['GMediaPost']['name'])){

		if(isset($_POST['GMediaText']) AND isset($_POST['groupID'])){
			$txt = mysqli_real_escape_string($conn, $_POST['GMediaText']);
			$groupID = mysqli_real_escape_string($conn, $_POST['groupID']);
		}

		$filename 			= time() . $_FILES['GMediaPost']['name'];
		$size    			= $_FILES['GMediaPost']['size'];
		$filetype 			= $_FILES['GMediaPost']['type'];
		$temp_dir			= $_FILES['GMediaPost']['tmp_name'];
		$ext     			= pathinfo($filename, PATHINFO_EXTENSION);
		
		if($ext=='png' OR $ext=='jpg' OR $ext=='jpeg'){

			$upload_directory = 'media/group_assets/img/'.$filename;
			$upload = move_uploaded_file($temp_dir, $upload_directory);
			// now store post in DB
			if ($upload){
				$sql = "INSERT INTO group_posts (group_id, user_id, postText, postIMG) VALUES (?,?,?,?)";
				$stmt = $conn->prepare($sql);
				if ($stmt){
					$stmt->bind_param('iiss', $groupID, $_SESSION['UID'], $txt, $upload_directory);
					if ($stmt->execute()){	
						// POSTED successfully
						echo "<script>window.location.href='http://localhost/FYProject/user/enterGroup.php';</script>";
					}
					else{
						if(file_exists($upload_directory)){
							unlink($upload_directory);
							echo "<script>alert('error!! while posting')</script>";
							echo "<script>window.location.href='http://localhost/FYProject/user/enterGroup.php';</script>";
						}
					}
				}
				else{
					echo $conn->error;
				}
			}
		}
		elseif ($ext=='mp4' OR $ext=='webm'){
			$upload_directory   = "media/group_assets/vid/".$filename;
			$upload = move_uploaded_file($temp_dir, $upload_directory);
			// now store post in DB
			if ($upload){
				$sql = "INSERT INTO group_posts (group_id, user_id, postText, postVID) VALUES (?,?,?,?)";
				$stmt = $conn->prepare($sql);
				if ($stmt){
					$stmt->bind_param('iiss', $groupID, $_SESSION['UID'], $txt, $upload_directory);
					if ($stmt->execute()){	
						// POSTED successfully
						echo "<script>window.location.href='http://localhost/FYProject/user/enterGroup.php';</script>";
					}
					else{
						if(file_exists($upload_directory)){
							unlink($upload_directory);
							echo "<script>alert('error!! while posting')</script>";
							echo "<script>window.location.href='http://localhost/FYProject/user/enterGroup.php';</script>";
						}
					}
				}
				else{
					echo $conn->error;
				}
			}
		}
		else{
			echo "<script>alert('Format not supported You can only upload images / video');</script>";
		}
	}
}

// Add new Comment
function newComment(){
	GLOBAL $conn;
	if(isset($_POST['pid']) AND isset($_POST['gid']) AND isset($_POST['c'])){
		
		$post_id = mysqli_real_escape_string($conn, $_POST['pid']);
		$g_id    = mysqli_real_escape_string($conn, $_POST['gid']);
		$comnt   = mysqli_real_escape_string($conn, $_POST['c']);

		$sql = "INSERT INTO group_comments (group_id, user_id, post_id, comment) VALUES (?,?,?,?)";
		$stmt = $conn->prepare($sql);
		if($stmt){
			$stmt->bind_param('iiis', $g_id, $_SESSION['UID'], $post_id, $comnt);
			if($stmt->execute()){
				
			}
		}
	}

}

newComment();
} // else end
?>