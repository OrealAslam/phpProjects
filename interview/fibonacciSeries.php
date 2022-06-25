<?php 
	$arr = [];
	$start = 0;

	print '<form method="POST" action="">';
				
	while ($start < 6){
		
		echo '
			<input type="number" name='.$start.' placeholder="Enter Value (Integer)">
		'.'<br><br>';
		$start++;
	}
	print '<button type="submit" name="include">Include</button>';
	print '</form>';


	if(isset($_POST['include'])){
		
		for($i=0; $i<6; $i++){ 
			$arr = $arr[$i] = $_POST[$i];
			
			echo $i ."=>" .$_POST[$i] ."<br>";	
			
			
		}
	}
?>