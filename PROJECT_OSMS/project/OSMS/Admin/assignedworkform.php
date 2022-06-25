<?php 
if(!isset($_SESSION['aLogin'])){
	echo "<script>location.href='adminlogin.php'</script>";
}
else{
?>

<div class="jumbotron col-lg-5 col-md-7 ml-5"> <!--Third column (Form) start-->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h5 class="text-center mt-0">Assign Work Order Requests</h5>
		<div class="form-group">
			<label for="request_id">Request ID</label>
			<input type="text" name="request_id" class="form-control" value="<?php if(isset($row['request_id'])){echo $row['request_id'];} ?>" id="request_id" readonly>
		</div>	
		<div class="form-group">
			<label for="request_info">Request Info</label>
			<input type="text" name="requestinfo" value="<?php if(isset($row['requestinfo'])){echo $row['requestinfo'];} ?>" class="form-control" id="request_info">
		</div>	
		<div class="form-group">
			<label for="requestdesc">Request Description</label>
			<input type="text" name="requestdesc" value="<?php if(isset($row['requestdesc'])){echo $row['requestdesc'];} ?>" class="form-control" id="requestdesc">
		</div>	
		<div class="form-group">
			<label for="requestname">Name</label>
			<input type="text" name="reqName" value="<?php if(isset($row['reqName'])){echo $row['reqName'];} ?>" class="form-control" id="requestname">
		</div>	
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="requesteradd1">Address Line 1</label>
				<input type="text" value="<?php if(isset($row['requesteradd1'])){echo $row['requesteradd1'];} ?>" name="requesteradd1" class="form-control" id="requesteradd1">
			</div>	
			<div class="form-group col-md-6">
				<label for="requesteradd2">Address Line 2</label>
				<input type="text" value="<?php if(isset($row['requesteradd2'])){echo $row['requesteradd2'];} ?>" name="requesteradd2" class="form-control" id="requesteradd2">
			</div>	
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="city">City</label>
				<input type="text" value="<?php if(isset($row['reqCity'])){echo $row['reqCity'];} ?>" name="reqCity" id="city" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="status">State</label>
				<input type="text" value="<?php if(isset($row['reqState'])){echo $row['reqState'];} ?>" name="reqState" id="status" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="zip">Zip</label>
				<input type="text" value="<?php if(isset($row['requesterzip'])){echo $row['requesterzip'];} ?>" name="requesterzip" onkeypress="isInputNumber(event)" id="zip" class="form-control">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-7">
				<label for="email">Email</label>
				<input type="email"  value="<?php if(isset($row['requesterEmail'])){echo $row['requesterEmail'];} ?>" name="requesterEmail" id="email" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="mobile">Mobile</label>
				<input type="text" value="<?php if(isset($row['requesterMobile'])){echo $row['requesterMobile'];} ?>" name="requesterMobile" onkeypress="isInputNumber(event)" id="mobile" class="form-control">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="assigntech">Assigned to Technician</label>
				<input type="text" name="assigntech" id="assigntech" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="date">Date</label>
				<input type="date" name="inputDate" id="date" class="form-control">
			</div>
		</div>
		<div><?php if(isset($regmsg)){echo $regmsg;} ?></div>
		<div class="float-right mt-4">
			<button type="submit" class="btn btn-success mr-3" name="assign">Assign</button>
			<button type="reset" class="btn btn-secondary">Reset</button>
		</div>	
	</form>
</div>	<!--Third column (Form) end-->
<script>
		function isInputNumber(evt){
			var ch = String.fromCharCode(evt.which);
			if (!(/[0-9]/.test(ch))){
				evt.preventDefault();
			}
		}
</script>

<?php 
}
?>