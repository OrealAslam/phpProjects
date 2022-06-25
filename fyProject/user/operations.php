<?php 
error_reporting(0);
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{

	include '../config.php';
	// updating username
	if (isset($_POST['name'])){
		$username = mysqli_real_escape_string($conn, $_POST['name']);
		$sql = "UPDATE users SET username = ? WHERE email = ?";
		$stmt = $conn->prepare($sql);
		if ($stmt){
			$stmt->bind_param('ss', $username, $_SESSION['USEREMAIL']);
			if($stmt->execute()){
				echo "Updated successfully";
				die();
			}
			else{
				echo "Something went wrong while updating username";
			}
		}
	}

	// updating password

	if (isset($_POST['old']) && isset($_POST['new']) && isset($_POST['cpass'])){

		$oldpass = mysqli_real_escape_string($conn, $_POST['old']);
		$newpass = mysqli_real_escape_string($conn, $_POST['new']);
		$confirmpass = mysqli_real_escape_string($conn, $_POST['cpass']);

		if ($newpass !== $confirmpass){
			echo "New and confirm new password must be same";
		}
		if (strlen($newpass)<= 7 || strlen($newpass) >30){
			echo "Password length must be > 7 or <= 30 characters ";
		}
		if (!ctype_alnum($newpass)){
			echo "Password must be alphanumeric";
		}
		else{
			$sql = "SELECT password FROM users WHERE email = '".$_SESSION['USEREMAIL']."' ";
			$result = $conn->query($sql);
			if ($result->num_rows == 1){
				$data = $result->fetch_assoc();

				if ($oldpass !== $data['password']){
					echo "Invalid Old password";
				}
				else{
					// password matched now change user password

					$sql = "UPDATE users SET password = ? WHERE email = ?";
					$stmt = $conn->prepare($sql);
					if ($stmt){
						$stmt->bind_param('ss', $confirmpass, $_SESSION['USEREMAIL']);
						if ($stmt->execute()){
							echo "Password Updated Successfully";
						}
						else{
							echo "Error occur while updating password";
						}
					}
				}
			}
			else{
				echo "Invalid Old password";
				die();
			}
		}
	}
	

	// updating JOIN GROUP requests function

	function DisplayJoinRequests(){
		GLOBAL $conn;

		if (isset($_GET['req']) AND $_GET['req'] == 'pending' AND isset($_POST['group_id'])){
			
			$group_id = mysqli_real_escape_string($conn, $_POST['group_id']);
			$sql = "SELECT * FROM joingrouprequest WHERE group_id = '".$group_id."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0){
				$count = $result->num_rows;
				echo $count;
			}
			else{
				echo "0";
			}
		}
	}

	DisplayJoinRequests();
}

// Approve Group Join Request

if (isset($_POST['req'])){
	
	$req_id = mysqli_real_escape_string($conn, $_POST['req']);

	$reqID  = filter_var($req_id, FILTER_VALIDATE_INT);
	if(!$reqID){echo "<span class='text-danger'>Request ID blocked</span>";}
	else{

		$sql = "SELECT * FROM joingrouprequest WHERE req_id = '".$reqID."'";
		$res = $conn->query($sql);
		$res = $res->fetch_assoc();

		$sql1 = "INSERT INTO group_members (group_id, member_id, member_name) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql1);

		if ($stmt){
			$stmt->bind_param('iis', $res['group_id'], $res['member_id'], $res['name']);
			if ($stmt->execute()){
				$query = "DELETE FROM joingrouprequest WHERE req_id = '".$res['req_id']."'";
				$res = $conn->query($sql);
			}
			else{
				echo "<span class='text-danger'>Unable to approve</span>";
			}
		}
		else{
			echo "<span class='text-danger'>Cannot process. Try Later!!</span>";
		}
	}
}

// Update Group Name

if (isset($_POST['GN'])){
	
	$new_name = mysqli_real_escape_string($conn, $_POST['GN']);
	$new_name = filter_var($new_name, FILTER_SANITIZE_STRING);

	$groupID  = mysqli_real_escape_string($conn, $_POST['GID']);


	$sql = "UPDATE groups SET g_name = ? WHERE g_id = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt){
		$stmt->bind_param('si', $new_name, $groupID);
		if ($stmt->execute()){
			$sql = "SELECT g_name FROM groups WHERE g_id = '".$groupID."'";
			$result = $conn->query($sql);
			$name = $result->fetch_assoc();
			echo $name['g_name'];
		}
	}

}

