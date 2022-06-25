<?php 
echo "Set Cookie via PHP and display it using jQuery Library";

// setcookie('PHP Cookie', 'set cookie via PHP and retrieve it using jQuery Cookie Library', time()+60);
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- js-cookie plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>


<script>
	
	$(document).ready(function(){
       alert($cookie('user'));
    });

</script>