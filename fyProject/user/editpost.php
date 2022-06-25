<?php 
session_start();
date_default_timezone_set('Asia/Karachi');

$time =  date('g:i:s');

if(!isset($_SESSION['USEREMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
include_once '../config.php';
// delete  POST
if(isset($_POST['deletepost'])){
	  $pid = mysqli_real_escape_string($conn, $_POST['pidentity']);
	  $sql = "SELECT * FROM userpost WHERE post_id = '".$pid."'";
	  $result = $conn->query($sql);
	  $result = $result->fetch_assoc();
  
	  $query = "DELETE FROM userpost WHERE post_id = ?";
	  $stmt = $conn->prepare($query);
	  if ($stmt){
	    $stmt->bind_param('i', $pid);
	    if($stmt->execute()){
	    	if(file_exists($result['postImg']) || file_exists($result['postVid'])){
	    		unlink($result['postImg']);
	    		unlink($result['postVid']);
				echo "<script>alert('POST deleted successfully');</script>";
	     		header("Location: profile.php");
	    	}
	    	else{
	    		echo "<script>alert('POST deleted successfully');</script>";
	     		header("Location: profile.php");
	    	}
	    }
	    else{
	      echo "<script>alert('Something went wrong while deleting your POST');</script>";
	    }
	  }
	  else{
	    echo "<script>alert('Cannot process your request at moment. please try again later..!!');</script>";
	  }
}

// edit POST

if(isset($_POST['editpost']) AND isset($_POST['pidentity'])){
// Retrieve post info from DB using POSTID

	$postid = mysqli_real_escape_string($conn, $_POST['pidentity']);

	$sql = "SELECT * FROM userpost WHERE post_id = '".$_POST['pidentity']."'";
	$post = $conn->query($sql);

	$edit = $post->fetch_assoc();
	$_SESSION['POSTID'] = $edit['post_id'];
}

	// update POST code goes here......

	if(isset($_POST['updatePost'])){
		
		$txt = mysqli_real_escape_string($conn, $_POST['editCaption']);
		// if(empty($txt)){echo "empty"; die();}

		if (isset($txt) AND empty($_FILES['updatemedia']['name'])){
			// update text only
			$query = "UPDATE userpost SET postText = ? WHERE post_id = ?";
			$stmt = $conn->prepare($query);
			if($stmt){
				$stmt->bind_param('si', $txt, $_SESSION['POSTID']);
				if($stmt->execute()){
					header("Location: http://localhost/FYProject/user/profile.php");
					echo "<script>alert('Caption Updated Successfully');</script>";
					die();
				}
				else{
					echo "<script>alert('Unable to update caption');</script>";
				}
			}
			else{
				echo "<script>alert('Unable to work on your query. Update later');</script>";
			}
		} // both text and media is updated
		if (isset($_FILES['updatemedia']['name']) AND isset($txt)){

			$filename 			= time() . $_FILES['updatemedia']['name'];
			$size    			= $_FILES['updatemedia']['size'];
			$filetype 			= $_FILES['updatemedia']['type'];
			$temp_dir			= $_FILES['updatemedia']['tmp_name'];
			$ext     			= pathinfo($filename, PATHINFO_EXTENSION);

			if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png'){
				$upload_directory = "media/img/".$filename;
				$upload = move_uploaded_file($temp_dir, $upload_directory);
				if($upload){
					$sql = "UPDATE userpost SET postText = ?, postImg = ? WHERE post_id = ?";
					$stmt = $conn->prepare($sql);
					if ($stmt){
						$stmt->bind_param('ssi', $txt, $upload_directory, $_SESSION['POSTID']);
						if ($stmt->execute()){
							echo "<script>alert('POST Updated Successfully');</script>";
							header("Location: profile.php");
							die();
						}
						else{
							if (file_exists($upload_directory)){
								unlink($upload_directory);
								echo "<script>alert('Error occur while updating your POST');</script>";
							}
						}
					}
					else{
						echo "<script>alert('Unable to work on your query. Try again later!!...');</script>";
					}
				}
				else{
					echo "<script>alert('Catch directory error');</script>";
				}
			}
			if($ext=='mp4' OR $ext=='webm'){				
				$upload_directory = "media/vid/".$filename;
				$upload = move_uploaded_file($temp_dir, $upload_directory);
				if($upload){
					$sql = "UPDATE userpost SET postText = ?, postVid = ? WHERE post_id = ?";
					$stmt = $conn->prepare($sql);
					if ($stmt){
						$stmt->bind_param('ssi', $txt, $upload_directory, $_SESSION['POSTID']);
						if ($stmt->execute()){
							echo "<script>alert('POST Updated Successfully');</script>";
							header("Location: profile.php");
							die();
						}
						else{
							if (file_exists($upload_directory)){
								unlink($upload_directory);
								echo "<script>alert('Error occur while updating your POST');</script>";
							}
						}
					}
					else{
						echo "<script>alert('Unable to work on your query. Try again later!!...');</script>";
					}
				}
				else{
					echo "<script>alert('Catch directory error');</script>";
				}
			}
		} //UPDATE POST MEDIA (IMG / VID) ONLY
		if (isset($_FILES['updatemedia']['name']) AND empty($txt)){

			$filename 			= time() . $_FILES['updatemedia']['name'];
			$size    			= $_FILES['updatemedia']['size'];
			$filetype 			= $_FILES['updatemedia']['type'];
			$temp_dir			= $_FILES['updatemedia']['tmp_name'];
			$ext     			= pathinfo($filename, PATHINFO_EXTENSION);

			if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png'){
				$upload_directory = "media/img/".$filename;
				$upload = move_uploaded_file($temp_dir, $upload_directory);
				if($upload){
					$sql = "UPDATE userpost SET postText = ?, postImg = ? WHERE post_id = ?";
					$stmt = $conn->prepare($sql);
					if ($stmt){
						$stmt->bind_param('ssi', $txt, $upload_directory, $_SESSION['POSTID']);
						if ($stmt->execute()){
							header("Location: profile.php");
							echo "<script>alert('POST Updated Successfully');</script>";
						}
						else{
							if (file_exists($upload_directory)){
								unlink($upload_directory);
								echo "<script>alert('Error occur while updating your POST');</script>";
							}
						}
					}
					else{
						echo "<script>alert('Unable to work on your query. Try again later!!...');</script>";
					}
				}
				else{
					echo "<script>alert('Catch directory error');</script>";
				}
			}
			if($ext=='mp4' OR $ext=='webm'){				
				$upload_directory = "media/vid/".$filename;
				$upload = move_uploaded_file($temp_dir, $upload_directory);
				if($upload){
					$sql = "UPDATE userpost SET postText = ?, postVid = ? WHERE post_id = ?";
					$stmt = $conn->prepare($sql);
					if ($stmt){
						$stmt->bind_param('ssi', $txt, $upload_directory, $_SESSION['POSTID']);
						if ($stmt->execute()){
							header("Location: profile.php");
							echo "<script>alert('POST Updated Successfully');</script>";
						}
						else{
							if (file_exists($upload_directory)){
								unlink($upload_directory);
								echo "<script>alert('Error occur while updating your POST');</script>";
							}
						}
					}
					else{
						echo "<script>alert('Unable to work on your query. Try again later!!...');</script>";
					}
				}
				else{
					echo "<script>alert('Catch directory error');</script>";
				}
			}
		}
		if($txt == '' AND empty($_FILES['updatemedia']['name'])){
			echo "<script>alert('POST not changed');</script>";
			header("Location: profile.php");
			die();
		}
}

?>

<!-- edit POST markup goes here -->

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

 <title>Edit your post</title>

 <style type="text/css">
 	h2{
 		font-family: sans-serif;
 		font-style: italic;
 		font-weight: bolder;
 		letter-spacing: 1px;
 		text-shadow: 2px 3px rgb(200, 135, 100);
 		font-size: 48px;
 	}
 </style>
</head>
<body>



	<div class="container">
		<div class="row mt-lg-5 mt-md-4 shadow-lg p-4">
			<div class="col-12 text-center">
				<h2>Edit Your Post <span class="float-right"><i class="far fa-clipboard"></i></span></h2>
			</div>
		</div>

		<!-- displaying POST -->

		<div class="row justify-content-center p-3 mt-3">
			<div class="col-4 p-3">
				<?php 
					if(isset($edit)){
						if(!$edit['postText'] == ''){
							echo "<input type='text' class='form-control text-center my-2' value='".$edit['postText']."' readonly>";
						} 
						if (!$edit['postImg'] == ''){
							echo "<img src='".$edit['postImg']."' class='img-fluid' alt='post.jpeg'>";
						}
						if (!$edit['postVid'] == ''){
							echo "<video controls>";
			            echo "<source src='".$edit['postVid']. "' type='video/mp4'";
			            echo "</video>";
						}
					}
				?>
			</div>

			<div class="col-5 p-3 offset-1 shadow shadow-sm">
				<form method="POST" action="editpost.php" enctype="multipart/form-data">

					<textarea class="form-control border border-info" name="editCaption" placeholder="edit caption" rows="1"></textarea>
					<div class="row my-2 p-3 justify-content-center">
						<abbr title="update post photo or video">
							<label for="update-post-image" class="form-label">
								<i class="fas fa-photo-video fa-4x"></i>
							</label>
						</abbr>
						<input type="file" id="update-post-image" name="updatemedia" style="visibility: hidden;">
						<br>

						<button type="submit" class="btn btn-primary" name="updatePost">Update Your Post</button>
						<?php if(isset($msg)){echo $msg;} ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>