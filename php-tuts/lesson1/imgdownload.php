
<?php 

if(isset($_GET['download']) && $_GET['download'] != ""){


	
	$filepath = $_GET['download'];

	header('Content-type: application/force-download');
	header('Content-disposition: attachment; filename="'.basename( $filepath ).'"' );
	header('Content-length:'.filesize( $filepath ) );
	readfile( $filepath );


	// Define headers:
/*
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=$fileName");
	header("Content-Type: application/zip");
	header("Content-Transfer-Encoding: binary");

	 // Read File

	readfile($filepath);
	exit();
*/	

}
else{
	header("Location: signup_form.php?error= Error: while downloading the file");
}
 

?>
