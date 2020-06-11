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

$jsonContent = "./ADDRESSDATA.json";
$content = file_get_contents($jsonContent);
$result  = json_decode($content);

//$conn = db_connect();




	///////////////////////////////////
	
	// Logged-in agent as person/user

	///////////////////////////////////







	// Constant for looping (number of listings)
	define('ITERATIONS', 1000);

	//  Arrays for Randomizing Data

	// Only Ontario
	// Array of 7 provinces, favouring Ontario
	$province = "'ON', 'Ontario'"; //, "'ON', 'Ontario'", "'ON', 'Ontario'", "'ON', 'Ontario'", "'ON', 'Ontario'", "'QC', 'Quebec'", "'MB', 'Manitoba'";
	
	// 109 Element Array of 11 Cities
	$city = ["1", "1", "2", "4", "4", "4", "8", "8", "8", "8", "16", "16", "16", "16", "32", "32", "64", "64", "64", "64", 
	"128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128", "128",
	"256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256",
	"256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256", "256",
	"512", "512", "512". "512", "512", "512", "512". "512",	"512", "512", "512". "512", "512", "512", "512". "512", "512", 
	"512", "512". "512", "512", "512", "512". "512",
	"1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024", "1024"];
	
	print_r($result);

	$i = 0;
	while($i < ITERATIONS)
	{
		$i++;
	
		$randomAddress = $result[$randomNumber]->address;

		$randomCity = $city[mt_rand(0,108)];
		
		// Assign postalCode prefix based on city
		// 
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
		
		// SQL Insert

		$sql = "INSERT INTO listings" 
		. "(address, city, postal_code)"
		. "Values ('$randomAddress', '$randomCity', '$randomPostalCode');"
		
		$results = pg_query($conn, $sql);
		
		// Test if data entered
		if($results){
		  echo "User has been added";
		  echo "<br />";
		} else {
		  echo "Duplicate user, did not add";
		  echo "<br />";
		}
		
	}

	
?>