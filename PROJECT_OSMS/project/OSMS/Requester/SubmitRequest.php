<?php 
/*
Submit the service request to DB so that the admin can go through his/her service request and respond
*/

	define('PAGE', 'SubmitRequest');
	define('TITLE', 'SubmitRequest');

	include 'include/header.php';
	session_start();
	if (!$_SESSION['login']['rEmail']){
		echo "<script>location.href= 'RequesterLogin.php'</script>";
	}

	else{

		if (isset($_REQUEST['submitrequest'])){

			$requestinfo 	 = $_REQUEST['requestinfo'];
			$requestdesc 	 = $_REQUEST['requestdesc'];
			$reqName 	 	 = $_REQUEST['reqName'];
			$requesteradd1   = $_REQUEST['requesteradd1'];
			$requesteradd2   = $_REQUEST['requesteradd2'];
			$reqCity         = $_REQUEST['reqCity'];
			$reqState        = $_REQUEST['reqState'];
			$requesterzip    = $_REQUEST['requesterzip'];
			$requesterEmail  = $_REQUEST['requesterEmail'];
			$requesterMobile = $_REQUEST['requesterMobile'];
			$date 			 = $_REQUEST['date'];
			// Checking empty fields.
			if ( ($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['reqName'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['reqCity'] == "") || ($_REQUEST['reqState'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesterEmail'] == "") || ($_REQUEST['requesterMobile'] == "") || ($_REQUEST['date'] == "")){
				$regmsg = '<div class="alert alert-warning" role="alert">All fields requiured</div>';
			}
			else{
				// db connection
				include '../db_connection.php';
				// Now store Submit Request form into DB

					$sql ="INSERT INTO submitrequest_tb(requestinfo, requestdesc, reqName , requesteradd1, requesteradd2,reqCity,reqState,requesterzip, requesterEmail,requesterMobile, `date`) VALUES ('".$requestinfo."','".$requestdesc."','".$reqName."','".$requesteradd1."','".$requesteradd2."','".$reqCity."','".$reqState."','".$requesterzip."','".$requesterEmail."','".$requesterMobile."','".$date."')";

					$result = $conn->query($sql);
					if ($result == true){
						//This mysqli_insert_id() function gives us the Row.ID of recently insert row(new data/new entry)
						$genid = mysqli_insert_id($conn);
						$regmsg = '<div class="alert alert-success" role="alert">Request submitted successfully</div>';
						$_SESSION['login']['genid'] = $genid;
						echo "<script>location.href='submitrequestsuccess.php'</script>";
					}
					else{$regmsg = '<div class="alert alert-danger" role="alert">Error while submitting your request</div>';}
			}		
		}
	}
?>

<!-- Service Form starts -->
	<div class="col-sm-9 col-md-10 mt-0">
		<form action="" class="mx-5" method="POST">
			<div class="form-group">
				<label for="inputRequestInfo">Request Info</label>
				<input type="text" class="form-control" placeholder="Request Info" name="requestinfo" id="inputRequestInfo">
			</div>
			<div class="form-group">
				<label for="inputRequestDescription">Description</label>
				<input type="text" class="form-control" placeholder="Description" name="requestdesc" id="inputRequestDescription">
			</div>
			<div class="form-group">
				<label for="Name">Name</label>
				<input type="text" class="form-control" placeholder="Your Name" name="reqName" id="Name">
			</div>

			<div class="form-row"> 
				 <div class="form-group col-md-6">
				 	<label for="inputAddress">Address Line 1</label>
				 	<input type="text" name="requesteradd1" placeholder="House No. 123" class="form-control" id="inputAddress">
				 </div>
				 <div class="form-group col-md-6">
				 	<label for="inputAddress2">Aaddress Line 2</label>
				 	<input type="text" name="requesteradd2" class="form-control" placeholder="Railway Colony" id="inputAddress2">
				 </div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputCity">City</label>
					<input type="text" class="form-control" name="reqCity" id="inputCity" placeholder="Lhr">	
				</div>				
				<div class="form-group col-md-4">
					<label for="inputstate">State</label>
					<input type="text" name="reqState" id="inputstate" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label for="inputzip">Zip</label>
					<input type="text" name="requesterzip" onkeypress="isInputNumber(event)" id="inputzip" class="form-control" placeholder="[ 0 - 9 ]">
				</div>
			</div>

			<div class="form-row mb-3">
				<div class="form-group col-md-6">
					<label for="requesteremail">Email</label>
					<input type="email" name="requesterEmail" id="requesteremail" class="form-control" placeholder="Email">
				</div>	
				<div class="form-group col-md-2">
					<label for="requestermobile">Mobile</label>
					<input type="text" name="requesterMobile" onkeypress="isInputNumber(event)" id="requestermobile" placeholder="Ph no. only" class="form-control">					
				</div>	
				<div class="form-group col-md-3">
					<label for="date">Date</label>
					<input type="date" name="date" id="date" class="form-control">		
				</div>		
			</div>

			<button type="submit" name="submitrequest" class="btn btn-danger ">Submit</button>

			<button type="reset" class="btn btn-secondary ">Reset</button>
			<?php if (isset($regmsg)){echo $regmsg;} ?>
		</form>		
	</div>
<!-- Service Form ends -->

<!-- Javascript functions start -->
	<script>
		function isInputNumber(evt){
			var ch = String.fromCharCode(evt.which);
			if (!(/[0-9]/.test(ch))){
				evt.preventDefault();
			}
		}
	</script>
<!-- Javascript functions ends -->

<?php 
	include 'include/footer.php';
?>
	
