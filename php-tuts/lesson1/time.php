<?php 

echo "<h4>This is date function of php</h4>";
print date('d-M-Y') . "<br><br>";

echo "<h3>Now we display time in php</h3>";
echo "Current time is " . date('h:i:sa')."<br>";
date_default_timezone_set('Asia/Karachi');
echo "Current Date & Time is :" . date('h:i a') . "<br>";

?>