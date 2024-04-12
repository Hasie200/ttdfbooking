<?php
  
include('db_connect.php');


// 1. SANATIZING THE DATA FROM USER
  function sanatize($data){
   
   $data = trim($data);
   $data = htmlspecialchars($data);
   $data = stripslashes($data);
     return $data;
  }

 function sanatize_email($email) {
  $email = sanatize($email); // Assuming your sanitize function does basic cleaning
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  return $email;
  }

  function sanatize_string($string){

  $string = sanatize($string); // Assuming your sanitize function does basic cleaning

  // Filter for strings using FILTER_SANITIZE_STRING
  $string = filter_var($string, FILTER_SANITIZE_STRING);

  return $string;

 }

    
   
   $first_name=sanatize_string($_POST['first_name']); 
   $last_name=sanatize_string($_POST['last_name']);
   $email=sanatize_email($_POST['email']);
   $username=sanatize_string($_POST['username']);
   $password=$_POST['password'];
   $role=sanatize_string($_POST['role']);

  
   // 2. ADDING USER TO THE DATABASE/



  // Prepare the SQL statement with placeholders
  $sql = "INSERT INTO users (first_name, last_name, email, username, password, role) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
  }

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Bind values to placeholders (securely)
  $stmt->bind_param("ssssss", $first_name, $last_name, $email, $username, $hashed_password, $role);

  // Execute the prepared statement
  if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
  }

  // Check for successful insertion (adjust based on your logic)
  if ($conn->affected_rows > 0) {
    echo "User created successfully!";
    header('Location: login.php');
  } else {
    echo "Error creating user.";
  }

  // Close the statement (recommended practice)
  $stmt->close();

// Close the connection
$conn->close();


  


?>