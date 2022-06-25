<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}

include_once '../config.php';

if (isset($_POST['searchRes']) AND isset($_POST['GRID'])){

	$match = mysqli_real_escape_string($conn, $_POST['searchRes']);
	$gid = mysqli_real_escape_string($conn, $_POST['GRID']);

	$sql = "SELECT id, username, picture FROM users WHERE username LIKE '%$match%' AND id != {$_SESSION['UID']}";
	$res = $conn->query($sql);
	if ($res->num_rows > 0){
		while ($search = $res->fetch_assoc()){
			echo "<table class='table table-hover p-0'>";
			echo "<tbody>";
			echo "<tr>";
			echo "<td><img src='profile_pic/".$search['picture']."' class='img-fluid rounded-img' style='width: 50px;'></td>";
			echo "<td>".$search["username"]."</td>";
			
			echo "<td>";
			echo "<form>";
			echo "<input type='hidden' id='grid' value='".$gid."'>";
			echo "<input type='hidden' id='userid' value='".$search['id']."'>";
			echo "<input type='hidden' id='username' value='".$search['username']."'>";
			echo "<button type='button' id='addbtn' class='btn btn-success'>";
			echo "<i class='fas fa-plus-square'></i>";
			echo "</button>";
			echo "</form>";
			echo "</td>";

			echo "</tr>";
			echo "</tbody>";
			echo "</table>";
		}
	}
	else{
		echo "<span class='text-danger'>No suggestion</span>";
	}	
}

// Add member details to DB

if (isset($_POST['MemName']) AND isset($_POST['MemId']) AND isset($_POST['GroupId'])){

	$mem_id   = mysqli_real_escape_string($conn, $_POST['MemId']);
	$group_id = mysqli_real_escape_string($conn, $_POST['GroupId']);
	$mem_name = mysqli_real_escape_string($conn, $_POST['MemName']);

	$sql = "INSERT INTO group_members (group_id, member_id, member_name) VALUES (?,?,?)";
	$stmt = $conn->prepare($sql);

	if ($stmt){
		$stmt->bind_param('iis', $group_id, $mem_id, $mem_name);
		if ($stmt->execute()){
			echo "Added";
		}
		else{
			echo " Already Member";
		}
	}
	else{
		echo "<script>alert('Aww!! try again later');</script>";
	}
}

// available group members sum

if (isset($_GET['sum']) AND $_GET['sum'] == 'mem'){
	$sql = "SELECT * FROM group_members";
	$result = $conn->query($sql);
	$count = $result->num_rows;
	echo $count;
}

// displaying all members

if (isset($_GET['show']) AND $_GET['show'] == 'mem'){
	
	$sql = "SELECT id, username, picture FROM users JOIN group_members ON users. id = group_members. member_id";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		echo "<table class='table table-hover w-100'>";
		while($data = $result->fetch_assoc()){

			echo "<tbody>";

			echo "<tr>";

			echo "<td class='mx-auto'>";
			echo "<img src='profile_pic/".$data['picture']."' class='img-fluid rounded-circle' style='width: 50;'>";
			echo "</td>";
			echo "<td>".$data['username']."</td>";
			echo "<td>";

			echo "<form>";
			echo "<input type='hidden' id='MEMBERID' value='".$data['id']."'>";
			echo "<button type='button' id='delMember' class='btn btn-danger'><i class='fas fa-minus-circle'></i></button>";
			echo "</form>";

			echo "</td>";

			echo "</tr>";

			echo "</tbody>";
		}
			echo "</table>";
	}
	else{
		echo "No member yet";
	}
}

// Search in group member
if (isset($_POST['SM'])){
	$search_member = mysqli_real_escape_string($conn, $_POST['SM']);

	$sql = "SELECT id, username, picture FROM users JOIN group_members ON group_members. member_id = users.id WHERE member_name LIKE '%$search_member%';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		echo "<table class='table table-hover w-100'>";
		while ($search = $result->fetch_assoc()){
			echo "<tbody>";

			echo "<tr>";

			echo "<td class='mx-auto'>";
			echo "<img src='profile_pic/".$search['picture']."' class='img-fluid rounded-circle' style='width: 50;'>";
			echo "</td>";
			echo "<td>".$search['username']."</td>";
			echo "<td>";

			echo "<form>";
			echo "<input type='hidden' id='MEMBERID' value='".$search['id']."'>";
			echo "<button type='button' id='delMember' class='btn btn-danger'><i class='fas fa-minus-circle'></i></button>";
			echo "</form>";

			echo "</td>";

			echo "</tr>";

			echo "</tbody>";
		}
		echo "</table>";
	}
	else{
		echo "No Recommendations";
	}
}

// Delete Member

if (isset($_POST['DELID'])){

	$id = mysqli_real_escape_string($conn, $_POST['DELID']);
	$id = filter_var($id, FILTER_VALIDATE_INT);
	if (!$id){echo "Unable to delete member";}
	
	else{
		$sql = "DELETE FROM group_members WHERE member_id = ?";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bind_param('i', $id);
			if($stmt->execute()){
				echo "Member deleted";

			}
			else{
				echo "Unable to delete this member";
			}
		}
		else{
			echo "Request Denied";
		}
	}
}

?>


<script type="text/javascript">
	// Add member in Group

$("#addbtn").click(function(){

		var username = $("#username").val();
		var id       = $("#userid").val();
		var group_id = $("#grid").val();

		$.ajax({
			type   : 'post',
			url    : 'addMem.php',
			data   : {MemName: username, MemId: id, GroupId: group_id},

			success: function(responce){
				$(".fa-plus-square").html(responce);
			}
		});
});

// DELETE available member in Group

$("#delMember").click(function(){

	var id = $("#MEMBERID").val();
	if (id.length == ''){
		console.log("Invalid id");
	}
	else{
		$.ajax({
			type: 'post',
			url : 'addMem.php',
			data : {DELID:id},
			success : function(responce){
				displayMembers();
			}
		});
	}

});
</script>