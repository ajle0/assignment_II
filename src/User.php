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