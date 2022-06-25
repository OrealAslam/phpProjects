<?php 
define('TITLE', 'Work Order');
define('PAGE', 'work');
session_start();
include 'includes/header.php';
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}

	if (isset($_REQUEST['del'])) {
		$sql = " DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['del']}";
		include '../db_connection.php';
		if($conn->query($sql) == TRUE){
			echo "<meta http-equiv='refresh' content='0;URL=?deleted'/>";
		}
		else{
			echo "Unable to delete data";
		}
	}
?>
<!-- Start second column -->
<div class="col-md-9">
	<?php 
		$sql = "SELECT * FROM assignwork_tb ORDER BY request_id";
		include '../db_connection.php';
		$result = $conn->query($sql);
		if($result->num_rows !== 0){
			echo "<div class='table-responsive'>";
			echo "<table class='table'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th scope='col'>Req.ID</th>";
						echo "<th scope='col'>Req.Info</th>";
						echo "<th scope='col'>Name</th>";
						echo "<th scope='col'>Add1</th>";
						echo "<th scope='col'>City</th>";
						echo "<th scope='col'>Mobile</th>";
						echo "<th scope='col'>Technician</th>";
						echo "<th scope='col'>Date</th>";
						echo "<th scope='col'>Action</th>";
					echo "</tr>";
				echo "</thead>";

				echo "<tbody>";
					while ($row = $result->fetch_assoc()){
						echo "<tr>";
							echo "<td>".$row["request_id"]."</td>";
							echo "<td>".$row["requestinfo"]."</td>";
							echo "<td>".$row["reqName"]."</td>";
							echo "<td>".$row["requesteradd1"]."</td>";
							echo "<td>".$row["reqCity"]."</td>";
							echo "<td>".$row["requesterMobile"]."</td>";
							echo "<td>".$row["assigntech"]."</td>";
							echo "<td>".$row["date"]."</td>";
							echo "<td>";
								echo "<form method='POST' class='d-inline' action='viewassignwork.php'>";
								echo '<input type="hidden" name="id" value='.$row["request_id"].'><button type="submit" class="btn btn-warning d-inline" name="view"><i class="far fa-eye"></i></button>';
								echo "</form>";

								echo "<form method='POST' action=''>";
								echo '<input type="hidden" name="del" value='.$row["request_id"].'>';
								echo '<button type="submit" class="btn btn-secondary d-inline" name="delete"><i class="far fa-trash-alt"></i></button>';
								echo "</form>";
							echo "</td>";
						echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>";
			echo "</div>";			
		}
		else{
			echo "<div class='alert alert-info' role='alert'>No request Found!!</div>";
		}
	?>
</div> <!-- end second column -->



<?php 
include 'includes/footer.php';	
?>