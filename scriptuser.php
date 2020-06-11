<?php
include("./header.php");
//   $curl = curl_init();

//   curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://uinames.com/api/?amount=500",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "cache-control: no-cache"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// $response = json_decode($response, true); //because of true, it's in an array
// echo 'User: '. $response[6];

$content = file_get_contents("https://uinames.com/api/?amount=500");


	// Constant for looping (number of users)
	define('ITERATIONS', 55);

	//  Arrays for Randomizing Data

	// Array of 20 users - 1 admin : 1 disabled-user : 2 pending : 3 agent : 13 client
	$userTypes = ["c", "c", "c", "c", "c", "c", "c", "c", "c", "c", "c", "c", "c", "a", "a", "a", "p", "p", "dc", "s"];
	// Array of 7 email-types
	$emailTypes = ["@gmail.com", "@gmail.ca", "@hotmail.ca", "@live.ca", "@hotmail.com", "@msn.com", "@yahoo.com"];
	//$passwordEndings = ["183721", "283712", "38392", "83921", "84932", "37391", "939201", "227372", "38238", "238291"];

	// Only Ontario
	// Array of 7 provinces, favouring Ontario
	$province = "'ON', 'Ontario'"; //, "'ON', 'Ontario'", "'ON', 'Ontario'", "'ON', 'Ontario'", "'ON', 'Ontario'", "'QC', 'Quebec'", "'MB', 'Manitoba'";
	// Array of 9 'salutations', favoring default
	$salutation = ["Salutations", "Salutations", "Salutations", "Salutations", "Salutations", "Hello", "Greetings", "Welcome back", "Good day"];
	// Array of 15 streets
	$streetAddress1 = ["Main St.", "1st St.", "2nd St.", "Elm Grove Ave.", "Maple Grove Cres.", "Bloor St W.", "Bloor St. E.", "Dundas St.", "Simcoe St.", "Adelaide St. E.", "Adelaide St. W.", "Dufferin St.", "Peter St.", "John St.", "JAmes Ave."];
	
	// 109 Element Array of 11 Cities
	$city = ["1", "1", "2", "4", "4", "4", "8", "8", "8", "8", "16", "16", "16", "16", "32", "32", "64", "64", "64", "64", 
	"128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128",
	"256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256",
	"256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256",
	"512", "512", "512". "512", "512", "512", "512". "512",	"512", "512", "512". "512", "512", "512", "512". "512", "512", 
	"512", "512". "512", "512", "512", "512". "512",
	"1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024"];

	// Array of 4 Area Codes
	$areaCode = [647, 416, 289, 905];
	// Temp variable to hold postal code arrays, based on City
	$postalCode = "";

	//first_name varchar(128) NOT NULL
	//last_name varchar(128) NOT NULL
	//street_address1(128) NOT NULL
	//street_address2(128) NOT NULL
	//city varchar(64) NOT NULL
	//province varchar(2) NOT NULL
	//postal_code varchar(6) NOT NULL
	//primary_phone_number varchar(15) NOT NULL
	//secondary_phone_number varchar(15) NOT NULL
	//fax_number varchar(15) NOT NULL
	//preferred_contact_method

	$result  = json_decode($content);

	$conn = db_connect();

	//print_r($result);
	$i = 0;
	while($i < ITERATIONS)
	{
		$i++;

		$randomNumber = rand(0, 500);

		$ranndomUserID = $result[$randomNumber]->name . " ". $result[$randomNumber]->surname;

		//$randomPassword = $result[$randomNumber]->surname;
		//$randomUserPassword = $randomPassword . $passwordEndings[mt_rand(0, 9)];
		//$randomUserPassword = md5($randomUserPassword);

		// All users with password "password"
		$password = hash("md5", "password");

		// Random Name selection from data list
		$randomUserFirstName = $result[$randomNumber]->name;
		$randomUserLastName = $result[$randomNumber]->surname;

		// Arrays of 20 usertypes, 7 email domains
		$randomUserType = $userTypes[mt_rand(0,19)];
		$randomUserEmail = $ranndomUserID . $emailTypes[mt_rand(0, 6)];

		$randomSalutation = $salutation[mt_rand(0,8)];
		$randomStreetNumber = rand(1, 1499);
		// Concatonate random number with random st name
		$randomStreetAddress = $randomStreetNumber . " " . $streetAddress1[mt_rand(0,14)];
		// Street address2 array of 5, most likely to be same as address 1. Otherwise Concatonate number with new random street name
		$streetAddress2 = [$randomStreetAddress, $randomStreetAddress, $randomStreetAddress, $randomStreetAddress, $randomStreetNumber . " " . $streetAddress1[mt_rand(0,14)]];
		$randomStreetAddress2 = $streetAddress2[mt_rand(0,4)];
		$randomCity = $city[mt_rand(0,108)];

		$date = date('Y-m-d H:i:s');

		$randomPhoneNumber = "(" . $areaCode[mt_rand(0,3)] . ") " . rand(0,9) . rand(0,9) . rand(0,9) . "-" . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
		$randomPhoneNumber2 = "(" . $areaCode[mt_rand(0,3)] . ") " . rand(0,9) . rand(0,9) . rand(0,9) . "-" . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);

		// Assign postalCode prefix based on city
		switch ($randomCity){
			case "1":
				$postalCode = ["L1T", "L1S"];
				$randomPostalCode = $postalCode[mt_rand(0,1)];
				break;
			case "2":
				$randomPostalCode = "1C0";
				break;
			case "4":
				$postalCode = ["L1B", "L1C", "L1E"];
				$randomPostalCode = $postalCode[mt_rand(0,2)];
				break;
			case "8":
				$postalCode = ["L1G", "L1J", "L1H", "L1K"];
				$randomPostalCode = $postalCode[mt_rand(0,3)];
				break;
			case "16":
				$postalCode = ["L1V", "L1W", "L1X", "L1Y"];
				$randomPostalCode = $postalCode[mt_rand(0,3)];
				break;
			case "32":
				$postalCode = ["1NO", "L9L"];
				$randomPostalCode = $postalCode[mt_rand(0,1)];
				break;
			case "64":
				$postalCode = ["L1N", "L1M", "L1P", "L1R"];
				$randomPostalCode = $postalCode[mt_rand(0,3)];
				break;
			case "128":
				$postalCode = ["M1B", "M1C", "M1E", "M1G", "M1J", "M1K", "M1L", "M1M", "M1L", "M1P", "M1R", "M1S", "M1T", "M1V", "M1W", "M1X"];
				$randomPostalCode = $postalCode[mt_rand(0,15)];
				break;
			case "256":
				$postalCode = ["M5A", "M5B", "M5C", "M4E", "M5E", "M5G", "M5H", "M6H", "M5J", "M6J", "M4K", "M5K", "M6K", "M4L", "M5L", "M4M", 
				"M4N", "M5N", "M4P", "M5P", "M6P", "M4R", "M5R", "M6R", "M4S", "M5S", "M6S", "M4T", "M5T", "M4V", "M5V", "M4W", "M5W", "M4X", "M5X", "M4Y", "M7Y"];
				$randomPostalCode = $postalCode[mt_rand(0,36)];
				break;
			case "512":
				$postalCode = ["M7R", "L5A", "L5B", "L5C", "L5E", "L5G", "L5H", "L5J", "L5K", "L5L", "L5M", "L5N", "L5P", "L5R", "L5S", "L5T", 
				"L5V", "L5W", "L4T", "L4V", "L4W", "L4X", "L4Y", "L4Z"];
				$randomPostalCode = $postalCode[mt_rand(0,23)];
				break;
			case "1024":
				$postalCode = ["M9A", "M9B", "M9C", "M9P", "M9R", "M8V", "M9V", "M8W", "M9W", "M8X", "M8Y", "M8Z"];
				$randomPostalCode = $postalCode[mt_rand(0,11)];
				break;
		}

		// Determine PostalCode Suffix
		$randomPostalLDL = "9Z9";
		while ($randomPostalLDL == "9Z9")
		{
			// Clear var
			$randomPostalLDL = "";
			
			//Generate random UPPERCASE character
			$randomChar = "O";
			// Loop until not invalid
			while ($randomChar == "D" | $randomChar == "F" | $randomChar == "I" | $randomChar == "O" | $randomChar == "Q" | $randomChar == "U")
			{
				$randomChar = chr(rand(65,90));	
			}
			
			$randomPostalLDL = rand(0,9) . $randomChar . rand(1,9);
			$randomPostalCode = $randomPostalLDL;
		}

		$tempContactValue = rand(0,1000);
		if ($tempContactValue == 0 | $tempContactValue == 733)
		{
			//Letter Post
			$randomContactPref = "l";
		}
		else if ($tempContactValue == 1000)
		{
			//Fax
			$randomContactPref = "f";
			$faxnumber = $randomPhoneNumber;
		}
		else if ($tempContactValue < 750)
		{
			//Email
			$randomContactPref = "e";
		}
		else
		{
			//Phone
			$randomContactPref = "p";
		}

		// Give second phone numbers to ~ 1/10 people
		if ($tempContactValue > 940 | $tempContactValue < 60)
		{
			$randomPhoneNumber2 = "(" . $areaCode[mt_rand(0,3)] . ") " . rand(0,9) . rand(0,9) . rand(0,9) . "-" . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
		}

		// $name = $randomUser->name;
		// For Testing
		echo "<br />UserID:";
		print_r($ranndomUserID);
		echo "<br />Password:";
		print_r($password);
		echo "<br />UserType:";
		print_r($randomUserType);
		echo "<br />FirstName:";
		print_r($randomUserFirstName);
		echo "<br />LastName:";
		print_r($randomUserLastName);
		echo "<br />Email:";
		print_r($randomUserEmail);
		echo "<br />Salutation:";
		print_r($randomSalutation);
		echo "<br />Address1:";
		print_r($randomStreetAddress);
		echo "<br />Address2:";
		print_r($randomStreetAddress2);
		echo "<br />City";
		print_r($randomCity);
		echo "<br />PostalCode:";
		print_r($randomPostalCode);
		echo "<br />Phone #:";
		print_r($randomPhoneNumber);
		echo "<br />Secondary Phone #:";
		print_r($randomPhoneNumber2);
		echo "<br />ContactPref #:";
		print_r($randomContactPref);
	}
