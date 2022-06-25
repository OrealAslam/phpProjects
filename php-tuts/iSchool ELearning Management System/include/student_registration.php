<!-- student signup code start -->
<?php 
  if (isset($_REQUEST['stu_signup'])){

    if (($_REQUEST['stuname'] == "") || ($_REQUEST['stuemail'] == "") || ($_REQUEST['stupass'] == "")){
        echo "<div class='alert alert-warning text-capitalize' role='alert'>all fields required</div>";
    }
    else{
        $stuname = $_REQUEST['stuname'];
        $stuemail = $_REQUEST['stuemail'];
        $stupass = $_REQUEST['stupass'];

        include'db_connection.php';

        $sql = "INSERT INTO stu_reg (stu_name, stu_email, stu_password) VALUES ('$stuname', '$stuemail', '$stupass')";
        $result = $conn->query($sql);
        if ($result == TRUE){
            echo "<div class='alert alert-success text-capitalize' role='alert'>registered successfully</div>";
        }
        else{
            echo "<div class='alert alert-info text-capitalize' role='alert'>email already exists</div>";
        }
  }
}
?>
<!-- student signup code end -->

<!-- Popup model start for registration-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="stuRegModel" tabindex="-1" aria-labelledby="stuRegModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="far fa-window-close"></i></button>
      </div>
      <div class="modal-body">
      	<!-- form code start -->
        <div class="form">
        	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        		<div class="form-group">
        			<label for="name"><i class="fas fa-user pr-1"></i>Name</label>
        			<input type="text" class="form-control" name="stuname" id="name" placeholder="Name">
        		</div>

        		<div class="form-group">
        			<label for="email"><i class="fas fa-envelope pr-1"></i>Email address</label>
        			<input type="email" class="form-control" name="stuemail" id="email" placeholder="Email">
        			<small class="form-text">We'll never share your email with anyone else</small>
        		</div>

        		<div class="form-group">
        			<label for="pass"><i class="fas fa-key pr-1"></i>Password</label>
        			<input type="password" class="form-control" name="stupass" id="pass" placeholder="Password">
        		</div>
        </div>
      	<!-- form code end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="stu_signup" class="btn btn-primary" value="Sign Up">
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Popup model end for registration-->