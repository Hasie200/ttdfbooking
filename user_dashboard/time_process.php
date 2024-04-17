<?php

session_start();

include($_SERVER['DOCUMENT_ROOT'] . '/ttdf_booking/db_connect.php');

// Improved error handling and input validation
if (!isset($_SESSION['user_id'])) {
    header('Location: logout.php');
    exit(); // Explicitly exit to prevent further execution
}

$_SESSION['managerbooked'] = $_POST['role'];


$date = filter_var($_POST['selectedDate'], FILTER_SANITIZE_STRING);
$manager = filter_var($_SESSION['managerbooked'], FILTER_SANITIZE_STRING);

  $sql = "SELECT booking_date FROM manager_availability WHERE user_id = ? ORDER BY booking_date ASC";



$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $manager); // Prepared statement for security

$stmt->execute();

      


if (!$stmt->execute()) { // Check for execution errors
    echo "Error: " . $stmt->error;
    exit();
}

$result = $stmt->get_result();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookingDate = $row['booking_date'];
       
         $formattedDate = date("l jS F, Y h:i A", strtotime($bookingDate));

         echo "<option value='$bookingDate'>$formattedDate</option>";     

    }
}

 else {
     echo 'No times available';
     exit();
}
  



   echo json_encode($final);



?>
