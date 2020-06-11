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




  
  $userTypes = ["c","c", "c", "s", "a", "a", "p", "p"];
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
    
    $sql = "INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) VALUES ('$ranndomUserID', '$randomUserPassword', '$randomUserType', '$randomUserEmail', '$date', '$date')";

    $results = pg_query($conn, $sql);

    if($results){
      echo "User has been added";
      echo "<br />";
    } else {
      echo "Duplicate user, did not add";
      echo "<br />";
    }
  }
  

  

?>