<?php
class Database {
    private $host = "localhost";  // Change if needed
    private $db_name = "sec2pay_leads";  // Change to your actual database name
    private $username = "root";  // Change if needed
    private $password = "";  // Change if needed
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection failed: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
?>
