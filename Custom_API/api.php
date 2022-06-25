<?php
require_once 'config.php';
$JSONencode = [];
$sql = "SELECT * FROM users";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
    while($data = mysqli_fetch_assoc($res)){
        $JSONencode[] = $data;
    }
}

echo json_encode($JSONencode);

?>