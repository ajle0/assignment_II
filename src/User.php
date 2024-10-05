<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password;
    public $twofa_code;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register a user
    public function register() {
        $query = "INSERT INTO " . $this->table_name . " (username, email, password, twofa_code)
                  VALUES (:username, :email, :password, :twofa_code)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':twofa_code', $this->twofa_code);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    
    }
}
?>