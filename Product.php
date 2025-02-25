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

    // Create a new product
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


    public function getProductById($id) {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $product = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch single product
            if ($product) {
                return $product;
            } else {
                return ["status" => "error", "message" => "Product not found"];
            }
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }
    
    

    // ✅ Update an existing product
    public function updateProduct($id, $name, $type, $price, $description) {
        try {
            $query = "UPDATE " . $this->table . " 
                      SET name = :name, type = :type, price = :price, description = :description 
                      WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return ["status" => "success", "message" => "Product updated successfully."];
            } else {
                return ["status" => "error", "message" => "No changes were made or product not found."];
            }
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }

    // Delete a product
    public function deleteProduct($id) {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return ["status" => "success", "message" => "Product deleted successfully."];
            } else {
                return ["status" => "error", "message" => "Product not found or already deleted."];
            }
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }
}
?>
