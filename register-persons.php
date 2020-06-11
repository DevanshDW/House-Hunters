
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/webd3201.css">
    <style>
    <?php include 'css/webd3201.css'; ?>
</style>
</head>
<body>
    <?php
    include "./header.php";

    if(isset($_SESSION["USER_TYPE"])){

    }else{
        $_SESSION["USER_TYPE"] = "";
    }
    if(isset($_SESSION["logout"])){

    }else{
        $_SESSION["logout"] = "";
    }

    if($_SESSION["USER_TYPE"] == ""){
        $_SESSION["logout"] = "You are not logged in, therefore you cannot edit your account information!";
        header("location: ./register.php");
    }
    IF ($_SERVER["REQUEST_METHOD"] == "GET"){
        $first_name = "";
        $last_name = "";
        $street_address_1 = "";
        $street_address_2 = "";
        $city = "";
        $province = "";
        $postal_code = "";
        $primary_phone_number = "";
        $secondary_phone_number = "";
        $fax_number = "";
        $preferred_contact_method = "";

    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        // session_start();
        //set sessions if not set

        if($_SESSION["USER_TYPE"] == ""){
            $_SESSION["logout"] = "You are not logged in, therefore you cannot edit your account information!";
            header("location: ./register.php");
        }

                //recieve values from the form  
        $salutation = ($_POST['salutations']);
        $preferred_contact_method = $_POST['contact'];
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $primary_phone_number = trim($_POST['primary_phone_number']);
        $secondary_phone_number = trim($_POST['secondary_phone_number']);
        $street_address_1 = trim($_POST['street_address_1']);
        $street_address_2 = trim($_POST['street_address_2']);
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postal_code = trim($_POST['postal_code']);
        $contact = "e";
        $fax_number = trim($_POST['fax_number']);
        $_SESSION['logout']="";

                //validation
        if($first_name == "") {
            $_SESSION['logout'].="You have not entered a first name!" . "<br/>";
            ob_flush();
            header("location:./register-persons.php");
        }
        if ($last_name == "") {
            $_SESSION['logout'].="You have not entered a last name!" . "<br/>";
            ob_flush();
            header("location:./register-persons.php");
        }
        if ($primary_phone_number == "") {
            $_SESSION['logout'].="You have not entered a primary phone number!" . "<br/>";
            header("location:./register-persons.php");
        }
        if ($secondary_phone_number == "") {
            $_SESSION['logout'].="You have not entered a secondary phone number!" . "<br/>";
            header("location:./register-persons.php");
        }
        if ($street_address_1 == "") {
            $_SESSION['logout'].="You have not entered a Street Address!" . "<br/>";
            ob_flush();
            header("location:./register-persons.php");
        }
        if ($street_address_2 == "") {
            $_SESSION['logout'].="You have not entered a Street Address!" . "<br/>";
            ob_flush();
            header("location:./register-persons.php");
        }
        if ($postal_code == "") {
            $_SESSION['logout'].="You have not entered a postal code!" . "<br/>";
            header("location:./register-persons.php");
        }
        if ((strlen($postal_code)) < 6 || (strlen($postal_code)) > 6){
            $_SESSION['logout'].="Your postal code must be 6 characters long!" . "<br/>";
            header("location:./register-persons.php");
        }
        if ($fax_number == "") {
            $_SESSION['logout'].="You have not entered a fax number!" . "<br/>";
            header("location:./register-persons.php");
        }

        if ($_SESSION['logout']==""){
            $conn = db_connect();
            $user_id = $_SESSION["USER_ID"];
            // $update = "UPDATE persons SET salutation = $salutation, first_name = $first_name, last_name = $last_name, street_address1 = $street_address_1, street_address2 = $street_address_2, city = $city, provice = $province, postal_code = $postal_code, primary_phone_number = $primary_phone_number, secondary_phone_number = $secondary_phone_number, fax_number = $fax_number, preferred_contact_method = $preferred_contact_method WHERE user_id = $user_id";
            $search = "SELECT user_id FROM persons WHERE user_id = '$user_id'";
            $searchResults = pg_query($conn, $search);
            if($searchResults){
                $update = "UPDATE persons SET salutation = '$salutation', first_name = '$first_name', last_name = '$last_name', street_address1 = '$street_address_1', street_address2 = '$street_address_2', city = '$city', province = '$province', postal_code = '$postal_code', primary_phone_number = '$primary_phone_number', secondary_phone_number = '$secondary_phone_number', fax_number = '$fax_number', preferred_contact_method = '$preferred_contact_method' WHERE user_id = '$user_id'";
                $updateResults = pg_query($conn, $update);
                if($updateResults){
                    $_SESSION["USER_TYPE"]=CLIENT;
                    $usertype = $_SESSION["USER_TYPE"];
                    $user_id = $_SESSION["USER_ID"];
                    $_SESSION['logout']="Your information has been updated!";
                    header("location:./register-persons.php");
                }else{
                    $_SESSION['logout']="Your information has not been updated!";
                }

            }else{
                $insert = "INSERT INTO persons (user_id, salutation, first_name, last_name, street_address1, street_address2, city, province, postal_code, primary_phone_number, secondary_phone_number, fax_number, preferred_contact_method) VALUES ('$user_id', '$salutation', '$first_name', '$last_name', '$street_address_1', '$street_address_2', '$city', '$province', '$postal_code', '$primary_phone_number', '$secondary_phone_number', '$fax_number', '$preferred_contact_method')";
                $results = pg_query($conn, $insert);    
                if($results){
                    $_SESSION["USER_TYPE"]=CLIENT;
                    $usertype = $_SESSION["USER_TYPE"];
                    $user_id = $_SESSION["USER_ID"];
                    $_SESSION['logout'] = "";
                    $_SESSION['logout'].="Account Information has been updated!";
                    $usertypesql = "UPDATE users SET user_type = $usertype WHERE user_id = $user_id";
                    $results2 = pg_query($conn, $usertypesql);
                    
                    header("location: ./welcome-page.php");
                    ob_flush();
                }
            }
            // echo $salutation;
            // echo "<br />";
            // echo $preferred_contact_method;
            // echo "<br />";
            // echo $first_name;
            // echo "<br />";
            // echo $last_name;
            // echo "<br />";
            // echo $primary_phone_number;
            // echo "<br />";
            // echo $secondary_phone_number;
            // echo "<br />";
            // echo $street_address_1;
            // echo "<br />";
            // echo $street_address_2;
            // echo "<br />";
            // echo $city;
            // echo "<br />";
            // echo $province;
            // echo "<br />";
            // echo $postal_code;
            // echo "<br />";
            // echo $fax_number;
      
            }

        } else {
            $_SESSION["logout"] = "The user could not be found."; 
        }
    



