<?php
class Database
{
  private static $instance = null;
  private $conn;

  private function __construct()
  {
    try {
      $this->conn = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      error_log("Connection Error: " . $e->getMessage());
      throw new Exception("Database connection failed");
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return $this->conn;
  }
}