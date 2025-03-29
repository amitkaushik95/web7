<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Set error reporting based on configuration
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define root path
define('ROOT_PATH', dirname(__DIR__));

// Load configuration
require_once ROOT_PATH . '/config/config.php';

// Load required classes
require_once ROOT_PATH . '/vendor/autoload.php';  // For PHPMailer
require_once ROOT_PATH . '/includes/Database.php';
require_once ROOT_PATH . '/includes/Lead.php';
require_once ROOT_PATH . '/includes/Mailer.php';
require_once ROOT_PATH . '/includes/Utility.php';

// Set default timezone
date_default_timezone_set('UTC');

// Initialize database connection
try {
  $db = Database::getInstance();
} catch (Exception $e) {
  error_log("Database Connection Error: " . $e->getMessage());
  die("Database connection failed. Please try again later.");
}

// Function to handle uncaught exceptions
function handleException($exception)
{
  error_log("Uncaught Exception: " . $exception->getMessage());
  http_response_code(500);
  if (Utility::isAjaxRequest()) {
    Utility::jsonResponse(['error' => 'An unexpected error occurred'], 500);
  } else {
    include ROOT_PATH . '/templates/error.php';
  }
  exit();
}

// Set exception handler
set_exception_handler('handleException');