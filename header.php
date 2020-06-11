<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
require 'includes/constants.php';

require 'includes/db.php';

require 'includes/functions.php';

ob_start();

session_start();

$_SESSION['USER_TYPE']="";


//$_SESSION['USER_TYPE'] = ""; 


?>
<head>
	<style>
		<?php include 'css/webd3201.css'; ?>
	</style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <a class="navbar-brand" href="#">
          <img src="./images/Househunter.png" alt="House Hunter" style="height: 100px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse circleBehind" id="navbarNav">
    <ul class="navbar-nav">
      <?php
        
        if (isset($_SESSION["USER_TYPE"])){

        } else {
          $_SESSION["USER_TYPE"] = "";
        }
        if (isset($_SESSION["logout"])){

        } else {
          $_SESSION["logout"] = "";
        }
        if ($_SESSION["USER_TYPE"]!=""){
          echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
        } else {
          echo '<li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./register.php">Register</a>
        </li>';
        }
        if ($_SESSION["USER_TYPE"]==AGENT){
          echo '<li class="nav-item">
          <a class="nav-link" href="./dashboard.php">Dashboard</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link" href="./register-persons.php">Update Personal Information</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link" href="./change-password.php">Change Password</a>
        </li>';
        }
        if ($_SESSION["USER_TYPE"]==CLIENT){
          echo '<li class="nav-item">
          <a class="nav-link" href="./welcome-page.php">Welcome Page</a></li>';
          echo '<li class="nav-item">
          <a class="nav-link" href="./register-persons.php">Update Personal Information</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link" href="./change-password.php">Change Password</a>
        </li>';
        }
        if ($_SESSION["USER_TYPE"]==ADMIN) { 
          echo '<li class="nav-item">
          <a class="nav-link" href="./admin.php">Admin</a>
        </li>';
		
        echo '<li class="nav-item">
          <a class="nav-link" href="./register-persons.php">Update Personal Information</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link" href="./change-password.php">Change Password</a>
        </li>';
        }
<<<<<<< HEAD
		else{
			$_SESSION["USER_TYPE"]=="";
		}
=======
        if($_SESSION["USER_TYPE"]==PENDING){
          echo '<li class="nav-item">
          <a class="nav-link" href="./register-persons.php">Update Personal Information</a>
        </li>';
        } 
		
>>>>>>> ab3e65271b77ff438aa5b16e53a0db49713f9fbd
      ?>
    </ul>
  </div>
</nav>
<!-- Sourced: https://getbootstrap.com/docs/4.0/components/navbar/ -->