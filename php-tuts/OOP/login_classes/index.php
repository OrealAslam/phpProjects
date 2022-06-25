<?php 

require 'config.php';
	// Creating class object
	$obj = new Db_Operation();

// signup function
if (isset($_POST['signup'])){
	$obj->signup($_POST);
}

// update info

if (isset($_POST['update'])){
	$obj->updateRecordById($_POST);
}

// delete Record by id

if (isset($_GET['deleteid'])){
	$deleteid = $_GET['deleteid'];
	$obj->deleteRecordById($deleteid);
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Sign in OOP</title>
  </head>
  <body>

  	<h3 class="text-center text-info my-3">SignUp Here</h3>

  	<!-- error and success messages -->
   <?php 
		if(isset($_GET['msg']) AND $_GET['msg'] == 'signup'){

		   echo "<div class='alert alert-success text-center' role='alert'>Signup Successfully</div>";
		} 
		if(isset($_GET['msg']) AND $_GET['msg'] == 'required'){

		   echo "<div class='alert alert-warning text-center' role='alert'>all fields required</div>";
		} 
		if(isset($_GET['msg']) AND $_GET['msg'] == 'empty'){

		   echo "<div class='alert alert-info text-center' role='alert'>empty table</div>";
		} 
		if(isset($_GET['msg']) AND $_GET['msg'] == 'error'){

		   echo "<div class='alert alert-info text-center' role='alert'>ohh! error occur</div>";
		} 
		if(isset($_GET['msg']) AND $_GET['msg']=='update'){
			echo "<div class='alert alert-success text-center' role='alert'>updated successfully</div>";
		}
		if(isset($_GET['msg']) AND $_GET['msg']=='del'){
			echo "<div class='alert alert-success text-center' role='alert'>deleted successfully</div>";
		}
		if(isset($_GET['msg']) AND $_GET['msg']=='delerr'){
			echo "<div class='alert alert-info text-center' role='alert'>error occur while deleting data</div>";
		}
   	?>
   <!-- container form start -->
   <div class="container mt-4">
   	<div class="row justify-content-center">
   		<div class="col-md-6">
   			
   			<div class="table-responsive">
   			<?php 
				// fetch record for updation

				if (isset($_GET['editid'])){
					$editid = $_GET['editid'];
					$record = $obj->displayRecordById($editid);
				
   			?>
   			<!-- update info form -->
   			<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
   				<input type="hidden" name="hid" value="<?php echo $record['id']; ?>">
   					<tr>
	   					<td>Username</td>
	   					<td><input type="text" class="form-control my-2" name="name" value="<?php if(isset($record['username'])){echo $record['username'];}?>"></td>
   					</tr>

   					<tr>
	   					<td>Email</td>
	   					<td><input type="email" class="form-control my-2" name="email" value="<?php if(isset($record['email'])){echo $record['email'];}?>"></td>
   					</tr>

   					<tr>
	   					<td>Password</td>
	   					<td><input type="password" class="form-control my-2" name="password" value="<?php if(isset($record['password'])){echo $record['password'];}?>"></td>
   					</tr>

   					<button type="submit" class="btn btn-primary my-2" name="update">Update</button>
   				</form>
   			<?php 
   				}
   				else{
   					?>

   					<!-- signup form -->
   				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
   					<tr>
	   					<td>Username</td>
	   					<td><input type="text" class="form-control my-2" name="name"></td>
   					</tr>

   					<tr>
	   					<td>Email</td>
	   					<td><input type="email" class="form-control my-2" name="email"></td>
   					</tr>

   					<tr>
	   					<td>Password</td>
	   					<td><input type="password" class="form-control my-2" name="password"></td>
   					</tr>

   					<button type="submit" class="btn btn-primary my-2" name="signup">Sign Up</button>
   				</form>
   				<?php		
   				}
   			?>
   			</div>
   		</div>

   		<div class="container mt-5">
   			<div class="row justify-content-center">
   				<div class="col-md-9">
   					<div class="table-responsive">
   					<div class="table-responsive">
	   					<table class="table table-hover">
	   						<thead class="bg-primary text-white">
	   							<tr class="text-center">
	   								<td>Username</td>
	   								<td>Email</td>
	   								<td>Action</td>
	   							</tr>
	   						</thead>

	   						<!-- display DB record in table -->
	   						<?php 
	   						$data = $obj->show_data();
	   						foreach ($data as $value){
	   						?>
	   					<tbody>
	   						<tr>
	   							<td><?php echo $value['id']; ?></td>
	   							<td><?php echo $value['username']; ?></td>
	   							<td><?php echo $value['email']; ?></td>
	   							<td>
	   								<a href="index.php?editid=<?php echo $value['id']; ?>" class="btn btn-info">Edit</a>
	   								<a href="index.php?deleteid=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
	   							</td>
	   						</tr>
	   					</tbody>
	   					<?php
	   						}
	   					?>	   					
	   					</table>
   					</div>
   				</div>
   				</div>
   			</div>
   		</div>
   	</div> <!--row end--> 		
   </div>
   <!-- container form end -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>