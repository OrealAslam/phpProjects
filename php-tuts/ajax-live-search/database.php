<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php");
}

require_once 'config.php';

// search user for message

if(isset($_POST['data'])){

    
    $search = mysqli_real_escape_string($conn, $_POST['data']);

    $sql = "SELECT id, username FROM users join requests on users. id = requests. request_from  WHERE  LIKE '%$search%' AND id !=". $_SESSION['id'];

    $stmt = mysqli_query($conn, $sql);
    if (mysqli_num_rows($stmt) > 0){
        
        echo '<div class="row">';
        echo '<div class="col-md-3 offset-md-5 shadow shadow-sm">';
        echo '<table class="table table-responsive table-stripped table-hover">';
        echo '<tbody>';
        
        while ($data = mysqli_fetch_assoc($stmt)){
            
            echo '<tr>';
            echo '<td>'.$data['username'].'</td>';
            echo '<td>';
            echo '<form id="searchRes">';
            echo '<input type="hidden" id="hiddenID" value="'.$data["id"].'">';
            echo '<button type="button" id="sendRequest" class="btn btn-success">Send Request</button>';
            echo '</form>';
            echo '</td>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';

    }
    else{
        echo "<p class='text-danger'>No user found!!</p>";
    }    
}

// Add request to DB Table

if (isset($_POST['id'])){
     
     $id = mysqli_real_escape_string($conn, $_POST['id']);
     $status = 0;
     if(filter_var($id, FILTER_VALIDATE_INT)){

        $sql = "INSERT INTO requests (request_from, request_to, status) VALUES (?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt){
            mysqli_stmt_bind_param($stmt, 'iii', $_SESSION['id'], $id, $status);

            if(mysqli_stmt_execute($stmt)){echo "Pending";}
            else{echo "Not send!";}
        }else{echo "Unable";}
     }
     else{echo "Invalid Id";}
} 

function display(){
   $conn = $GLOBALS['conn'];
    if(isset($_GET['messages']) and $_GET['messages'] == '*'){
        
        $sql = "SELECT id, username FROM users";
        $result = mysqli_query($conn, $sql);

        while($data = mysqli_fetch_assoc($result)){
            echo '<button class="btn btn-default w-100 profBtn" type="button" id="'.$data["id"].'">';
                echo $data["username"];
            echo '</button>';
        }
    }
}
display();
?>