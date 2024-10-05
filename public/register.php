<?php
include_once '../config/db.php';
include_once '../src/User.php';
include_once '../src/Authentication.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$auth = new Authentication();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];