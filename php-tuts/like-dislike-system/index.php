<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <!-- Font Awsome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- link Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Like Dislike Script in PHP Ajax</title>
  </head>
  <body>
    
    <div class="container">
<?php 
$conn = new mysqli('localhost', 'root', '', 'like-dislike-system');
if ($conn->error){
    die(). $conn->error;
}

$sql = "SELECT * FROM post";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
?>
        <h2>Like Dislike Script in PHP Ajax</h2>
        <div class="row main-box">
            <div class="col-md-8 col-sm-7">
                <?php echo $row['posts']; ?>
            </div>

            <div class="col-sm-2">
                <a href="javascript:void(0)" class="btn btn-info">
                    <span onclick="like_update(<?php echo $row['post_id']; ?>)"><i class="far fa-thumbs-up"></i> Like (<span id="like_loop_<?php echo $row['post_id']; ?>"><?php echo $row['like_count'] ?></span>)</span>
                </a>
            </div>

            <div class="col-sm-2">
                <a href="javascript:void(0)" class="btn btn-info">
                    <span onclick="dislike_update(<?php echo $row['post_id']; ?>)"><i class="far fa-thumbs-down"></i> Dislike (<span id="dislike_loop_<?php echo $row['post_id']; ?>"><?php echo $row['dislike_count']; ?></span>)</span>
                </a>
            </div>
        </div>
    <?php } ?>
    </div>



<!-- Include JS Files -->  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>




<script>
    function like_update(id){

        $.ajax({
            type: 'POST',
            url: 'update_count.php',
            data: 'type=like&id='+id,
            success: function(responce){
                var cur_count = $('#like_loop_'+id).html();
                cur_count++;
                $('#like_loop_'+id).html(cur_count);
            }
        });
    }

    function dislike_update(id){
        $.ajax({
            type: 'POST',
            url: 'update_count.php',
            data: 'type=dislike&id='+ id,
            success: function(responce){
                var cur_count = $("#dislike_loop_"+id).html();
                cur_count++;
                $("#dislike_loop_" + id).html(cur_count);
            }
        });
    }
</script>

  </body>
</html>