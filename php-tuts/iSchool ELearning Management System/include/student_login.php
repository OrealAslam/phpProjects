<!-- PHP code for student Login start -->
<?php 
if (isset($_REQUEST['stu_login'])){
    if (($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
      echo "<div class='alert alert-warning text-capitalize' role='alert'>all fields required</div>";
    }
    else{
      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];

      $sql = "SELECT * FROM stu_reg WHERE stu_email = {$email}";
      $result = $conn->query($sql);
      if ($result->num_rows == 1){
       
        echo "<div class='alert alert-success text-capitalize' role='alert'>login successfully</div>";
      }
      else{
        echo "<div class='alert alert-danger text-capitalize' role='alert'>invalid credentials</div>";
      }
    }
}

?>
<!-- PHP code for student Login -->


<!-- Popup model start for student login -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="stuLoginModel" tabindex="-1" aria-labelledby="stuLoginModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModel">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="far fa-window-close"></i></button>
      </div>
      <div class="modal-body">
      	<!-- form code start -->
        <div class="form">
        	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        		<div class="form-group">
        			<label for="email"><i class="fas fa-envelope pr-1"></i>Email address</label>
        			<input type="email" class="form-control" name="email" id="email" placeholder="Email">
        		</div>

        		<div class="form-group">
        			<label for="pass"><i class="fas fa-key pr-1"></i>Password</label>
        			<input type="password" class="form-control" name="password" id="pass" placeholder="Password">
        		</div>
        </div>
      	<!-- form code end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="stu_login" class="btn btn-primary" value="Login">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Popup model end for student login-->