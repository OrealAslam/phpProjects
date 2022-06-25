<?php 
session_start();
echo "<h1 id='profile'>Profile Page</h1>";
echo "<div id='welcome'>Welcome!!"."<span id='user'>".$_SESSION["login"]["username"]."</span>"."</div>"."<br><br>";

?>
<!DOCTYPE html>
<html>
<head>
	<title>User's Info</title>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;300;500&family=Playfair+Display&display=swap" rel="stylesheet">
	<style type="text/css">
		#user{margin-left: 10px; color: #32669a; font-family: 'Playfair Display', serif; font-weight: bolder; text-shadow: 1px 0px 2px #4040bf;  font-size: 30px;}
		#profile{text-align: center; font-family:'Playfair Display', serif; background-color:  #0099e6; color: #e6e6e6; opacity: .7; height: 110px; line-height: 90px;}
		#welcome{color: black font-:'Playfair Display', serif; font-size: 28px; margin-left: 50px; color:  #6666ff; width: 230px; border: 1px solid #1a1aff; border-radius: 100px; padding:20px 28px 20px 20px; cursor: pointer;}
		table{border: none; font-family:'Playfair Display', serif; padding: 4px 10px; line-height: 70px; border-collapse: collapse; text-align: center;}
		
		th,td{padding: 1px 10px;}
		th{background-color:  #ff9999; outline: 1px solid white; border-radius: 5px; letter-spacing: 2px;}
		td{background-color:  #99b3e6; outline: 1px solid white; border-radius: 5px; }
		a{font-size: 27px; font-family: 'Playfair Display', serif; text-align: center; width: 150px; border-radius: 10px; padding: 5px 0px; line-height: 37px; text-decoration: none; letter-spacing: 1px; cursor: pointer; color:#0059b3; font-weight: bold; float: right; margin-right: 50px; background-color:#cccccc; color: #0059b3;}
		a:hover{background-color:#12bce4; transition: .6s; font-weight: bold; color: white; border-radius: 10px;}
		caption{font-family: 'Playfair Display', serif; font-size: 28px; text-decoration: underline; margin-bottom: 2px;}
	</style>
</head>
<body>
	<table border="1px solid black" >
		<caption><b>User's Info</b></caption>
		
		<th>Id</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Date of Birth</th>
		<th>Phone</th>
		<th>Gender</th>
		<tbody>
			<tr>

			<td><?php print $_SESSION['login']['id']; ?></td>

			<td><?php print $_SESSION['login']['username']; ?></td>

			<td><?php 
			$password = $_SESSION['login']['password'];


			echo $_SESSION['login']['password'];


			 ?></td>

			<td><?php print $_SESSION['login']['email']; ?></td>

			<td><?php print $_SESSION['login']['dob']; ?></td>

			<td><?php print $_SESSION['login']['phone']; ?></td>

			<td><?php print $_SESSION['login']['gender']; ?></td>

		</tr>
		</tbody>
		
	</table>
	<br><br><br>

	<a href="change_pass.php">Change password</a>|<a href="logout.php">Logout</a>
</body>
</html>