<?php
	function db_connect(){

	// $connection = pg_connect("host=localhost port=5432 dbname=group10_db
	// 			user=group10_admin password=password");
		$connection = pg_connect("host=localhost dbname=WEBD3201_DB
				user=bayerk password=password");
	return $connection;
}
	function is_user_id($user_id){
		$conn = db_connect();
	
		$sql = "SELECT user_id FROM users WHERE user_id = $user_id";

		$results = pg_query($conn, $sql);
		
		if($results){
			return true;
		} else {
			return false;
		}
	}
	function build_simple_dropdown() {
		$conn = db_connect();
		
		$sql = "SELECT salutations FROM salutations";
	
		$results = pg_query($conn, $sql);
	
		if($results){
			while($row = pg_fetch_assoc($results)){
				$value = $row['salutations'];
				echo "<option name='salutations' value='$value'>$value</option>";
				
			}
		}
	}
	function build_simple_dropdown_provinces() {
		$conn = db_connect();
		
		$sql = "SELECT province_abbrev, province_name FROM provinces";
	
		$results = pg_query($conn, $sql);
	
		if($results){
			while($row = pg_fetch_assoc($results)){
				$abbrev = $row['province_abbrev'];
				$name = $row['province_name'];
				echo "<option name='provinces' value='$abbrev'>$name</option>";
				
			}
		}
	}
	
	function build_simple_dropdown_cities() {
		$conn = db_connect();
		
		$sql = "SELECT value, property FROM city";
	
		$results = pg_query($conn, $sql);
	
		if($results){
			while($row = pg_fetch_assoc($results)){
				$value = $row['value'];
				$property = $row['property'];
				echo "<option name='cities' value='$value'>$property</option>";
				
			}
		}
	}
	
	function build_radio() {
		$conn = db_connect();
		
		$sql = "SELECT value, method FROM preferred_contact_method";
	
		$results = pg_query($conn, $sql);
	
		if($results){
			while($row = pg_fetch_assoc($results)){
				$value = $row['value'];
				$method = $row['method'];
				echo "<br><input type='radio' name='contact' value='$value'> $method";	
			}
		}
	}
	
	function build_radio_City() {
		$conn = db_connect();
		
		$sql = "SELECT value, property FROM city";
	
		$results = pg_query($conn, $sql);
	
		if($results){
			while($row = pg_fetch_assoc($results)){
				$value = $row['value'];
				$property = $row['property'];
				echo "<br><input type='radio' name='cities' value='$value'> $property";	
			}
		}
	}

?>