<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?error=nlogin");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link Bootstrap CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home Page</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-dark bg-dark w-100">
                <a href="" class="navbar-brand">Chat Application</a>
                
                <a href="<?php echo 'logout.php'; ?>" class="btn btn-dark">Logout</a>
            </nav>
        </div>

        <div class="row mt-md-4 mt-2 h-100">
            <!-- displaying user's message -->
            <div class="col-md-3 d-md-block d-none" id="users"></div>
            <!-- display messages -->
            <div class="col-sm-9 offset-md-0 offset-2 border border-primary">
               
            </div>
        </div>
    </div>

    <!-- link jQuery  -->
<script src="js/jquery.js"></script>

<!-- Link custom jQuery file -->

<script src="js/script.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    $.ajax({
        type: 'post',
        url: 'database.php?messages=*',
        success: function(responce){
            $("#users").html(responce);
        }
    });

    // highlight button

    $(".profBtn").click(function(){       
        $(".profBtn").css("background-color", "red");
        $(".profBtn").css("color", "white");
    });

});
</script>

</body>
</html>

