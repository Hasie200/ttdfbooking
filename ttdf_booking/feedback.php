<?php
   

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



  if($_SERVER["REQUEST_METHOD"] == "POST"){  
   
   $feedback=sanatize_string($_POST['feedback']);

  
  // 2. ADDING USER TO THE DATABASE/
  // Prepare the SQL statement with placeholders

   
 
  $sql = "INSERT INTO feedback (feedback_details) VALUES (?)";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('s',$feedback);

  $stmt->execute();
 

  // Check if a row was is present (user exists with the provided username)
    if ($conn->affected_rows > 0) {
     
   
     
      echo "<script>window.location.href = '  http://miceducation.42web.io/ttdf_booking/index.php#Feedback '</script>";
      echo "<p style='color:green;'> Feedback Sent. </p>";
    }

    else{
      echo "<p style='color:red;'> Error Sending Feedback . </p>";
      echo "<script>window.location.href = '  http://miceducation.42web.io/ttdf_booking/index.php#Feedback '</script>";
 
    }




   

  }

  
?>