<?php
class Lead
{
  private $db;
  private $table = 'leaddata';

  public function __construct()
  {
    $this->db = Database::getInstance()->getConnection();
  }

  public function create($data)
  {
    try {
      $sql = "INSERT INTO {$this->table} (name, email, phone, plan_name, message) 
                    VALUES (:name, :email, :phone, :plan_name, :message)";

      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':name', $data['name']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':phone', $data['phone']);
      $stmt->bindParam(':plan_name', $data['plan_name']);
      $stmt->bindParam(':message', $data['message']);

      return $stmt->execute();
    } catch (PDOException $e) {
      error_log("Lead Creation Error: " . $e->getMessage());
      return false;
    }
  }

  public function getAll()
  {
    try {
      $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("Lead Retrieval Error: " . $e->getMessage());
      return [];
    }
  }

  public function getById($id)
  {
    try {
      $sql = "SELECT * FROM {$this->table} WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("Lead Retrieval Error: " . $e->getMessage());
      return null;
    }
  }

  public function update($id, $data)
  {
    try {
      $sql = "UPDATE {$this->table} 
                    SET name = :name, 
                        email = :email, 
                        phone = :phone, 
                        plan_name = :plan_name, 
                        message = :message 
                    WHERE id = :id";

      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':name', $data['name']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':phone', $data['phone']);
      $stmt->bindParam(':plan_name', $data['plan_name']);
      $stmt->bindParam(':message', $data['message']);

      return $stmt->execute();
    } catch (PDOException $e) {
      error_log("Lead Update Error: " . $e->getMessage());
      return false;
    }
  }

  public function delete($id)
  {
    try {
      $sql = "DELETE FROM {$this->table} WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      return $stmt->execute();
    } catch (PDOException $e) {
      error_log("Lead Deletion Error: " . $e->getMessage());
      return false;
    }
  }
}