?>
<div class="login-register">
<div class="row">
<div class="col-5 top">
<div class="jumbotron">
<?php echo $_SESSION['logout']; ?>
<h1 align="center">Update Personal Information</h1>
<hr>
<form class = "form-signin" role = "form"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
<div class="form-group">
<label for="salutation">Salutation:</label>
<select name="salutations">
<?php echo build_simple_dropdown(); ?>
</select>
</div>
<div class="form-group">
<label for="contact">Preffered Contact Method:</label>
<?php echo build_radio(); ?>
</div>
<div class="form-group">
<label for="first_name">First Name:</label>
<input type="name" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
</div>
<div class="form-group">
<label for="last_name">Last Name:</label>
<input type="name" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
</div>
<div class="form-group">
<label for="last_name">Primary Phone Number:</label>
<input type="name" class="form-control" name="primary_phone_number" value="<?php echo $last_name; ?>">
</div>
<div class="form-group">
<label for="last_name">Secondary Phone Number:</label>
<input type="name" class="form-control" name="secondary_phone_number" value="<?php echo $last_name; ?>">
</div>
<div class="form-group">
<label for="street_address_1">Street Address:</label>
<input type="address" class="form-control" name="street_address_1" value="<?php echo $street_address_1; ?>">
</div>
<div class="form-group">
<label for="street_address_2">Second Street Address:</label>
<input type="address" class="form-control" name="street_address_2" value="<?php echo $street_address_2; ?>">
</div>
<div class="form-group">
<label for="city">City:</label>
<select name="city">
<?php echo build_simple_dropdown_cities(); ?>
</select>
</div>
<div class="form-group">
<label for="province">Province:</label>
<select name="province">
<?php echo build_simple_dropdown_provinces(); ?>
</select>
</div>
<div class="form-group">
<label for="first-name">Postal Code:</label>
<input type="name" class="form-control" name="postal_code" value="<?php echo $street_address_2; ?>" maxlength="6">
</div>
<div class="form-group">
<label for="first-name">Fax Number:</label>
<input type="name" class="form-control" name="fax_number" value="<?php echo $fax_number; ?>">
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