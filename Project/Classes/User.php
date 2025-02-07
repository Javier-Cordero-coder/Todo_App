<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Register a new user
    public function register($username, $password) {
        $conn = $this->db->getConnection();
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashed_password);

        return $stmt->execute();
    }

    // Login user
    public function login($username, $password) {
        $conn = $this->db->getConnection();

        $query = "SELECT id, username, password FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            }
        }
        return false;
    }

    // Logout user
    public function logout() {
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
?>