<!DOCTYPE html>
<html>
<head>
	<title>jQuery Ajax in Urdu</title>
	<!-- link bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="container my-5">
		<div class="row justify-content-center">
			<h4 class="text-center mb-5">jQuery Ajax tutorials</h4>
			<div class="col-md-4">
					
					<div class="form-group">
						<label class="form-label">Username</label>
						<input type="text" class="form-control" id="name">
					</div>

					<div class="form-group">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" id="email">
					</div>

					<div class="form-group">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" id="password">
					</div>

					<button type="submit" class="btn btn-info" id="submit" >Submit</button>
			
				<!-- feedback DIV -->
				<div id="msg"></div>
			</div>
		</div>
			<div class="col-md-8" id="show"></div>
		</div>
		
<!-- link JS files -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>