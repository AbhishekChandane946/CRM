<?php
require_once "db_connection.php";  

class Product {
    private $conn;
    private $table = "products"; // Define table name here
    public function __construct() {
        $database = new Database();   
        $this->conn = $database->getConnection();  
    }

    // Get all products
    public function getAllProducts() {
        try {
            $query = "SELECT * FROM products";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function createProduct($name, $type, $price, $description) {
        try {
            $sql = "INSERT INTO products (name, type, price, description) VALUES (:name, :type, :price, :description)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':type' => $type,
                ':price' => $price,
                ':description' => $description
            ]);
            return ["status" => "success", "message" => "Product added successfully"];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }
    

    // Update an existing product
    public function updateProduct($id, $name, $type, $description) {
        try {
            $query = "UPDATE " . $this->table . " SET name = :name, type = :type, description = :description WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":type", $type);
            $stmt->bindParam(":description", $description);
            $stmt->execute();
            return ["status" => "success", "message" => "Product updated successfully."];
        } catch (Exception $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }

    // Delete a product
    public function deleteProduct($id) {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return ["status" => "success", "message" => "Product deleted successfully."];
        } catch (Exception $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }
}