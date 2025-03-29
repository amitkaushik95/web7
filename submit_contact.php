<?php
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
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $created_at = date('Y-m-d H:i:s');

    // Prepare SQL statement
    $sql = "INSERT INTO contacts (name, email, phone, subject, message, created_at) 
            VALUES (:name, :email, :phone, :subject, :message, :created_at)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':created_at', $created_at);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the contact page with success message
    header('Location: contact.php?status=success');
    exit();

} catch (PDOException $e) {
    // Log the error and redirect with error message
    error_log("Error: " . $e->getMessage());
    header('Location: contact.php?status=error');
    exit();
}