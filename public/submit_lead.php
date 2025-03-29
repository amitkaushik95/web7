<?php
require_once '../includes/init.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  Utility::jsonResponse(['error' => 'Invalid request method'], 405);
}

// Sanitize and validate input data
$data = Utility::sanitizeInput($_POST);

// Validate required fields
$required_fields = ['name', 'email', 'phone', 'plan_name', 'message'];
foreach ($required_fields as $field) {
  if (empty($data[$field])) {
    Utility::jsonResponse(['error' => ucfirst($field) . ' is required'], 400);
  }
}

// Validate email and phone
if (!Utility::validateEmail($data['email'])) {
  Utility::jsonResponse(['error' => 'Invalid email address'], 400);
}

if (!Utility::validatePhone($data['phone'])) {
  Utility::jsonResponse(['error' => 'Invalid phone number'], 400);
}

try {
  // Save lead to database
  $lead = new Lead();
  if (!$lead->create($data)) {
    throw new Exception('Failed to save lead data');
  }

  // Send email notifications
  Mailer::sendAdminNotification($data);
  Mailer::sendCustomerNotification($data);

  // Send success response
  Utility::jsonResponse([
    'success' => true,
    'message' => 'Thank you for your interest! We will contact you shortly.'
  ]);

} catch (Exception $e) {
  error_log("Lead Submission Error: " . $e->getMessage());
  Utility::jsonResponse([
    'error' => 'An error occurred while processing your request'
  ], 500);
}