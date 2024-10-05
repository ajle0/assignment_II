<?php include_once '../templates/header.php'; ?>

<div class="container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="twofa_code">2FA Code</label>
            <input type="text" name="twofa_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>

<?php
include_once '../config/db.php';
include_once '../src/User.php';
include_once '../src/Authentication.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$auth = new Authentication();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $twofa_code = $_POST['twofa_code'];

    $logged_in_user = $user->login($email, $password);

    if ($logged_in_user) {
        if ($auth->validate2FACode($twofa_code, $logged_in_user['twofa_code'])) {
            echo "Login successful!";
            header("Location: success.php");
        } else {
            echo "Invalid 2FA code.";
        }
    } else {
        echo "Login failed.";
    }
}
?>