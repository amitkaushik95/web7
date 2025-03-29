<?php
class Utility
{
  public static function sanitizeInput($data)
  {
    if (is_array($data)) {
      return array_map([self::class, 'sanitizeInput'], $data);
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
  }

  public static function validateEmail($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function validatePhone($phone)
  {
    // Remove any non-digit characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    // Check if the phone number has a valid length (adjust as needed)
    return strlen($phone) >= 10 && strlen($phone) <= 15;
  }

  public static function generateCSRFToken()
  {
    if (!isset($_SESSION['csrf_token'])) {
      $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
  }

  public static function verifyCSRFToken($token)
  {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
  }

  public static function redirect($url)
  {
    header("Location: $url");
    exit();
  }

  public static function setFlashMessage($type, $message)
  {
    $_SESSION['flash'] = [
      'type' => $type,
      'message' => $message
    ];
  }

  public static function getFlashMessage()
  {
    if (isset($_SESSION['flash'])) {
      $flash = $_SESSION['flash'];
      unset($_SESSION['flash']);
      return $flash;
    }
    return null;
  }

  public static function formatDate($date, $format = 'Y-m-d H:i:s')
  {
    return date($format, strtotime($date));
  }

  public static function isAjaxRequest()
  {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
  }

  public static function jsonResponse($data, $statusCode = 200)
  {
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
  }
}