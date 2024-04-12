<?php

// Database credentials
$host = "localhost";
$dbname = "user_authentication";
$username = "root";
$password = "";

// Connect to the database
try {
  $conn = new mysqli($host, $username, $password, $dbname);
  

}

catch(mysqliException $e) {
  echo "Error connecting to database: " . $e->getMessage();
}


?>
