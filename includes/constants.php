<?php
//user types
define('ADMIN', 's');
define('AGENT', 'a');
define('CLIENT', 'c');
define('PENDING', 'p');
define('DISABLED', 'd');

//database constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'group10_db');
define('DB_PORT', '5432');
define('DB_PASSWORD', 'MalamberplaysMC');
define('DB_USER', 'group10_admin');

//Website Details
define('WEBSITE_NAME', 'House Hunters');
//Cookie lasts for 30 days
define('COOKIE_LIFESPAN', time() + 60*60*24*30);

//HASHPASS Constant -- both to be used on login.php
define('HASHPASS', 'hash("md5", $passwordstring)');

//Contact Methods
define('EMAIL', 'e');
define('PHONE', 'p');
define('POSTED_MAIL', 'm');

//Listing Status
define('OPEN', 'o');
define('CLOSED', 'c');
define('SOLD', 's');

//Valid Phone number range
define('MIN_AREA_CODE', '200');
define('MAX_AREA_CODE', '999');

//Validation
define('MINIMUM_USER_LENGTH', '6');
define('MAXIMUM_USER_LENGTH', '20');
define('MINIMUM_PASSWORD_LENGTH', '8');
define('MAXIMUM_PASSWORD_LENGTH', '16');

?>
