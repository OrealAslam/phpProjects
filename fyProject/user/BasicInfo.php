<?php 
session_start();
if (!isset($_SESSION['USEREMAIL'])){
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
include_once '../config.php';
$sql = "SELECT * FROM user_bio WHERE user_id = '".$_SESSION['UID']."'";
$result = $conn->query($sql);
$detail = $result->fetch_assoc();
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

 <title>Final, Project</title>
</head>
<body>

<?php 
if (isset($_POST['workbtn'])){
?>
<div class="container my-5">
	<h3 class="text-danger" style="text-shadow: 2px 2px 1px blue; font-size: 38px;">Work and Education</h3>
	<div class="row">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Company</th>
						<th>Postion</th>
						<th>City</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
					<tr>
						<td><?php if(isset($detail['company_name'])){echo $detail['company_name'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['position'])){echo $detail['position'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['city'])){echo $detail['city'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['description'])){echo $detail['description'];}else{echo "NULL";} ?></td>
						<td>
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#collapseButton"><i class="fas fa-user-edit"></i></button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="row py-5">
		<div class="col-md-6 offset-md-3 shadow shadow-sm">
			<div class="collapse" id="collapseButton">
				<div class="card-header bg-primary p-1">
					<h3 class="text-light text-center">Edit your Info</h3>
				</div>
			  <div class="card card-body">
			    <div class="form-group">
			    	<input type="text" class="form-control" id="company" placeholder="Company">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="position" placeholder="Position">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="city" placeholder="City">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="description" placeholder="Description">
			    </div>
			  </div>
			  <div class="card-footer">
			  	<button type="button" id="UpdateWorkBtn" class="btn btn-block btn-danger">Update</button>
			  	<div id="msg"></div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php	
}
if(isset($_POST['placebtn'])){
?>
	<div class="container mt-5 p-5">
		<h3 class="text-danger" style="text-shadow: 2px 2px 1px blue; font-size: 38px;">Places Lived</h3>
		<div class="row p-3">
			<div class="col-sm-8 col-12 offset-md-2 offset-sm-3">
				<table class="table table-bordered">
					<tr>
						<th>Current City</th>
						<th>Home Town</th>
						<th>Action</th>
					</tr>
					<tr>
						<td><?php if(isset($detail['current_city'])){echo $detail['current_city'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['hometown'])){echo $detail['hometown'];}else{echo "NULL";} ?></td>
						<td><button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapsePlace"><i class="fas fa-home"></i></button></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 offset-md-3 shadow shadow-sm">
				<div class="collapse" id="collapsePlace">
					<div class="card-header bg-info">
						<h3 class="text-light text-center">Add City</h3>
					</div>
				  <div class="card card-body">
				    <div class="form-group">
				    	<input type="text" id="currplace" placeholder="Current Place" class="form-control">
				    </div>
				    <div class="form-group">
				    	<input type="text" id="hometown" placeholder="Home Town" class="form-control">
				    </div>
				  </div>
				  <div class="card-footer">
				  	<button type="button" id="placebtn" class="btn btn-danger btn-block">Add Places</button>
				  	<div id="responce"></div>
				  </div>
			</div>
			</div>
		</div>
	</div>
<?php 
}
if (isset($_POST['contactbtn'])){
?>
<div class="container my-5">
	<h3 class="text-danger" style="text-shadow: 2px 2px 1px blue; font-size: 38px;">Contact and Basic Info</h3>
	<div class="row">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Mobile</th>
						<th>Address</th>
						<th>Website</th>
						<th>Language</th>
						<th>Religion</th>
						<th>Date of Birth</th>
						<th>Interested-in</th>
						<th>Action</th>
					</tr>
					<tr>
						<td><?php if(isset($detail['mobile'])){echo $detail['mobile'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['address'])){echo $detail['address'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['website'])){echo $detail['website'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['language'])){echo $detail['language'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['religion'])){echo $detail['religion'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['birthdate'])){echo $detail['birthdate'];}else{echo "NULL";} ?></td>
						<td><?php if(isset($detail['interested_in'])){echo $detail['interested_in'];}else{echo "NULL";} ?></td>
						<td>
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#contactButton"><i class="fas fa-user-edit"></i></button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="row py-5">
		<div class="col-md-6 offset-md-3 shadow shadow-sm">
			<div class="collapse" id="contactButton">
				<div class="card-header bg-primary p-1">
					<h3 class="text-light text-center">Edit your Info</h3>
				</div>
			  <div class="card card-body">
			    <div class="form-group">
			    	<input type="text" class="form-control" id="mobile" placeholder="Mobile" maxlength="11">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="address" placeholder="Address">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="website" placeholder="Website">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="language" placeholder="Language">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="religion" placeholder="Religion">
			    </div>
			    <div class="form-group">
			    	<input type="date" class="form-control" id="dateofbirth" placeholder="Date of Birth">
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" id="interested-in" placeholder="Interested-in">
			    </div>
			  </div>
			  <div class="card-footer">
			  	<button type="button" id="UpdateContactBtn" class="btn btn-block btn-danger">Update</button>
			  	<div id="responce"></div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
</body>
<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>






