<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Create Listing</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	<?php include 'css/webd3201.css'; ?>
</style>
</head>
<body>
<div class="create">
<?php include "./header.php" ?>
<?php
  if(($_SESSION["USER_TYPE"]!="a") || ($_SESSION["USER_TYPE"]!="s")){
    $_SESSION["logout"]="You are not an agent or admin, therefore you cannot create a listing!";
    header("location:index.php");
  }
?>
<div class="row">
	<div class="col-5 top">
		<form action="/action_page.php">
		<div class="jumbotron">
		<h1>Create Listing</h1>
		<hr>
		  <div class="form-group">
		    <label for="email">Select image to upload:</label>
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
		  </div>
		  <div class="form-group">
		  	<label for="location">Location (City):</label>
		    <select name="location">
    				<option value="ajax">Ajax</option>
    				<option value="whitby">Whitby</option>
    				<option value="oshawa">Oshawa</option>
    				<option value="pickering">Pickering</option>
  			</select>
  			<br>
		  </div>
		  <div class="form-group">
		  	<label for="email">Bathroom(s):</label>
		    <select name="bathrooms">
    				<option value="1bath">1</option>
    				<option value="2bath">2</option>
    				<option value="3bath">3</option>
    				<option value="4bath">4</option>
            		<option value="lotsbath">5+</option>
  			</select>
  			<br>
  			<label for="email">Bedroom(s):</label>
  			<select name="bedrooms">
    				<option value="1bed">1</option>
    				<option value="2bed">2</option>
    				<option value="3bed">3</option>
    				<option value="4bed">4</option>
            		<option value="lotsbed">5+</option>
  			</select>
  			<br>
  			<label for="email">Property Type:</label>
  			<select name="propertyType">
    				<option value="residential">Residential</option>
    				<option value="condo">Condo</option>
    				<option value="farm">Farm</option>
    				<option value="land">Land</option>
            		<option value="multifamily">Multifamily</option>
            		<option value="commercial">Commercial</option>
  			</select>
  			<div class="form-group">
		  		<label for="location">Asking Price: (Format: $000,000.00)</label><input type="text" class="form-control" id="askingPrice">
		    </div>
		  </div>
		</div>
		</form>
	</div>
</div>
<?php include "./footer.php" ?>
</div>p
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>