<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])){
	echo "<script>window.location.href='http://localhost/FYProject/user/login.php';</script>";
}
else{
  include '../config.php';
  $sql = "SELECT * FROM users WHERE email = '".$_SESSION['USEREMAIL']."'";
  $result = $conn->query($sql);
  $res = $result->fetch_assoc();

if (isset($_GET['mUid'])){
	$id = mysqli_real_escape_string($conn, $_GET['mUid']);
	$id = filter_var($_GET['mUid'], FILTER_VALIDATE_INT);
	if($id){
		$sql = "SELECT * FROM users WHERE id = '".$id."' ";
		$result = $conn->query($sql);
		if ($result->num_rows >0){
			$name = $result->fetch_assoc();
		}
	}
	else{
		die();
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

 <title>Text</title>
</head>
<body>

<div class="container mb-4 p-0">

  <!-- navbar start -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="profile.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="messages.php" class="nav-link px-2 link-dark">Messages</a></li>
      <li><a href="moreGroups.php" class="nav-link px-2 link-dark">Explore</a></li>

    </ul>

    <div class="col-md-3 text-end">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <a href="profile_setting.php" class="float-right profile" id="userDP"><img src="<?php echo 'profile_pic/'.$res['picture']; ?>"></a>
  </header>
</div>
<!-- navbar end -->

<!-- main message area start -->

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9 col-sm-11 col-12">
			<div class="msg-area">		
				<div class="message-header">
					<img src="<?php echo 'profile_pic/'.$name['picture']; ?>" alt="user photo" class="img-fluid rounded-circle mr-2" style="width: 50px; height: 40px;">
					<span><?php echo $name['username']; ?></span>
					<span class="float-right"><abbr title="Last seen"><?php if($name["status"] == 0){echo "<span class='badge badge-warning p-1'>Offline</span>";}else{echo "<span class='badge badge-success p-1'>Online</span>";} ?></abbr></span>
				</div>
				<div class="main-area pt-3">
					<!--CODE TO DISPLAY ALL NEW/PREVIOUS MESSAGES -->
				<?php 
					// $sql = "SELECT * FROM messages JOIN users ON messages. user_id = users. id WHERE from_id = {$name['id']} AND to_id = '".$_SESSION['UID']."' ";
					$sql = "SELECT * FROM messages WHERE from_id = {$name['id']} AND to_id = {$_SESSION['UID']} OR from_id = {$_SESSION['UID']} AND to_id = {$name['id']}";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						while ($UserMsg = $result->fetch_assoc()){
							echo "<p class='UserMsg'>";
							echo $UserMsg['message'];
							echo "</p>";
						}
					}
				 ?>
				 <p class="MyMsg"></p><br>
				</div>


				<div class="newMesage">
					<form action="" id="myform">
						<div class="form-group">
							<div class="input-group mb-3">
							  <input type="text" class="form-control" placeholder="Send Message" id="message">
							  <div class="input-group-append">
							    <button type="button" id="SendMsg" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
							  </div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- main message area end -->

</body>
<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

<!-- send message jQuery code -->

<script type="text/javascript">

$(document).ready(function(){
	$('#SendMsg').click(function(){
		var Message = $('#message').val();
		var to_id = "<?php echo $_GET['mUid']; ?>";
		if(Message == ''){
			alert('Could not send empty message!!');
		}
		if(to_id == ''){
			alert('Invalid Reciever ID');
		}
		else{
			
			$.ajax({
				type: 'POST',
				url: 'deployMsg.php',
				data: {Message, to_id},
				success: function(responce){
					$('.MyMsg').html(responce);
					$('#myform')[0].reset();
				}
			});
		}
	});
});

// show inserted data using ajax request 
function show_data(){
	$.ajax({
		type: 'GET',
		url : 'deployMsg.php?ajax=show',
		success: function(responce){
			$('.MyMsg').html(responce);
		}
	});
}
show_data();
</script>


<?php
} //else end
?>