<?php 
// this will only work on live server not on localhost
if (isset($_REQUEST['submit'])){
	if(($_REQUEST['name'] == "" ) ||($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")){
		$regmsg = "<div class='alert alert-warning text-center text-capitalize' role='alert'>all fields required</div>";
	}
	else{
		$name = $_REQUEST['name'];
		$subject = $_REQUEST['subject'];
		$email = $_REQUEST['email']; // user email (sender)
		$message = $_REQUEST['message'];

		$mailTo = "umerkhalid2683@gmail.com"; //admin mail(reciever)
		$headers = 'From :'. $email;
		$txt = "you have recieved an email from". $name ."<br><br>".$message;
		if(mail($mailTo, $subject, $txt, $headers)){
		$regmsg = "<div class='alert alert-success text-center text-capitalize' role='alert'>sent successfully</div>";
		}
		else{
			$regmsg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>email not sent</div>";
		}
	}
}

?>

<div class="col-md-8">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Name"><br>
			<input type="text" name="subject" class="form-control" placeholder="Subject"><br>
			<input type="email" name="email" placeholder="Email" class="form-control"><br>
			<textarea class="form-control" placeholder="How can we help U" name="message" style="height: 150px;"></textarea><br>
			<input type="submit" name="submit" class="btn btn-primary" value="Send"><br><br>
			<?php if(isset($regmsg)){echo $regmsg;} ?>
		</div>
	</form>
</div>
