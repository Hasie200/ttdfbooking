<?php

session_start();

include($_SERVER['DOCUMENT_ROOT'] . '/ttdf_booking/db_connect.php');

// Improved error handling and input validation
if (!isset($_SESSION['user_id'])) {
    header('Location: logout.php');
    exit(); // Explicitly exit to prevent further execution
}

function encrypt($data) {

     $key = 't5axHwNKOKqAbqIfyRA0ORGFspblLEd9';
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
    return base64_encode($encrypted);
}


$date = filter_var($_POST['selectedDate'], FILTER_SANITIZE_STRING);
$manager = filter_var($_SESSION['managerbooked'], FILTER_SANITIZE_STRING);

 
    // OBJECTIVE 1:  REMOVE ALL MANAGER DATES ONCE DATE IS ALREADY GONE 

 // Define the SQL statement with placeholder
$sql = "DELETE FROM manager_availability WHERE booking_date < ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Get today's date and time
$today = date("Y-m-d H:i:s");

// Bind the parameter
$stmt->bind_param('s', $today);

// Execute the statement
$stmt->execute();






//OBJECTIVE 2:  NOW ACCESS ALL DATES WITH AVAILABILITY SET TO 'AVAILABLE'
  $sql = "SELECT booking_date FROM manager_availability WHERE user_id = ? AND availability = ? ORDER BY booking_date ASC";
  $availability = 'available';


$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $manager, $availability ); // Prepared statement for security

$stmt->execute();

      


if (!$stmt->execute()) { // Check for execution errors
    echo "Error: " . $stmt->error;
    exit();
}

$result = $stmt->get_result();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookingDate =  $row['booking_date'];
       
         $formattedDate = date("l jS F, Y h:i A", strtotime($bookingDate));

         echo '<option value=' . encrypt($bookingDate) . '> ' . $formattedDate . '</option>';     

    }
}

 else {
      
     echo "<option value=''> No available dates </option>";
     exit();
}
  




?>
