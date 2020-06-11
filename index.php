<?php include "./header.php" ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<div class="box">
	<div class="row">
		<div class="col-6">
			<?php 
				if($_SESSION['logout'] == '')
				{

				} else {
					echo $_SESSION['logout'];
					$_SESSION['logout']='';
				}
			?> 
			<div class="jumbotron">
			<h1 class="display-4">Welcome!</h1>
			<p class="lead">Join the most efficient, fastest growing and awesome <?php echo WEBSITE_NAME ?>!</p>
			<hr class="my-4">
			<p>Get started by browsing our premium listings that have been picked just for you!</p>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="./register.php" role="button">Register</a>
				<a class="btn btn-primary btn-lg" href="./login.php" role="button">Login</a>
			</p>
			</div>
		</div>
	</div>
<?php include "./footer.php" ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>