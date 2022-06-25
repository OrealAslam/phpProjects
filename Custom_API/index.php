<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Practise API</title>
</head>
<body>

    <div id="responce">

    </div>

   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            type: 'post',
            url: 'api.php',
            success: function(responce){
                const obj = JSON.parse(responce);
                array = new Array(obj);
                console.log(obj);
                console.log(array);

                document.getElementById('responce').innerHTML = array[0][0]['name']
            }
        });
    });

   
</script>
</body>
</html>