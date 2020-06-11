<?php include "./header.php" ?>    
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/webd3201.css">
</head>
<body>
    <?php
    IF ($_SERVER["REQUEST_METHOD"] == "GET"){
        $full_name = "";
        $email_address = "";
        $password = "";
        $confirm_password = "";

    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        // set sessions if not started
        if(isset($_SESSION["USER_TYPE"])){

        }else{
            $_SESSION["USER_TYPE"] = "";
        }
        if(isset($_SESSION["logout"])){

        }else{
            $_SESSION["logout"] = "";
        }

        //Check if user type is set
        if($_SESSION["USER_TYPE"]!=""){
            $_SESSION["logout"]="You are logged in, therefore you cannot register!";
            header("location:update.php");
        }

        //recieve values from the form
        $full_name = trim($_POST['full_name']);
        $email_address = trim($_POST['email_address']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        $_SESSION["logout"] = "";

                //field validation
        if($full_name == "") {
            $_SESSION["logout"]= "You have not entered a username!" . "<br/>";
                        //ob_flush();
            header("location:register.php");
        }else{
            if(strlen($full_name) < MINIMUM_USER_LENGTH){
            $_SESSION['logout'].="Your username must be at least 6 characters long!" . "<br/>";
            }
            if(strlen($full_name) > MAXIMUM_USER_LENGTH){
                $_SESSION['logout'].="Your username must be less than 20 characters long!" . "<br/>";
            }
        }
        
        if($email_address == "") {
            $_SESSION['logout'].="You have not entered an email address!" . "<br/>";
                        // ob_flush();
                        //header("location:register.php");
        }
        if($password == "") {
            $_SESSION['logout'].="You have not entered a password!" . "<br/>";
                        // ob_flush();
                        //header("location:register.php");
        }else{
            if(strlen($password) < MINIMUM_PASSWORD_LENGTH){
            $_SESSION['logout'].="Your password must be at least 8 characters long!" . "<br/>";
            }
            if(strlen($password) > MAXIMUM_PASSWORD_LENGTH){
            $_SESSION['logout'].="Your password cannot be longer than 16 characters!" . "<br/>";
            }
        }

        if($password != $confirm_password){
            $_SESSION['logout'].="Your passwords do not match!" . "<br/>";
        }
        $date = date('Y-m-d H:i:s');
        $password = md5($password);
        $type = PENDING;
        $sql = "INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) VALUES ('$full_name', '$password', '$type', '$email_address', '$date', '$date')";
        $conn = db_connect();
        if($_SESSION["logout"] == ""){
            $results = pg_query($conn, $sql);
            if($results){
                $_SESSION["USER_TYPE"] = PENDING;
                $_SESSION["USER_ID"] = $full_name;
                header("location:./register-persons.php");
            }else{
                $_SESSION['logout'].="This user already exists, please select a different username! "." <br />";
                //header("location:register.php");
                }
        }
        

            }



    ?>
    <div class="login-register">
        <div class="row">
            <div class="col-5 top">
                <div class="jumbotron">
                    <?php echo $_SESSION['logout']; ?>
                    <h1>Register</h1>
                    <hr>
                    <form class = "form-signin" role = "form"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                      <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="name" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email_address" value="<?php echo $email_address; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input type="password" class="form-control" name="confirm_password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php 
    echo "<br></br>";
    include "./footer.php";
     ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>