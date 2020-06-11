

<?php
require 'includes/constants.php';

require 'includes/db.php';

require 'includes/functions.php';

ob_start();

session_start();
?>

<div id="fh5co-page">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="./images/Househunter.png" alt="House Hunters" style="height: 50px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./welcomePage.php">Welcome Page</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./admin.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./change-password.php">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./listing-create.php">Create Listing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./listing-search.php">Search Listings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./listing-search-results.php">Search Results</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./listing-display.php">Listing Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>