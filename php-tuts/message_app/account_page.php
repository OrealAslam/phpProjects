<?php 
include 'config.php';
$obj = new Db_connect();
if (!isset($_SESSION['ulogin'])){

	header("location: login.php");
}

// fetching User ID 

if (isset($_POST['sendmsg'])){
	$obj->store_msg($_POST);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>User Area</title>
	<!-- link bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- link fontawsome -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>
<?php if($obj->notify() >0){ ?>
	<div class="container my-4">
		<div class="row justify-content-end">
			<a href="account_page.php?view=unread"class="btn-floating btn-blue btn-lg btn-default"><i class="fas fa-bell"></i></a><span class="counter counter-sm ml-n3 mt-1"><?php echo $obj->notify(); ?></span>
		</div>
	</div>
<?php }else{ ?>
<div class="container my-4">
		<div class="row justify-content-end">
			<button type="submit" class="btn btn-white disabled" disabled><i class="fas fa-bell"></i></button><span class=" counter counter-sm ml-n3 mt-n2"><?php echo $obj->notify(); ?></span>
		</div>
</div>
<?php } ?>


<?php 
if (isset($_GET['view']) AND $_GET['view'] == 'unread'){
?>
<!-- view msg container start -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 shadow">
			<!-- displaying unread messages  -->
					 <?php  $data = $obj->displayUnreadMessages();
					 ?>
				<ul style="text-decoration: none; list-style: none;">
					<li>
						<b>From : <?php echo $data['from_id']; ?></b>
						<!-- actual message goes here -->
						<p class="my-1"><?php echo $data['message']; ?></p>
					</li>
						
				</ul>
		</div>
	</div>
</div>
<!-- view msg container end -->
<?php 
}else{
?>

<!-- send msg container start -->
<div class="container py-3">
	<center><h4>Message <span class="text-info">Anyone</span></h4></center>
	<div class="row justify-content-center my-5">
		<div class="col-md-8">
			<center>
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
					<select class="form-select form-control" name="to_id" required>
						<option selected>Message To...</option>
					<!-- displaying available users for msg -->
					<?php $res = $obj->displayUserForMsg(); 
						foreach ($res as $value){
					?>	
						<option value="<?php echo $value[0]; ?>" class="form-control" ><?php echo $value[1];?></option>
					<?php		
						}
					?>				
					</select>
				
			<!-- message area -->
					<div class="form-group my-3">
						<textarea class="form-control" name="message" aria-label="With textarea" placeholder="Enter Message" required></textarea>
					</div>

					<button type="submit" class="btn btn-info btn-block" name="sendmsg">Send Message</button>
				</form>	
				<div class="row">

					<!-- display message (sent or not) -->
					<?php 
						if (isset($_GET['error']) AND $_GET['error'] == 'empty'){
							echo "<span class='alert alert-danger my-3 w-100' role='alert'>all fields required</span>";
						} 

						if (isset($_GET['error']) AND $_GET['error'] == 'notsend'){
							echo "<span class='alert alert-danger my-3 w-100' role='alert'>Message not sent!!</span>";
						}

						if (isset($_GET['success']) AND $_GET['success'] == 'sent'){
							echo "<span class='alert alert-success my-3 w-100' role='alert'>Message Sent!!</span>";
						}
					?>
				</div>
			</center>
			
	</div> <!--end column-->
	</div>	<!--end row-->
</div>
<!-- send msg container start -->
<?php 
} //else end
?>


<!-- link Js files -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>