// $sql = "INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) VALUES ('$ranndomUserID', '$password', '$randomUserType', '$randomUserEmail', '$date', '$date')";

// $results = pg_query($conn, $sql);

// if($results){
// echo "YO IT FUCKIN WORKED";
// echo "<br />";
// } else {
// echo "YO IT FUCKIN DIDN'T WORK";
// echo "<br />";
// }  
  
  $userTypes = ["c", "c", "c", "s", "a", "a", "p", "p"];
  $emailTypes = ["@gmail.com", "@hotmail.com", "@msn.com", "@yahoo.com"];
  $passwordEndings = ["183721", "283712", "38392", "83921", "84932", "37391", "939201", "227372", "38238", "238291"];
  
  $result  = json_decode($content);

  $conn = db_connect();

  // print_r($result);
  $i = 0;
  while($i < 1000)
  {
    $i++;

    $randomNumber = mt_rand(0, 500);

    $ranndomUserID = $result[$randomNumber]->name . " ". $result[$randomNumber]->surname;

    $randomPassword = $result[$randomNumber]->surname;

    $randomUserPassword = $randomPassword . $passwordEndings[mt_rand(0, 9)];

    $randomUserPassword = md5($randomUserPassword);

    $randomUserType = $userTypes[mt_rand(0,6)];

    $randomUserLastName = $result[$randomNumber]->surname;

    $randomUserEmail = $ranndomUserID . $emailTypes[mt_rand(0, 3)];

    $date = date('Y-m-d H:i:s');

    $name = $randomUser->name;
    // print_r($ranndomUserID);
    // echo "<br />";
    // print_r($randomUserPassword);
    // echo "<br />";
    // print_r($randomUserType);
    // echo "<br />";
    // print_r($randomUserLastName);
    // echo "<br />";
    // print_r($randomUserEmail);
    
	// Insert data into users table
    $sql = "INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) VALUES ('$ranndomUserID', '$randomUserPassword', '$randomUserType', '$randomUserEmail', '$date', '$date')";
    $results = pg_query($conn, $sql);
	
	// Test if data entered
    if($results){
      echo "User has been added";
      echo "<br />";
    } else {
      echo "Duplicate user, did not add";
      echo "<br />";
    }
	
	// Insert data into persons table
	$sql = "INSERT INTO persons (user_id, salutation, first_name, last_name, street_address1, streetAddress2, city, province, postal_code, primary_phone_number, secondary_phone_number, fax_number, preferred_contact_method) "
	. "VALUES ('$ranndomUserID', '$randomSalutation', '$randomUserFirstName', '$randomUserLastName', '$randomStreetAddress', '$randomStreetAddress2', '$randomCity', '$province', '$randomPostalCode', '$randomPhoneNumber', '$randomPhoneNumber2', '$faxnumber', '$randomContactPref')";
	
	// Test if data entered
	if($results){
      echo "Person has been added";
      echo "<br />";
    } else {
      echo "Person was not added";
      echo "<br />";
    }
  }

?>