// Update Group Desc

if (isset($_POST['GD'])){
	
	$desc = mysqli_real_escape_string($conn, $_POST['GD']);
	$desc = filter_var($desc, FILTER_SANITIZE_STRING);

	$groupID  = mysqli_real_escape_string($conn, $_POST['GID']);


	$sql = "UPDATE groups SET g_desc = ? WHERE g_id = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt){
		$stmt->bind_param('si', $desc, $groupID);
		if ($stmt->execute()){
			$sql = "SELECT g_desc FROM groups WHERE g_id = '".$groupID."'";
			$result = $conn->query($sql);
			$name = $result->fetch_assoc();
			echo $name['g_desc'];
		}
	}

}


// post(TextOnly) in Group

function GroupTextPost(){
	GLOBAL $conn;

	if (isset($_GET['textonly']) AND $_GET['textonly'] == 'group'){
		
		if (isset($_POST['post']) AND isset($_POST['groupID'])){

			$sql = "INSERT INTO group_posts (group_id, user_id, postText) VALUES (?,?,?)";
			$stmt = $conn->prepare($sql);
			if ($stmt){
				$stmt->bind_param('iis', $_POST['groupID'], $_SESSION['UID'], $_POST['post']);
				if ($stmt->execute()){
					echo "<p class='text-success'>Posted</p>";
				}
				else{
					echo $conn->error;
				}
			}
			else{
				echo $conn->error;
			}
		}
		
	}
}
GroupTextPost();

// Displaying Group POSTS

function ViewGroupPosts($group_id){

	GLOBAL $conn;

	$sql = "SELECT * FROM group_posts JOIN users ON group_posts. user_id = users. id WHERE group_id = {$group_id} ORDER BY post_id DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		while ($gpost = $result->fetch_assoc()){
			$hidden_id =  $gpost["post_id"];
			echo '
				<div class="card mb-3">
					<div class="card-header">
						<img src="profile_pic/'.$gpost["picture"].'" class="img-fluid rounded-circle mr-2" style="max-width: 40px;">
						<span>'.$gpost["username"].'</span>
						<small class="ml-3">'.$gpost["date/time"].'</small>
					</div>

					<div class="card-body p-2">';
			if(!$gpost['postText'] == ''){
				echo '<p class="card-text">'.$gpost["postText"].'</p>';
			}
					
			if (!$gpost['postIMG'] == ''){
				echo '
					<img src="'.$gpost["postIMG"].'" class="img-fluid w-100">
				';
			}

			if (!$gpost['postVID'] == ''){
				echo '
				<video class="w-100" height="350" controls>
	            	<source src="'.$gpost["postVID"].'" type="video/mp4">;
	            </video>';
			}
			echo'
					</div>';

			echo '
				<div class="card-footer">
					<button type="button" class="btn btn-info btn-block" data-toggle="collapse" data-target="#comment-'.$gpost["post_id"].'">Comment</button>

					<div class="collapse" id="comment-'.$gpost["post_id"].'">
						<input type="hidden" id="RGRPID" value="'.$group_id.'">
						<input type="text" class="form-control mt-2 d-inline-block" id="mycomment" name="comment" placeholder="Add a comment" style="width: 80%;">
						<button type="button" onclick="addComment('.$gpost["post_id"].')" class="btn btn-primary d-inline-block" id="addcomment">Add</button>
					</div>
				</div>
			';

			echo'		
				</div>
			';
		}
	}
}
?>

<script src="../js/jquery-3.6.0.js"></script>

<script type="text/javascript">

function addComment($e){
	var postID = $e;
	 var Group_ID = document.getElementById("RGRPID").value;
	// var comment = document.getElementById('mycomment').value;
	var comment = $("#mycomment").val();
	console.log(postID);
	console.log(Group_ID);
	console.log(co)
	// $.ajax({

	// 	method: 'post',
	// 	url: 'enterGroup.php',
	// 	data: {pid: postID, gid: Group_ID, c: comment},
	// 	success: function(data){
			
	// 	}
	// });
}
</script>