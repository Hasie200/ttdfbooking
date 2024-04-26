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



  if($_SERVER["REQUEST_METHOD"] == "POST"){  
   
   $username=sanatize_string($_POST['username']);
   $password=$_POST['password'];
   
   // 2. ADDING USER TO THE DATABASE/
  // Prepare the SQL statement with placeholders

   
 
  $sql = "SELECT * FROM users WHERE username = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('s',$username);

  $stmt->execute();

  $result = $stmt->get_result(); 

  // Check if a row was is present (user exists with the provided username)

  if ($result->num_rows == 0) {
    echo "<p style='color:red;'>Username does not exist</p>";
   
   } // end of $result->num_rows > 0

  
   
    
  else {


     // get the row and verify the password of the user
     $row = $result->fetch_assoc();

    // Check if the passwords match , if not return to login page

    if(password_verify($password, $row['password'])) {

     
       
       

        if($row['role'] == "Manager"){

          $_SESSION['manager_id'] = $row['user_id'];

          header("Location: manager_dashboard/manager_dashboard.php");
           
        }
 
        else if($row['role'] == "User"){
           $_SESSION['user_id'] = $row['user_id'];
          header("Location: user_dashboard/user_dashboard.php");
           
        }

   }   

 else{
    echo "<p style='color:red;'>Password invalid. </p>";
 } 



}  // end of $row = $result->fetch_assoc()

}


?>