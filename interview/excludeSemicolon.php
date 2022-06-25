<form method="POST" action="">
	<input type="text" name="input" placeholder="enter string">
	<button type="submit" name="submit">Find Length</button>
</form>
<?php 

// if (isset($_POST['submit']) && isset($_POST['input'])){
	
// 	echo "String Length is : " . StrLength($_POST['input']) . "<br><br> Reverse of a string is : "; stringReverse( $_POST['input'] );
	
	
// }

// FUNCTION THAT RETURN STRING LENGTH

function StrLength( $str ){
	$input = $str;
	$i = 0;

	while (isset($input[$i])){
		
		$i++;
	}
	return $i;
}

// FUNCTION TO REVERSE A STRING
function stringReverse( $str ){
	$len = StrLength($str) - 1;
	while ($len >= 0){
		echo $str[$len];
		$len--;
	}
}

// FUNTION TO CONVERT STRING TO UPPERCASE

function upperCase( $str ){
	$length = StrLength( $str );
	$a = 0;
	while ($a <= $length-1){

		switch ($str[$a]){
			case 'a':
				echo 'A';
				break;
			case 'b':
				echo 'B';
				break;
				case 'c':
				echo 'C';
				break;
				case 'd':
				echo 'D';
				break;
				case 'e':
				echo 'E';
				break;
				case 'f':
				echo 'F';
				break;
				case 'g':
				echo 'G';
				break;
				case 'h':
				echo 'H';
				break;
				case 'i':
				echo 'I';
				break;
				case 'j':
				echo 'J';
				break;
				case 'k':
				echo 'K';
				break;
				case 'l':
				echo 'L';
				break;
				case 'm':
				echo 'M';
				break;
				case 'n':
				echo 'N';
				break;
				case 'o':
				echo 'O';
				break;
				case 'p':
				echo 'P';
				break;
				case 'q':
				echo 'Q';
				break;
				case 'r':
				echo 'R';
				break;
				case 's':
				echo 'S';
				break;
				case 't':
				echo 'T';
				break;
				case 'u':
				echo 'U';
				break;
				case 'v':
				echo 'V';
				break;
				case 'w':
				echo 'W';
				break;
				case 'x':
				echo 'X';
				break;
				case 'y':
				echo 'Y';
				break;
				case 'z':
				echo 'Z';
				break;
			default:
				echo " &nbsp;" ;
				break;
		}
		$a++;
	}
	return $str;
}

upperCase( $_POST['input'] );



?>