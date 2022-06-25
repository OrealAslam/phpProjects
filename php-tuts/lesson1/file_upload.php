<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<fieldset>
			<legend>File Upload</legend>
			<input type="file" name="myfile" multiple>
			<button type="submit" name="proceed">Upload</button>

		</fieldset>	 
		
	</form>

</body>
</html>