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

    if (!empty($username) && !empty($email) && strlen($password) >= 6) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $twofa_code = $auth->generate2FACode();

        $user->username = $username;
        $user->email = $email;
        $user->password = $hashed_password;
        $user->twofa_code = $twofa_code;