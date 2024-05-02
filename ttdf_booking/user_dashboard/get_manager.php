<?php

  
function encrypt($data) {

     $key = 't5axHwNKOKqAbqIfyRA0ORGFspblLEd9';
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
    return base64_encode($encrypted);
}


  include($_SERVER['DOCUMENT_ROOT']. '/ttdf_booking/db_connect.php');


  

  $sql = "SELECT * FROM users WHERE  role = 'Manager' ";

  $stmt = $conn->prepare($sql);

  $stmt->execute();

  $result = $stmt->get_result(); 

  // Check if a row was is present (user exists with the provided username)
  if ($result->num_rows > 0) {


      while ($row = $result->fetch_assoc()) {


  $fullname = $row['first_name'] . " " . $row['last_name'];
  echo "<option value='" . encrypt($row['user_id']) . "'>$fullname</option>";


}

   

   } 


?>