<?php


   session_start();
   include('db_connect.php');
    

// 1. SANATIZING THE DATA FROM USER

  function sanatize($data){
   
   $data = trim($data);
   $data = htmlspecialchars($data);
   $data = stripslashes($data);
     return $data;
  }


  function sanatize_string($string){

  $string = sanatize($string); // Assuming your sanitize function does basic cleaning

  // Filter for strings using FILTER_SANITIZE_STRING
  $string = filter_var($string, FILTER_SANITIZE_STRING);

  return $string;

 }

    
   
   $username=sanatize_string($_POST['username']);
   $password=$_POST['password'];
   

  
   // 2. ADDING USER TO THE DATABASE/



  // Prepare the SQL statement with placeholders
  $sql = "SELECT username, password FROM users WHERE username = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('s',$username);

  // Check if a row was found (user exists with the provided username)
if ($stmt->num_rows > 0) {
   

  // Verify password using password_verify (avoid storing passwords in plain text)
  if (password_verify($password, $db_hashed_password)) {
    echo "Login successful!";
  } else {
     echo "<script>alert('Invalid Password')</script>";
  echo "<script>window.location.href = 'login.php' </script>";
  }

  // Close the statement after use
  $stmt->close();
} 

else {
  echo "<script>alert('Invalid Username')</script>";
  echo "<script>window.location.href = 'login.php' </script>";
}


// Close the connection
$conn->close();


  


?>