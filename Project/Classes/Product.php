<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Create a new product
    public function create($name, $description, $price) {
        $conn = $this->db->getConnection();

        $query = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);

        return $stmt->execute();
    }

    // Read all products
    public function read() {
        $conn = $this->db->getConnection();

        $query = "SELECT * FROM products";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a product
    public function update($id, $name, $description, $price) {
        $conn = $this->db->getConnection();

        $query = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);

        return $stmt->execute();
    }

    // Delete a product
    public function delete($id) {
        $conn = $this->db->getConnection();

        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}
?>