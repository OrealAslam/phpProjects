<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Site</title>
  </head>
  <body>
    
    <div class="container my-4">
       <h3 class="text-center text-info">Showing User Responce</h3>
      <div class="row justify-content-center">
        <form method="POST" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" id="email" class="form-control shadow shadow-sm" placeholder="Enter email">
            <small class="form-text text-danger">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" id="password" class="form-control shadow shadow-sm" placeholder="enter Password">
          </div>
          
          <button type="submit" name="submit" onclick="responce()" class="btn btn-danger">Submit</button>
        </form>
      </div>
    </div>


    <!-- Link jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Link Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript"> // javasript code syntax 
  function responce(){
    var email = $("#email").val();
    var password = $("#password").val();
    alert(email + 'n' + password);
  }
</script>
    
  </body>
</html>
