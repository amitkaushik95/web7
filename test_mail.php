<?php
require_once '../config/config.php';

$to = "amitkaushik95@gmail.com";
$subject = "Test Email from PHP";
$message = "This is a test email to verify PHP mail functionality.";
$headers = "From: amitkaushik95@gmail.com\r\n";
$headers .= "Reply-To: amitkaushik95@gmail.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $message, $headers)) {
  echo "Test email sent successfully!";
} else {
  echo "Failed to send test email.";
}
?>