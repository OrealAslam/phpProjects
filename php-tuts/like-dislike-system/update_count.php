<?php 
$conn = new mysqli('localhost', 'root', '', 'like-dislike-system');
if ($conn->error){
    die().$conn->error;
}
// checking type alue and perform action accordingly
$type = $_POST['type'];
$id = $_POST['id'];

if ($type == 'like'){
	$sql = "UPDATE post SET like_count = like_count + 1 WHERE post_id = '$id'";
	$count = $conn->query($sql);

}
else{
	if ($type == 'dislike'){
		$sql = "UPDATE post SET dislike_count = dislike_count + 1 WHERE post_id = '$id'";
		$count = $conn->query($sql);

	}
}


?>