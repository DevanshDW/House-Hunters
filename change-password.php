
   		
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
<div class="login-register">
<?php include "./header.php" ?>
<?php 
if(isset($_SESSION["USER_TYPE"])){

}else{
	$_SESSION["USER_TYPE"]="";
}
if(isset($_SESSION["logout"])){

}else{
	$_SESSION["logout"]="";
}
if(($_SESSION["USER_TYPE"]=="")){
	$usertype = $_SESSION['USER_TYPE'];
	$_SESSION["logout"]='You are not logged in, or your account is pending!' . $usertype;
	header("location:index.php");
}
if(($_SESSION["USER_TYPE"]=="p")){
	$usertype = $_SESSION['USER_TYPE'];
	$_SESSION["logout"]='You are not logged in, or your account is pending!' . $usertype;
	header("location:index.php");
}

IF ($_SERVER["REQUEST_METHOD"] == "GET"){
        $full_name = "";
        $email_address = "";
        $password = "";
        $confirm_password = "";

    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
    	$conn = db_connect();
    	$_SESSION['logout'] = "";
    	$password1 = trim($_POST["password"]);
    	$password2 = trim($_POST["confirmpassword"]);

    	$finalpassword = md5($password1);
    	if($password1 == ""){
    		$_SESSION['logout'] .= "The first password field cannot be empty! <br />";
    	}
    	if($password2 == ""){
    		$_SESSION['logout'] .= "The second password field cannot be empty! <br />";
    	}
    	if($password1 != $password2){
    		$_SESSION['logout'] .= "Your password's do not match! <br />";
    	}

    	if($_SESSION['logout'] == ""){
    		$user_id = $_SESSION["USER_ID"];

    		$sqlUpdate = "UPDATE users SET password = '$finalpassword' WHERE user_id = '$user_id'";
    		$updateResults = pg_query($conn, $sqlUpdate);

    		if($updateResults){
    			$_SESSION['logout'] = "Your password has been updated!";
    		}else{
    			$_SESSION['logout'] = "Your new password was the same as your old password!";
    		}
    	}
    }

?>
<div class="row">
	<div class="col-5 top">
		<div class="jumbotron">
		<?php echo $_SESSION['logout']; ?>
		<h1>Change Password</h1>
		<hr>
		<form class = "form-signin" role = "form"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
		  <div class="form-group">
		    <label for="email">New Password:</label>
		    <input type="password" class="form-control" name="password">
		  </div>
		  <div class="form-group">
		    <label for="email">Confirm Password:</label>
		    <input type="password" class="form-control" name="confirmpassword">
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