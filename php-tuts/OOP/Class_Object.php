<?php 

class Bike{

	private $name;
	private $color;
	private $model;
	private $company;

	protected function __construct(){
		$this->name    = "";
		$this->color   = "";
		$this->model   = "";
		$this->company = "";
	}
}


class Honda extends Bike{
	public $cc = "";
	
	public function __construct(){
		parent::__construct();
	}
	//setting up the parent class values

	public function get_input($arg){
		// check empty fields
		
			if(($arg['name'] == "") || ($arg['color'] == "") || ($arg['company'] == "") || ($arg['model'] =="") || ($arg['cc'] =="")){
				echo"<div class='alert alert-warning text-capitalize'>all fields required<div>";
			}
			else{
				if($arg['company'] !== __CLASS__){
					die("<div class='alert alert-danger text-capitalize'>its not proper object<div>");
				} 
				$this->name 	= $arg['name']; 
				$this->color 	= $arg['color']; 
				$this->model 	= $arg['model']; 
				$this->company  = $arg['company'];
				
				$this->cc = $arg['cc'];
			}
			return $arg;		
	}
}

if (isset($_POST['submit'])){
	$bike = new Honda();
	$result = $bike->get_input($_POST);
}

?>


<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- font awsome added -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Bike Class</title>
</head>
<body>


	<!-- input form start -->
	<div class="container py-4">
		<h3 class="text-center text-capitalize">enter bike details</h3>
		<div class="row">
			<div class="col-md-3 shadow-lg text-success text-bolder">
				<form method="POST" class="py-4" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="form-group mb-2">
						<label for="name" class="mb-2">Bike Name</label>
						<input type="text" class="form-control" name="name" placeholder="bike name" id="name">
					</div>

					<div class="form-group mb-2">
						<label for="color" class="mb-2">Color</label>
						<input type="text" class="form-control" name="color" placeholder="Color" id="color">
					</div>

					<div class="form-group mb-2">
						<label for="model" class="mb-2">Model</label>
						<input type="text" class="form-control" name="model" placeholder="Model" id="model">
					</div>

					<div class="form-group mb-2">
						<label for="comp" class="mb-2">Manufaturar</label>
						<input type="text" class="form-control" name="company" placeholder="Company" id="comp">
					</div>

					<div class="form-group mb-2">
						<label for="cc" class="mb-2">Cc</label>
						<input type="text" class="form-control" name="cc" placeholder="Cc" id="cc">
					</div>

						<input type="submit" class="btn btn-outline-success" name="submit" value="Details">
				</form>

			</div>

			<!-- 2nd column start -->

			<div class="col-md-8 ">
				<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>Sr#</th>
								<th>Name</th>
								<th>Model</th>
								<th>Color</th>
								<th>Company</th>
								<th>Cc</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td><?php?></td>
								<td><?php if(isset($result['name'])){echo $result['name'];} ?></td>
								<td><?php if(isset($result['model'])){echo $result['model'];} ?></td>
								<td><?php if(isset($result['color'])){echo $result['color'];} ?></td>
								<td><?php if(isset($result['company'])){echo $result['company'];} ?></td>
								<td><?php if(isset($result['cc'])){echo $result['cc'];} ?></td>
							</tr>
						</tbody>
					</table>
			</div>
			<!-- 2nd column end -->
		</div>
	</div>


</body>
</html>