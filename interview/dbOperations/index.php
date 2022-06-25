<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- link bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>OOP DB OPERATIONS</title>
</head>
<body>
	<div class="container mt-5">

		<!-- row 1 start -->
		
		<div class="row offset-md-3">
			<div class="col-md-7 col-sm-9">
				<form method="POST">
				  <div class="mb-3">
				    <label for="name" class="form-label">Name</label>
				    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
				    <p id="err1" class="text-danger text-sm"></p>
				     <label for="email" class="form-label">Email address</label>
				    <input type="email" class="form-control" id="email">
				    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				    <p id="err2" class="text-danger text-sm"></p>
				  </div>
				  <div class="mb-3">
				    <select class="form-select" id="select" aria-label="Default select example">
					  <option disabled>Select a Country</option>
					  <option value="Pakistan" selected>Pakistan</option>
					  <option value="India">India</option>
					  <option value="Bangladesh">Bangladesh</option>
					  <option value="United Kingdom">United Kingdom</option>
					  <option value="United States">United States</option>
					  <option value="Morroco">Morroco</option>
					</select>
				  </div>
				  <button type="button" id="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
				</form>
				<div id="responce" ></div>
			</div>
		</div>

		<!-- row 2/3 start -->

		<div class="row mt-5">
			<div class="col-4 offset-md-3">
				<select class="form-select" id="choose" aria-label="Default select example">
			    <option disabled selected>Select a Country</option>
			    <option value="Pakistan">Pakistan</option>
			    <option value="India">India</option>
			    <option value="Bangladesh">Bangladesh</option>
			    <option value="United Kingdom">United Kingdom</option>
			    <option value="United States">United States</option>
			    <option value="Morroco">Morroco</option>
			</select>
			</div>
		</div>

		<div class="row my-3" id="onSELECT">
			<div class="col-md-10 col-9 offset-md-2 offset-2">
				<table class="table table-hover table-border">
					<thead>
						<tr>
							<th>Country</th>
							<th>No. of Students</th>
						</tr>
					</thead>
					<tbody id="phpRes">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>


<!-- link jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!-- My jQuery script -->

<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			var name    = $("#name").val();
			var email   = $("#email").val();

			if (name.length == ''){
				$("#err1").text("Name required");
			}

			if (email.length == ''){
				$("#err2").text("Email required");
			}

			else{
				var country = $("#select").val();
				$.ajax({
					type: 'post',
					url : 'dbOperations.php',
					data: {fv1: name, fv2: email, fv3: country},
					success: function(responce){
						$("#responce").html(responce);
					}
				});
			}
					
		});

		// count students on the result of country SELECT*
		$("#onSELECT").hide();

		$("#choose").change(function(){

			var showDetail = $("#choose").val();
			$.ajax({
				type: 'post',
				url : 'dbOperations.php',
				data: {explore: showDetail},
				success: function(data){
					$("#phpRes").append(data);
					$("#onSELECT").show();				
				}
			});
		});
			
	});
</script>

</body>
</html>