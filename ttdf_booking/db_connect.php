<?php

// Database credentials
$host = "sql202.infinityfree.com";
$dbname = "if0_36290627_mic_db";
$username = "if0_36290627";
$password = "y7XD2QuiDAu";

// Connect to the database
try {
  $conn = new mysqli($host, $username, $password, $dbname);
  

}

catch(mysqliException $e) {
  echo "Error connecting to database: " . $e->getMessage();
}


?>
