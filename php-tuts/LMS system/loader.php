<?php 
if (isset($_SESSION['login']['email'])){
?>	
<!DOCTYPE html>
<html>
<head>
	<title>...</title>
	<style type="text/css">
		#container{padding: 0px; margin: 0px;}
		.loader{
			width: 200px;
			height: 200px;
			position: relative;
			margin: 200px 590px;
			border-radius: 50%;
			border: 10px solid #cccccc;
			border-bottom: 10px dashed #33adff;
			animation-name: loading;
			animation-iteration-count: 4;
			animation-timing-function: linear;
			animation-duration: 1.5s;
			
		}
		@keyframes loading{
			0%{
				transform: rotate(0deg);
			}
			100%{
				transform: rotate(360deg);
			}
		}
	</style>
</head>
<body>
	<?php
		if (isset($_SESSION['logged']['email'])){
			header("Location: upload_image.php");
		}
	?>
	<div id="container">
		<div class="loader"></div>
	</div>
	<?php
	else{
		header("Location: login.php");
	}
?>
</body>
</html>
