<!DOCTYPE html>
<html>
<head>
	<title>File uploads</title>
	<style type="text/css">
		
		#error, #success{text-align: center; margin-top: 50px; font-size: 26px; font-family: sans-serif;}
		#error{color: red; transition:.7s}
		#success{color: green; transition: .7s}
		button{border-radius: 10px; padding: 10px 10px; display: block; border: none;}
		button:hover{background-color:#ffaee2; border: none; }
		
		#photo{display: inline-block; float: left; margin: 50px 50px;}
		#photo > a{text-decoration: none; font-family: sans-serif;}
		#photo > a:hover{cursor: pointer; border-radius:20px; background-color: #483FF6; color: #ffff;}
		

	</style>
</head>
<body>
	<form method="POST" action="signup_db.php" enctype="multipart/form-data" >

		<fieldset>
			<legend>Upload file</legend>
			<input type="file" name="myfile" multiple="multiple" required>
		</fieldset><br>
		
	
	<button type="submit" name="btn">File Upload</button>
</form>

	<div id="error">
		<?php 
			if (isset($_GET['error'])) {
				echo $_GET['error'];
			}
		 ?>

		 <div id="success">
		<?php 
			if (isset($_GET['success'])) {
				echo $_GET['success'];
			}

		?>
		</div>

		<div id="image-wrapper">
			<?php 
				$connection = mysqli_connect("localhost", "root", "", "file_upload");
				$sql    = "SELECT * FROM `uploading`";
				$result = mysqli_query($connection, $sql);

				if (mysqli_num_rows($result)>0){
						while ($data = mysqli_fetch_assoc($result)) {
							echo "<div id='photo'>";
							echo "<img src='".$data["file_source"]."' alt='".$data["file_name"]."' width='200' height='200'>";
							echo "<a href='imgdownload.php?download=".$data["file_name"]."'><br>";
							echo "Download</a>";
							//echo "</a>";
							echo "</div>";

						}
				}
		?>
		</div>	

	
	
</body>
</html>