	<!DOCTYPE html>
<html>
<head>
	<title>Upload Media</title>
	<meta charset="utf-8">
	<style type="text/css">
		#wrapper{position: relative; width: 690px; height: 500px; background-color: skyblue; margin-left: auto; margin-right: auto;}
		#form{position: absolute; width: 400px; height: 300px;}
		input[type="file"]{margin-left: 150px; margin-top: 100px; width: 350px; border-radius: 10px; outline: none; border:none; font-variant: small-caps; font-size: 18px;}
		input[type="submit"]{margin-left: 150px; margin-top: 50px; width: 200px; border-radius: 12px; outline: none; border: none; font-variant: small-caps; font-size: 18px;}
		input[type="submit"]:hover{width: 250px; transition: 1.5s; background-color: red; color: white; font-size: 20px; font-family: sans-serif; font-weight: bolder; cursor: pointer;}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="form">
			<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
				<input type="file" name="myfile" multiple><br>
				<input type="submit" name="upload_media" value="Upload">
			</form>
			
		</div>
	</div>


</body>
</html>

<?php 
//Array ( [myfile] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) )
if (isset($_POST['upload_media'])) {

	$file_name = $_FILES["myfile"]["name"];
	$file_type = $_FILES["myfile"]["type"];
	$file_size = $_FILES["myfile"]["size"];
	$temp_dir  = $_FILES["myfile"]["tmp_name"];
	$upload_folder = "upload/". $file_name;
	$ext     = pathinfo($file_name, PATHINFO_EXTENSION);

	if($file_size <='3MB'){

	if($ext == 'mp4' OR $ext == 'webm'){

		$upload = move_uploaded_file($temp_dir, $upload_folder);

		if ($upload){

			$connection = mysqli_connect("localhost", "root", "", "file_upload");
			if (mysqli_connect_errno()) {
				mysqli_close($connection);
				die(mysqli_connect_error());
			}

			$sql = "INSERT INTO `upload_media`(`file_name`, `file_source`) VALUES(?,?)";
			$stmt = mysqli_prepare($connection, $sql);
			if ($stmt){

				mysqli_stmt_bind_param($stmt, 'ss', $file_name, $upload_folder);
				$execute = mysqli_stmt_execute($stmt);
				if ($execute){
					mysqli_stmt_close($stmt);
					mysqli_close($connection);
					echo "File uploaded successfully";
				}
				else{

				}				
			}
			else{
				echo "unable to prepare statement obj";
			}

		}
		else{
			if (file_exists($upload_folder)){
				unlink($upload_folder);
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				echo "unale to upload file in folder";
			}
		}
	}
	else{
		echo "Format not supported";
	}
	}
}

?>