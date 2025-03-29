<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Database connection parameters
$host = 'localhost';
$dbname = 'mydb';
$username = 'root';
$password = 'Password@123';

try {
    // Create database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $plan_name = $_POST['plan_name'];
    $message = $_POST['message'];
    $created_at = date('Y-m-d H:i:s');

    // Prepare SQL statement
    $sql = "INSERT INTO leaddata (name, email, phone, plan_name, message, created_at) 
            VALUES (:name, :email, :phone, :plan_name, :message, :created_at)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':plan_name', $plan_name);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':created_at', $created_at);

    // Execute the statement
    $stmt->execute();

    // Create a new PHPMailer instance for admin notification
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amitkaushik95@gmail.com'; // Your Gmail address
        $mail->Password = 'znjs qhli xglk hzph'; // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Admin email settings
        $mail->setFrom('amitkaushik95@gmail.com', 'Cloud Services');
        $mail->addAddress('amitkaushik95@gmail.com', 'Admin');
        $mail->addReplyTo($email, $name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Lead Submission - Cloud Services';
        $mail->Body = "
            <h2>New Lead Submission Details</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Plan:</strong> {$plan_name}</p>
            <p><strong>Message:</strong> {$message}</p>
            <p><strong>Submitted at:</strong> {$created_at}</p>
        ";

        $mail->send();

        // Create a new PHPMailer instance for customer notification
        $customerMail = new PHPMailer(true);
        $customerMail->isSMTP();
        $customerMail->Host = 'smtp.gmail.com';
        $customerMail->SMTPAuth = true;
        $customerMail->Username = 'amitkaushik95@gmail.com'; // Your Gmail address
        $customerMail->Password = 'znjs qhli xglk hzph'; // Your Gmail App Password
        $customerMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $customerMail->Port = 587;

        // Customer email settings
        $customerMail->setFrom('amitkaushik95@gmail.com', 'Cloud Services');
        $customerMail->addAddress($email, $name);

        // Customer email content
        $customerMail->isHTML(true);
        $customerMail->Subject = 'Thank you for your interest in Cloud Services';
        $customerMail->Body = "
            <h2>Thank you for your interest in Cloud Services</h2>
            <p>Dear {$name},</p>
            <p>Thank you for your interest in our {$plan_name} plan. We have received your inquiry and one of our representatives will contact you shortly.</p>
            <h3>Your Submission Details:</h3>
            <p><strong>Plan Selected:</strong> {$plan_name}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong> {$message}</p>
            <br>
            <p>Best regards,<br>Cloud Services Team</p>
        ";

        $customerMail->send();

        // Redirect back to the home page with success message
        header('Location: index.php?status=success');
        exit();

    } catch (Exception $e) {
        error_log("Email Error: {$mail->ErrorInfo}");
        header('Location: index.php?status=error');
        exit();
    }

} catch (PDOException $e) {
    // Log the error and redirect with error message
    error_log("Database Error: " . $e->getMessage());
    header('Location: index.php?status=error');
    exit();
}