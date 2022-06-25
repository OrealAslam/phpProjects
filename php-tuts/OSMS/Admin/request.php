<?php 
define('TITLE', 'Requests');
define('PAGE', 'request');
session_start();
include 'includes/header.php';
	if(isset($_SESSION['aLogin'])){
		include 'card.php';
?>


<!-- here we select data from DB and place it into the form in Col->3 -->
<?php 
if(isset($_REQUEST['view'])){
	
		$sql = "SELECT * FROM submitrequest_tb WHERE `request_id` ={$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo '<meta http-equi="refresh" content= "0;URL=?closed" />';
}

// now deleting the requests -->

if (isset($_REQUEST['delete'])){
		 $sql = "DELETE FROM submitrequest_tb WHERE request_id ={$_REQUEST['id']}";
		 $result = $conn->query($sql);
		 if($result == TRUE){
		 	echo 'deleted successfully';
			echo '<meta http-equi="refresh" content= "0;URL=?closed" />';
		}
		// else{echo "unable to delete request";}
}
 
	if (isset($_REQUEST['assign'])){
		if (($_REQUEST['request_id']=="")||($_REQUEST['requestinfo']=="")||($_REQUEST['requestdesc']=="")||($_REQUEST['reqName']=="")||($_REQUEST['requesteradd1']=="")||($_REQUEST['requesteradd2']=="")||($_REQUEST['reqCity']=="")||($_REQUEST['reqState']=="")||($_REQUEST['requesterzip']=="")||($_REQUEST['requesterEmail']=="")||($_REQUEST['requesterMobile']=="")||($_REQUEST['assigntech']=="")||($_REQUEST['inputDate']=="")){
			$regmsg = "<div class='alert alert-danger mt-2' role='alert'>All Fields Required";
		}
		else{
			$reqid = $_REQUEST['request_id'];
			$reqinfo = $_REQUEST['requestinfo'];
			$reqdesc = $_REQUEST['requestdesc'];
			$reqname = $_REQUEST['reqName'];
			$reqadd1 = $_REQUEST['requesteradd1'];
			$reqadd2 = $_REQUEST['requesteradd2'];
			$reqcity = $_REQUEST['reqCity'];
			$reqstate = $_REQUEST['reqState'];
			$reqzip = $_REQUEST['requesterzip'];
			$reqemail = $_REQUEST['requesterEmail'];
			$reqmobile = $_REQUEST['requesterMobile'];
			$atech = $_REQUEST['assigntech'];
			$date = $_REQUEST['inputDate'];

			$sql = "INSERT INTO `assignwork_tb`(`request_id`, `requestinfo`, `requestdesc`, `reqName`, `requesteradd1`, `requesteradd2`, `reqCity`, `reqState`, `requesterzip`, `requesterEmail`, `requesterMobile`, `assigntech`, `date`) VALUES ('".$reqid."','".$reqinfo."','".$reqdesc."','".$reqname."','".$reqadd1."','".$reqadd2."','".$reqcity."','".$reqstate."','".$reqzip."','".$reqemail."','".$reqmobile."','".$atech."','".$date."')";
			$result = $conn->query($sql);
			if ($result == true){
				$regmsg = "<div class='alert alert-success col-sm-6' role='alert'>Work Assigned successfully</div>";
			}
			else{
				$regmsg = "<div class='alert alert-danger col-sm-6' role='alert'>something went wrong while assigning work</div>";
			}
		}	
	}

?>


<?php 
include 'assignedworkform.php';
include 'includes/footer.php';
	}
	else{
		echo "<script>location.href='adminlogin.php'</script>";
	}
 ?>

 