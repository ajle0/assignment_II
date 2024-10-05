<?php
class Database {
    private $host = 'root@127.0.0.1:3306';
    private $db_name = 'user_db';
    private $username = 'root';
    private $password = 'PLJunior@2003';
    public $conn;
    
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }