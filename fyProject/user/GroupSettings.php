<?php 
session_start();
if(!isset($_SESSION['USEREMAIL'])){
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
	include '../config.php';
  	$sql = "SELECT * FROM users WHERE  email = '".$_SESSION['USEREMAIL']."'";
 	$result = $conn->query($sql);
 	$res = $result->fetch_assoc(); 
}
if(isset($_POST['GroupSettings']) AND isset($_POST['grouphiddenid'])){
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
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="mygroups.php" class="nav-link">My Groups</a>
          <abbr title="Create a Group"><a href="group.php" ><i class="fas fa-plus"></i></a></abbr>
        </div>
      </li>
    </ul>

    <div class="col-md-3 text-end">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <a href="profile_setting.php" class="float-right profile" id="userDP"><img src="<?php echo 'profile_pic/'.$res['picture']; ?>"></a>
  </header>

 </div>  <!--cONTAINER END-->

 <div class="container-fluid">
 	<!-- statistics button -->
 	<abbr title="statistics"><button type="button" class="btn d-md-none d-block" data-toggle="collapse" data-target="#statistics"><i class="fas fa-caret-down"></i></button></abbr>
 	<div class="collapse d-md-block" id="statistics">
	 	<div class="row justify-content-center">
	 		<div class="col-md-3">
	 			<div class="card my-md-0 my-3 text-white bg-danger">
	 				<div class="card-header">
	 					<h4 class="card-title">Members</h4>
	 				</div> 		
	 				<div class="card-body">
	 					<p class="text-center" id="avail"></p>
	 				</div>		
	 				<div class="card-footer text-center">
	 					<a type="button" data-toggle="modal" data-target="#membermodal" class="text-white text-decoration-none">View</a>
	 				</div>
	 			</div>
	 		</div>

	 		<div class="col-md-3">
	 			<div class="card my-md-0 my-3 text-white bg-info">
	 				<div class="card-header">
	 					<h4 class="card-title">Posts</h4>
	 				</div> 		
	 				<div class="card-body">
	 					<p class="text-center"><?php PostSum($_POST['grouphiddenid']); ?></p>
	 				</div>		
	 				<div class="card-footer text-center">
	 					<a type="button" data-toggle="modal" data-target="#postmodal" class="text-white text-decoration-none" style="visibility:hidden;">View</a>
	 				</div>
	 			</div>
	 		</div>

	 		<div class="col-md-3">
	 			<div class="card my-md-0 my-3 text-white bg-success">
	 				<div class="card-header">
	 					<h4 class="card-title">Requests</h4>
	 					<input type="hidden" id="reqGROUPID" value="<?php echo $_POST['grouphiddenid']; ?>">
	 				</div> 		
	 				<div class="card-body">
	 					<p class="text-center" id="JREQS"></p>
	 				</div>		
	 				<div class="card-footer text-center">
	 					<a type="button" data-toggle="modal" data-target="#RequestModal" class="text-white text-decoration-none">View</a>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	</div>
	 	<!-- 2nd row start -->
<?php 
$sql   = "SELECT * FROM groups WHERE g_id = {$_POST['grouphiddenid']}";
$ginfo = $conn->query($sql);
$ginfo = $ginfo->fetch_assoc();
?>
	 	<h3 class="text-center font-weight-bolder text-primary my-3" style="text-shadow: 2px 3px 2px #99ff99; font-size: 38px; font-style: italic;">Edit Group Details</h3>
	 	<div class="row my-3 justify-content-center">
	 		<!-- Hidden Group ID -->
	 		<input type="hidden" id="g_id" value="<?php echo $_POST['grouphiddenid'] ?>">
			<div class="col-md-4 col-12">
				<div class="input-group mb-3">
				  <input type="text" id="UpdateGroupName" class="form-control border border-info" placeholder="Group Name" value="<?php if(isset($ginfo['g_name'])){echo $ginfo['g_name'];} ?>">
				  <div class="input-group-append">
				    <button class="btn btn-outline-dark" type="button" id="GNameBtn">Button</button>
				  </div>
				</div>				
			</div>
	 	</div>

	 	<div class="row justify-content-center">
	 		<div class="col-md-4 col-12">
				<div class="input-group">
				  <textarea class="form-control border border-info" id="GDESC" placeholder="<?php if(isset($ginfo['g_desc'])){echo $ginfo['g_desc'];} ?>"></textarea>
				  <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="button" id="GDescBtn">Button</button>
				  </div>
				</div>
			</div>
	 	</div>
	 	<!-- 2nd row end -->
	 	<div id="opreation" class="text-center text-danger mt-3"></div>

	 	<!-- group profile Img -->
	 	<div class="row justify-content-center">
	 		<form enctype="multipart/form-data" class="mt-4" method="POST" action="">
	 			<input type="hidden" name="g_id" value="<?php echo $_POST['grouphiddenid'] ?>">
	 			<label for="GroupImg" class="form-label d-block mx-auto">
					<i class="fas fa-photo-video fa-3x" style="color: #0000e6;"></i>
				</label>
				<input type="file" id="GroupImg" name="GroupImg" style="visibility: hidden;">
				<button type="submit" name="UGRIMG" class="btn btn-primary float-left mt-3 mb-5">Update</button>
	 		</form>
	 	</div>
 </div>

<!-- Member modal start -->

<div class="modal fade" id="membermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Available Members</h5>
        <input type="search" id="SearchAvailUser" class="form-control" placeholder="Search a member">
      </div>
      <span class="text-center" id="SRES"></span>
      <div class="modal-body overflow-auto">
        <div class="col-12 " id="DMEM"></div>
      </div>
    </div>
  </div>
</div>

<!-- REQUESTS Modal -->
<div class="modal fade" id="RequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pending Requests</h5>
      </div>
      <span class="text-center" id="SRES"></span>
      <div class="modal-body overflow-auto">
        <table class="table table-responsive w-100">
<?php 
$sql = "SELECT * FROM joingrouprequest JOIN users ON joingrouprequest. member_id = users. id WHERE group_id = '".$_POST['grouphiddenid']."'"; 
$res = $conn->query($sql);
if ($res->num_rows > 0){
	while($requests = $res->fetch_assoc()){
		echo "<tbody class='ml-0 mr-0'>";
		?>
						<tr>
							<td><img src="<?php echo 'profile_pic/'.$requests['picture']; ?>" class="img-fluid rounded-circle" style="max-width: 60px;"></td>
							<td><?php echo $requests['name']; ?></td>
							<td>
								<form>
									<input type="hidden" id="request_id" value="<?php echo $requests['req_id']; ?>">
									<button type="button" id="approveRequest" class="btn btn-outline-success"><i class="fas fa-check-circle"></i></button>
								</form>
							</td>
						</tr>
		<?php
		echo "</tbody>";
	}
}
else{
	echo "<p class='text-center text-info'>No request is pending</p>";
}
?>       	
        </table>
      </div>
      <div class="modal-footer">
      	<span id="approve"></span>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



 <!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>


<script type="text/javascript">

	$(document).ready(function(){
		// no. of group members
		setInterval(function(){
			$.ajax({
				url: 'addMem.php?sum=mem',
				success: function(responce){
					$("#avail").html(responce);
				}
			});
		},2000);
	});

// displaying group members in card

function displayMembers(){
	$.ajax({
		type : 'post',
		url  : 'addMem.php?show=mem',
		success : function(responce){
			$("#DMEM").html(responce);
		}
	});
}

displayMembers();


// Display JOIN Requests in card body

function DisplayJoinRequests(){
 var group_id = $("#reqGROUPID").val();

 $.ajax({

 		type: 'POST',
 		url: 'operations.php?req=pending',
 		data: {group_id, group_id},
 		success: function(data){
 			$("#JREQS").html(data);
 		}
 });
}

DisplayJoinRequests();

// Search among available members

$("#SearchAvailUser").on("keyup", function(){
	var search_member = $(this).val();

	if (search_member.length == ''){}
	else{
		$.ajax({
			type : 'post',
			url  : 'addMem.php',
			data : {SM: search_member},
			success: function(data){
				$("#DMEM").html(data);
			}
		});
	}
});

// Approve Join Request

$("#approveRequest").click(function(){
	var req_id = $("#request_id").val();
	
	$.ajax({
		type: 'post',
		url : 'operations.php',
		data: {req: req_id},
		success: function(responce){
			JoinRequests();
			$("#approve").html(responce);
		}
	});

});

// update Group Name

$("#GNameBtn").click(function(){
	var new_name = $("#UpdateGroupName").val();
	var new_name = $.trim(new_name);

	var gid = $("#g_id").val();
	if(new_name.length == 0){
		$("#opreation").text("Couldn't be empty");
	}
	else{
		$.ajax({
			method: 'post',
			url: 'operations.php',
			data: {GN: new_name, GID: gid},
			success: function(data){
				$("#UpdateGroupName").html(data);
			}
		});
	}
});

// Update Group Description

$("#GDescBtn").click(function(){
	var desc = $("#GDESC").val();
	var desc = $.trim(desc);
	var gid = $("#g_id").val();

	if(desc.length == 0){
		$("#opreation").text("Couldn't be empty");
	}
	else{
		$.ajax({
			method: 'post',
			url: 'operations.php',
			data: {GD: desc, GID: gid},
			success: function(feedback){
				$("#GDESC").html(feedback);
			}
		});
	}
});


</script>
</body>
</html>

<?php 

// Update Group Photo

if (isset($_POST['UGRIMG']) AND isset($_POST['g_id'])){

	if(isset($_FILES['GroupImg']['name'])){
		$gid = mysqli_real_escape_string($conn, $_POST['g_id']);

		$gid = filter_var($gid, FILTER_VALIDATE_INT);

		$filename 			= time() . $_FILES['GroupImg']['name'];
		$size    			= $_FILES['GroupImg']['size'];
		$filetype 			= $_FILES['GroupImg']['type'];
		$temp_dir			= $_FILES['GroupImg']['tmp_name'];
		$upload_directory   = "GroupPhoto/".$filename;
		$ext     			= pathinfo($filename, PATHINFO_EXTENSION);

		if($ext=='png' OR $ext=='jpg' OR $ext=='jpeg'){

			$upload = move_uploaded_file($temp_dir, $upload_directory);
			// now store post in DB
			if ($upload){
				$sql = "UPDATE groups SET g_profile = ? WHERE g_id = ?";
				$stmt = $conn->prepare($sql);
				if ($stmt){
					$stmt->bind_param('si', $upload_directory, $gid);
					if ($stmt->execute()){	
						echo "<span class='text-success text-center'>Updated Successfully</span>";

						header("Location: GroupSettings.php");
						die();
					}
					else{
						echo "<script>alert('error occur while updating your Group Picture');</script>";

						header("Location: GroupSettings.php");
						die();
					}
				}
				else{
					echo "<script>alert('Unable to process your request try again later!!');</script>";

					header("Location: GroupSettings.php");
					die();
				}
			}
		}
		else{
			echo "<script>alert('You can only upload an image file');</script>";

			header("Location: GroupSettings.php");
			die();
		}
	}
	else{
		echo "<script>alert('Choose a file ');</script>";
		header("Location: GroupSettings.php");
		die();
	}
}


}


// display sum of total post
 function PostSum($group_id){
 	GLOBAL $conn;
 	$sql = "SELECT * FROM group_posts where group_id = {$group_id}";
 	$sum = $conn->query($sql);
 	if($sum->num_rows > 0){
 		$sum = $sum->num_rows;
 		echo $sum;
 	}
 	else{
 		echo "0";
 	}
 }
?>