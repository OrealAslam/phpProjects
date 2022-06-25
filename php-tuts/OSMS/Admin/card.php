<?php 
if(!isset($_SESSION['aLogin'])){
	echo "<script>location.href='adminlogin.php'</script>";
}
else{
?>

<!-- here we select data from DB and place it into the form in Col->3 -->

<div class="col-sm-6 col-md-6 col-lg-4"> <!--Second column start-->
	<!-- Here we retrieve submitted request info from DB and place them orderly in cards -->
	<?php 
	include '../db_connection.php';
		$sql = "SELECT * FROM `submitrequest_tb` ORDER BY request_id";
		$result = $conn->query($sql);
		if ($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				echo "<div class='card card-lg mb-3'>";
					echo "<div class='card-header bg-light'>";
						echo "Request ID : ".$row['request_id'];
					echo "</div>";
					echo "<div class='card-body'>";
						echo "<h6 class='card-title'>Request Info : ".$row['requestinfo']."</h6>";
						echo "<p class='card-text'>".$row['requestdesc']."</p>";
						echo "<p class='card-text font-weight-bold'>Date :"." ".$row['date']."</p>";
						echo "<form action='' method='POST'>";
							echo "<div class='float-right ml-3'>";
								echo "<input type='hidden' name='id' value='{$row['request_id']}'>";
								echo "<input type='submit' class='btn btn-danger mr-3' value='View' name='view'>";
								echo "<input type='submit' class='btn btn-secondary' value='Close' name='delete'>";
							echo "</div>";
						echo "</form>";
					echo "</div>";
				echo "</div>";
			}
		}
	?>
</div> <!--Second column end-->
<?php 
}
?>