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
                <a href="" class="navbar-brand">PHP + Ajax</a>
                <a href="<?php echo 'newMessage.php'; ?>" class="nav-link text-light">+ Message</a>
                <a href="" class="navbar-brand">Chats</a>
                <a href="<?php echo 'logout.php'; ?>" class="btn btn-dark">Logout</a>
            </nav>
        </div>
    </div>

    <!-- link jQuery  -->
<script src="js/jquery.js"></script>

<!-- Link custom jQuery file -->

<script src="js/script.js"></script>

</body>
</html>