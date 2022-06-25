<?php 	
// date_default_timezone('Asia/Karachi');

$start_date = new DateTime();
echo "<pre>";
print_r($start_date);
die();
$since_start = $start_date->diff(new DateTime('7:58'));
echo $since_start->days.' days total<br>';
echo $since_start->y.' years<br>';
echo $since_start->m.' months<br>';
echo $since_start->d.' days<br>';
echo $since_start->h.' hours<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';

?>