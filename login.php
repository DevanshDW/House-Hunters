<?php
    include("./header.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php
//empty out error and result regardless of method that got you here
$error = "";
$output = "";
$type = "";
$user_id = "";
$email_address = "";
$enrol_date = "";
$last_access = "";
if($_SERVER["REQUEST_METHOD"] == "GET"){
	$email = "";
	$pass = "";
	$type = "";
	$user_id = "";
	$email_address = "";
	$enrol_date = "";
	$last_access = "";
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
	$email = trim($_POST["inputted_email"]);
	$pass = trim($_POST["inputted_pass"]);
	$conn = db_connect();
		$sql = "SELECT user_id, password, user_type, email_address, enrol_date, last_access FROM
		users WHERE email_address = '".$email."' AND password= '".md5($pass)."'";
		$results = pg_query($conn, $sql);
	if(pg_num_rows($results)){ //not zero means something was found
		//Going through the user types to redirect or welcome them by their proper status.
		$type .= pg_fetch_result($results, 0, "user_type");
		$user_id .= pg_fetch_result($results, 0, "user_id");
		$email_address .= pg_fetch_result($results, 0, "email_address");
		$enrol_date .= pg_fetch_result($results, 0, "enrol_date");
		$last_access .= pg_fetch_result($results, 0, "last_access");
		$_SESSION["USER_TYPE"]=$type;
		$_SESSION["USER_ID"]=$user_id;
		setcookie("USER_TYPE", $type, COOKIE_LIFESPAN);
		setcookie("USER_ID", $user_id, COOKIE_LIFESPAN);
		setcookie("EMAIL_ADDRESS", $email_address, COOKIE_LIFESPAN);
		setcookie("ENROL_DATE", $enrol_date, COOKIE_LIFESPAN);
		setcookie("LAST_ACCESS", $last_access, COOKIE_LIFESPAN);
		if ($type == CLIENT){
			// ob_flush();
			header('Location: welcome-page.php');
		}
		if ($type == AGENT){
			ob_flush();
			header('Location: dashboard.php');
		}
		if ($type == DISABLED){
			$output .= "Sorry Your account is disabled! Please contact Administrators";
		}
		if ($type == PENDING){
			$output .= "Sorry! Your account is currently in Pending mode, You'll have to wait until you're confirmed.";
			header('Location: ./register-persons.php');
		}
		if ($type == ADMIN){
			//ob_flush();
			header('Location: admin.php');
		}
		// else{
		// 	$output .= "Sorry! We could not find your account perhaps you haven't registered yet?";
		// }
			echo $output;
	}
}

?>
<head>
	<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="login-register">
<div class="row">
	<div class="col-5 top">
		<div class="jumbotron">
		<h1>Login</h1>
		<hr>
		<form class = "form-signin" role = "form"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" name="inputted_email" value="<?php echo $email; ?>" class="form-control" id="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" name="inputted_pass" class="form-control" id="pwd">
		  </div>
		  <div class="form-group form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="checkbox"> Remember me
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
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