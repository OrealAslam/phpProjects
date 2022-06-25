<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Custom Like/Dislike</title>
</head>
<body>

	<div class="container p-3">
		<h4 class="text-center mb-3">Custom Like/Dislike System</h4>
		<div class="row">
			<div class="card mb-4 border-0 post" id="1">
				<div class="card-header bg-danger text-light">
					Post 1
				</div>
				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
				</div>
				<div class="card-footer">

					<button class="btn btn-danger like-btn">Like <span class="unlike">0</span></button>

					<button class="btn btn-primary dislike-btn">Dislike <span class="undislike">0</span></button>
				</div>
			</div>

			<<!-- div class="card mb-4 border-0" id="2">
				<div class="card-header bg-danger text-light">
					Post 2
				</div>
				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
				</div>
				<div class="card-footer">
					<button class="btn btn-danger like-btn">Like <span class="unlike">0</span></button>
					<button class="btn btn-primary dislike-btn">Dislike <span class="undislike">0</span></button>
				</div>
			</div> -->

			<!-- <div class="card mb-4">
				<div class="card-header bg-danger text-light">
					Post 3
				</div>
				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Like (0)</button>
					<button class="btn btn-primary">Dislike (0)</button>
				</div>
			</div>

			<div class="card mb-4">
				<div class="card-header bg-danger text-light">
					Post 4
				</div>
				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Like (0)</button>
					<button class="btn btn-primary">Dislike (0)</button>
				</div>
			</div> -->
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- custon script -->

	<script src="js/script.js">
		// var nextBtnRef = $(this).next('button.dislike-btn');
	</script>
</body>
</html>