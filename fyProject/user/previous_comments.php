
<?php 
include_once '../config.php';

function previousComments($group_id, $post_id){
	GLOBAL $conn;
	$Commsql = "SELECT * FROM group_comments JOIN users ON group_comments. user_id = users. id WHERE post_id = {$post_id} AND group_id = {$group_id} ORDER BY comment_id ASC";

	$comm = $conn->query($Commsql);

	if($comm->num_rows > 0){

		while($data = $comm->fetch_assoc()){
			echo '
				<div class="media">
					<img src="profile_pic/'.$data["picture"].'" class="img-fluid rounded-circle" style="max-width: 50px;">
					<p class="d-block mr-3 font-weight-bold">'.$data["username"].'</p><br>
					<div class="media-body">
						<span class="d-block">'.$data["comment"].'</span>
					</div>
				</div>
			';
		}
	}
	else{
		echo "Be the First who comment";
	}
}

?>