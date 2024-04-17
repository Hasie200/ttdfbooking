<?php
// Your email address
$to = "hasieuno@gmail.com";

// Subject
$subject = "Appointment Booking Confirmation";

// Email content
    $message = "Hey i think i sent this ";



// Send email
$mail_sent = mail($to, $subject, $message,);

// Check if email was sent successfully
if ($mail_sent) {
    echo "Email confirmation sent successfully.";
} else {
    echo "Failed to send email confirmation.";
}
?>