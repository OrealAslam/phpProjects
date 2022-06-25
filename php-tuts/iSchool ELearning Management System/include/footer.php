<!-- Popup model start for admin login -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="aLoginModel" tabindex="-1" aria-labelledby="aLoginModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aLoginModel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="far fa-window-close"></i></button>
      </div>
      <div class="modal-body">
      	<!-- form code start -->
        <div class="form">
        	<form method="POST" action="#">

        		<div class="form-group">
        			<label for="aemail"><i class="fas fa-envelope pr-1"></i>Email address</label>
        			<input type="email" class="form-control" name="aemail" id="aemail" placeholder="Email">
        		</div>

        		<div class="form-group">
        			<label for="apass"><i class="fas fa-key pr-1"></i>Password</label>
        			<input type="password" class="form-control" name="apassword" id="apass" placeholder="Password">
        		</div>
        </div>
      	<!-- form code end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="signup" class="btn btn-primary">Login</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Popup model end for admin login-->

<!-- Start Footer -->
<div class="container-fluid bg-dark text-center p-2">
	<small class="text-white">Copyright &copy; 2019 || Designed By E-Learning ||<a href="#" class="text-white ml-2"  data-toggle="modal" data-target="#aLoginModel">Admin Login</a></small>
</div>


<!-- link JQuery and Bootstrap Js -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Link Font Awosome -->
<script src="js/all.min.js"></script>
</body>
</html>