<?php 

$str = "Oreal Aslam";

for ($i=0; $i <strlen($str); $i++) { 
	$count = 1;
	for ($j=$i+1; $j <strlen($str); $j++) { 
		
		if ($str[$i] == $str[$j] && $str[$i] != " "){
			$count++;
			echo $str[$i] . " <br> ";
			//Set $string[$j] to 0 to avoid printing visited character  

			$str[$j] = 0;
		}
	}	

}

echo str_word_count('Oreal Aslam Chohan ');
?>