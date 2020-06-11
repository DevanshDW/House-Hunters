
   		
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
	<title>Search Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	<?php include 'css/webd3201.css'; ?>
</style>
</head>
<body>
<div class="results">
<?php include "./header.php" ?>
<?php
  if($_SESSION["USER_TYPE"]==""){
    $_SESSION["logout"]="You are not logged in, therefore you cannot view search results!";
    header("location:index.php");
  }
?>
<div class="row">
	<div class="col-5 top">
		<div class="jumbotron">
		<h1>Search Listing Results</h1>
		<hr>
		<table dir="ltr" width="500" border="1" 
			summary="purpose/structure for search results output">
			<caption>Search Results
			</caption>
			<colgroup width="50%" />
			<colgroup id="colgroup" class="colgroup" align="center" 
					valign="middle" title="title" width="1*" 
					span="5" style="" />
			<thead>
				<tr>
					<th scope="col">Image</th>
					<th scope="col">Location</th>
					<th scope="col">Bedroom(s)</th>
					<th scope="col">Bathroom(s)</th>
					<th scope="col">Property Type</th>
					<th scope="col">Asking Price</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td><a href="./listing-display.php"><img src="./images/hardcodedhouse.jpg"></img></a></td>
					<td>Ajax</td>
					<td>4</td>
					<td>3</td>
					<td>Residential</td>
					<td>$420,000</td>
				</tr>
			</tfoot>
			<tbody>

			</tbody>
		</table>
		<!-- <form action="/action_page.php">
		  <div class="form-group">
		    <label for="email">Enter a listing:</label>
		    <input type="password" class="form-control" id="password">
		  </div>
		  <button type="submit" class="btn btn-primary">Search</button>
		</form> -->
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