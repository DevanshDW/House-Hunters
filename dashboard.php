
   		
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
	<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	<?php include 'css/webd3201.css'; ?>
</style>
</head>
<body>
<div class="dashboard">
<?php include "./header.php" ?>
<?php
  if($_SESSION["USER_TYPE"]!="a"){
    $_SESSION["logout"]="You are not an agent, therefore you cannot view the dashboard!";
    header("location:index.php");
  }
?>
<div class="row">
	<div class="col-5 top">
		<div class="jumbotron">
		<h1 class="display-4">Welcome back <?php echo $_COOKIE["USER_ID"]; ?></h1>
		  <hr>
		  <p class="lead">You have not logged in since: <?php echo $_COOKIE["LAST_ACCESS"];?></p>
		  <br>
		  <p class="lead">By the way, are you still using this email?: <?php echo $_COOKIE["EMAIL_ADDRESS"];?></p>
		  <br>
		  <p class="lead">Wow, you're a veteran!  You've been a member since: <?php echo $_COOKIE["ENROL_DATE"];?></p>
		  
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