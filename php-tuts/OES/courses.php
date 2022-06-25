<?php 
include 'mainheader.php'; 
require 'connection.php';
?>

<div class="container">
	<h2 class="text-center mt-3">All Courses</h2>
	<div class="row row-cols-3">
		<?php
			$sql = "SELECT * FROM course_details";
			$result = $conn->query($sql);
			if ($result->num_rows >0){
				while ($data = $result->fetch_assoc()){
		?>
	<div class="col-md-4 my-3">
			<div class="card" style="width: 18rem;">
			  <img src="<?php echo 'admin/'.$data['avatar_source']; ?>" class="card-img-top" alt="graphics" style="width: 100%; height: 200px;">
			  <div class="card-header">
			  		<h4 class="w-100"><?php echo $data['c_name']; ?></h4>
			  	</div>
			  <div class="card-body">
			   <div class="card-title">Reviews</div>
			   <i class="fas fa-star text-warning"></i>
			   <i class="fas fa-star text-warning"></i>
			   <i class="fas fa-star text-warning"></i>
			   <i class="fas fa-star text-warning"></i>
			  </div>

			<div class="card-footer">			
				<button class="btn btn-primary"><i class="far fa-thumbs-up mr-2"></i>253</button>

				<button  class="btn btn-danger"><i class="far fa-thumbs-down mr-2"></i>253</button>
				
			</div>
			</div>
		</div>
<?php		
	}
}
?>
	</div>
</div>








<?php include 'mainfooter.php'; ?> 








